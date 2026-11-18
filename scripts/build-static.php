<?php

/**
 * Render halaman Laravel (/ dan /en) menjadi HTML statis di folder `static/`
 * supaya bisa di-host di Vercel/Netlify/GitHub Pages tanpa PHP.
 *
 * Pemakaian (jalankan dari root proyek, setelah `npm run build`):
 *   php scripts/build-static.php https://nama-proyek.vercel.app
 *
 * URL situs dipakai untuk tag canonical / Open Graph (harus absolut).
 * Aset (CSS, JS, gambar) dan link navigasi dibuat relatif ke root.
 */

$root = dirname(__DIR__);
$site = rtrim($argv[1] ?? getenv('SITE_URL') ?: 'https://portofolio-yubel.vercel.app', '/');

if (! is_file($root.'/public/build/manifest.json')) {
    fwrite(STDERR, "public/build belum ada. Jalankan `npm run build` dulu.\n");
    exit(1);
}

// Snippet Vercel Analytics ikut dipasang di build statis (aktifkan juga di dashboard Vercel)
$_ENV['SITE_ANALYTICS'] = $_SERVER['SITE_ANALYTICS'] = 'true';

require $root.'/vendor/autoload.php';
$app = require $root.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$out = $root.'/static';

// Bersihkan hasil lama
if (is_dir($out)) {
    $it = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($out, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($it as $f) {
        $f->isDir() ? rmdir($f->getPathname()) : unlink($f->getPathname());
    }
}
is_dir($out) || mkdir($out, 0777, true);

// Salin aset publik
$copy = function (string $from, string $to) use (&$copy) {
    if (is_dir($from)) {
        @mkdir($to, 0777, true);
        foreach (scandir($from) as $n) {
            if ($n !== '.' && $n !== '..') {
                $copy("$from/$n", "$to/$n");
            }
        }
    } elseif (is_file($from)) {
        copy($from, $to);
    }
};
foreach (['build', 'images'] as $dir) {
    $copy("$root/public/$dir", "$out/$dir");
}
foreach (['favicon.ico', 'robots.txt', 'cv-yubel.pdf'] as $file) {
    $copy("$root/public/$file", "$out/$file");
}

// Render halaman
$pages = ['/' => '/index.html', '/en' => '/en/index.html'];
foreach ($pages as $path => $file) {
    $response = $kernel->handle(Illuminate\Http\Request::create($site.$path));
    if ($response->getStatusCode() !== 200) {
        fwrite(STDERR, "Gagal render $path (status {$response->getStatusCode()})\n");
        exit(1);
    }
    $html = $response->getContent();
    $q = preg_quote($site, '#');

    // Aset & link navigasi -> relatif; meta canonical/og tetap absolut
    $html = preg_replace('#(src|href)="'.$q.'/(build|images)/#', '$1="/$2/', $html);
    $html = preg_replace('#(src|href)="'.$q.'/(cv-yubel\.pdf)"#', '$1="/$2"', $html);
    $html = preg_replace('#<a href="'.$q.'(/en)?"#', '<a href="$1/"', $html);
    $html = str_replace('<a href="/"', '<a href="/"', $html);
    $html = str_replace('<a href="/en/"', '<a href="/en"', $html);

    @mkdir(dirname($out.$file), 0777, true);
    file_put_contents($out.$file, $html);
    echo "OK  $path -> static$file (".strlen($html)." bytes)\n";
}

echo "Selesai. URL situs untuk meta: $site\n";
