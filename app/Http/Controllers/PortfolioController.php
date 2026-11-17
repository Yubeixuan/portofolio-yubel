<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    /**
     * Tampilkan halaman utama portfolio (id = Indonesia, en = Inggris)
     */
    public function index(string $lang = 'id')
    {
        abort_unless(in_array($lang, ['id', 'en'], true), 404);

        return view('home', [
            'lang' => $lang,
            't' => require lang_path($lang.'/portfolio.php'),
        ]);
    }
}
