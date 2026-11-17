<!DOCTYPE html>
<html lang="{{ $lang }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $t['meta']['title'] }}</title>
    <meta name="description" content="{{ $t['meta']['description'] }}">
    <meta name="theme-color" content="#0a0a0c">
    <link rel="canonical" href="{{ url($lang === 'en' ? '/en' : '/') }}">
    <link rel="alternate" hreflang="id" href="{{ url('/') }}">
    <link rel="alternate" hreflang="en" href="{{ url('/en') }}">

    {{-- Open Graph / Twitter (preview saat link dibagikan) --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Yubel Hakinen Joshua Lita">
    <meta property="og:title" content="{{ $t['meta']['title'] }}">
    <meta property="og:description" content="{{ $t['meta']['description'] }}">
    <meta property="og:url" content="{{ url($lang === 'en' ? '/en' : '/') }}">
    <meta property="og:image" content="{{ asset('images/og-image.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="{{ $lang === 'en' ? 'en_US' : 'id_ID' }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $t['meta']['title'] }}">
    <meta name="twitter:description" content="{{ $t['meta']['description'] }}">
    <meta name="twitter:image" content="{{ asset('images/og-image.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Tandai JS aktif sebelum render, supaya animasi tidak menyembunyikan konten jika JS mati --}}
    <script>document.documentElement.classList.add('js');</script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-bg text-ink">

    @php
    $navLinks = [
        ['#about', $t['nav']['about']],
        ['#projects', $t['nav']['projects']],
        ['#experience', $t['nav']['experience']],
        ['#skills', $t['nav']['skills']],
        ['#contact', $t['nav']['contact']],
    ];
    $switchUrl = $lang === 'en' ? url('/') : url('/en');
    @endphp

    <nav id="site-nav" class="fixed inset-x-0 top-0 z-50 border-b border-transparent bg-bg/80 backdrop-blur-xl transition-colors">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-5 py-4 sm:px-8">
            <a href="#home" class="text-lg font-extrabold tracking-tight">portofolio<span class="text-accent">.</span></a>

            <div class="flex items-center gap-3">
                <ul class="hidden items-center gap-7 text-sm font-medium text-muted md:flex">
                    @foreach($navLinks as [$href, $label])
                    <li><a href="{{ $href }}" class="transition-colors hover:text-ink">{{ $label }}</a></li>
                    @endforeach
                </ul>

                <a href="{{ $switchUrl }}" hreflang="{{ $lang === 'en' ? 'id' : 'en' }}" aria-label="{{ $t['nav']['switch_label'] }}"
                   class="grid h-10 min-w-10 place-items-center rounded-lg border border-line px-2.5 text-xs font-bold tracking-wider text-muted transition-colors hover:border-accent hover:text-accent">
                    {{ $t['nav']['switch'] }}
                </a>

                <button id="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu" aria-label="{{ $t['nav']['menu'] }}"
                        class="grid size-10 place-items-center rounded-lg border border-line text-muted md:hidden">
                    <i class="fas fa-bars" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <ul id="mobile-menu" class="hidden border-t border-line px-5 pb-4 pt-2 text-sm font-medium text-muted md:hidden">
            @foreach($navLinks as [$href, $label])
            <li><a href="{{ $href }}" class="block py-3">{{ $label }}</a></li>
            @endforeach
        </ul>
    </nav>

    <main class="pt-16">
        @yield('content')
    </main>

    <footer class="border-t border-line px-5 py-8 text-center text-sm text-muted">
        <p>{{ str_replace(':year', date('Y'), $t['footer']) }}</p>
    </footer>

</body>
</html>
