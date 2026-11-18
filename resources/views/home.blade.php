@extends('layouts.app')

@section('content')

@php
    $hasCv = file_exists(public_path('cv-yubel.pdf'));
    $h = $t['hero'];
@endphp

{{-- ═══════════════════════════════════
     HERO
════════════════════════════════════ --}}
<section id="home" class="relative overflow-hidden">
    <div class="pointer-events-none absolute inset-x-0 top-0 h-[28rem] bg-[radial-gradient(ellipse_at_top,rgb(45_212_191/0.10),transparent_65%)]"></div>

    <div class="relative mx-auto grid min-h-[calc(100svh-4rem)] max-w-6xl items-center gap-12 px-5 py-20 sm:px-8 lg:grid-cols-[minmax(0,7fr)_minmax(0,5fr)] lg:gap-16">
        <div>
            <div class="reveal inline-flex items-center gap-2 rounded-full border border-line bg-white/[0.03] px-4 py-1.5 text-xs font-medium text-muted sm:text-sm">
                <span class="pulse-dot size-2 rounded-full bg-accent"></span>
                {{ $h['badge'] }}
            </div>

            <div class="reveal mt-8" style="--d:60ms">
                <p class="text-sm font-semibold tracking-wide text-muted">{{ $h['name'] }}</p>
                <p class="mt-1 text-sm font-semibold text-accent">
                    <span data-rotate data-items='@json($h['roles'])'>{{ $h['roles'][0] }}</span>
                </p>
            </div>

            <h1 class="reveal mt-3 text-4xl font-extrabold leading-[1.08] tracking-tight sm:text-5xl lg:text-6xl" style="--d:100ms">
                {{ $h['title_a'] }}<br>
                <span class="text-accent">{{ $h['title_b'] }}</span>
            </h1>

            <p class="reveal mt-6 max-w-xl text-base text-muted sm:text-lg" style="--d:160ms">
                {{ $h['subtitle'] }}
            </p>

            <div class="reveal mt-9 flex flex-wrap gap-3" style="--d:240ms">
                <a href="#projects" class="btn btn-primary">
                    <i class="fas fa-rocket" aria-hidden="true"></i>
                    {{ $h['cta_projects'] }}
                </a>
                <a href="#contact" class="btn btn-outline">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    {{ $h['cta_contact'] }}
                </a>
                @if($hasCv)
                <a href="{{ asset('cv-yubel.pdf') }}" class="btn btn-outline" target="_blank" rel="noopener">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                    {{ $h['cta_cv_view'] }}
                </a>
                <a href="{{ asset('cv-yubel.pdf') }}" class="btn btn-outline" download="CV-Yubel-Hakinen-Joshua-Lita.pdf">
                    <i class="fas fa-download" aria-hidden="true"></i>
                    {{ $h['cta_cv'] }}
                </a>
                @endif
            </div>
        </div>

        {{-- Grafik data kecil: angka asli dari proyek Market Basket Analysis --}}
        <div class="reveal rounded-2xl border border-line bg-card p-6" style="--d:200ms">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-accent">{{ $h['chart_eyebrow'] }}</p>
            <h2 class="mt-2 text-lg font-bold">{{ $h['chart_title'] }}</h2>
            <p class="mt-1 text-sm text-muted">{{ $h['chart_sub'] }}</p>

            <div class="mt-6">
                @include('partials.stacked-bar', [
                    'title' => $h['chart_title'],
                    'default' => $h['chart_default'],
                    'segments' => [
                        [$h['chart_clean'], $h['chart_clean_value'], 96.8, 'neutral'],
                        [$h['chart_dup'], $h['chart_dup_value'], 3.2, 'accent'],
                    ],
                ])
            </div>

            <div class="mt-5 flex items-baseline justify-between gap-4 border-t border-line pt-5">
                <span class="text-sm text-muted">{{ $h['chart_cancel'] }}</span>
                <span class="text-2xl font-bold">{{ $h['chart_cancel_value'] }}</span>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════
     ABOUT
════════════════════════════════════ --}}
@php $a = $t['about']; @endphp
<section id="about" class="border-t border-line py-20 sm:py-28">
    <div class="mx-auto grid max-w-6xl items-center gap-12 px-5 sm:px-8 lg:grid-cols-[minmax(0,5fr)_minmax(0,6fr)] lg:gap-16">
        <div class="reveal mx-auto w-full max-w-sm lg:max-w-none">
            <div class="relative">
                <div class="absolute -inset-3 -z-10 rounded-3xl border border-accent/25"></div>
                <img src="{{ asset('images/foto-saya-gunung.jpg') }}"
                     alt="Yubel Hakinen Joshua Lita"
                     width="960" height="1280"
                     loading="lazy"
                     class="aspect-[4/5] w-full rounded-2xl border border-line object-cover object-bottom">
            </div>
        </div>

        <div>
            <p class="section-eyebrow reveal">{{ $a['eyebrow'] }}</p>
            <h2 class="section-title reveal" style="--d:60ms">
                {{ $a['title_a'] }} <span class="text-accent">{{ $a['title_b'] }}</span><br>
                {{ $a['title_c'] }}
            </h2>

            <p class="reveal mt-6 text-muted" style="--d:120ms">{{ $a['p1'] }}</p>
            <p class="reveal mt-4 text-muted" style="--d:180ms">{{ $a['p2'] }}</p>

            <dl class="mt-10 grid grid-cols-2 gap-3 sm:grid-cols-4">
                @foreach($a['stats'] as $i => [$num, $label])
                <div class="reveal flex flex-col rounded-xl border border-line bg-card p-4" style="--d:{{ 220 + $i * 60 }}ms">
                    <dt class="order-2 mt-1 text-xs leading-snug text-muted">{{ $label }}</dt>
                    @php
                        $isNum = is_numeric($num);
                        $dec = $isNum && str_contains($num, '.') ? strlen(substr(strrchr($num, '.'), 1)) : 0;
                    @endphp
                    <dd class="text-2xl font-bold text-ink" @if($isNum) data-count="{{ $num }}" data-decimals="{{ $dec }}" @endif>{{ $num }}</dd>
                </div>
                @endforeach
            </dl>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════
     PROJECTS
════════════════════════════════════ --}}
@php
    $pt = $t['projects'];
    // Data netral (tidak tergantung bahasa). Teks ada di lang/*/portfolio.php
    $projects = [
        'market' => [
            'image' => 'images/market-basket-dashboard.jpg',
            'cats' => 'data',
            'case' => true,
            'tags' => ['Python', 'Jupyter', 'Power BI', 'Tableau', 'Association Rule Mining', 'Time Series Forecasting'],
            'links' => [],
        ],
        'debouquets' => [
            'image' => 'images/debouquets-banner.jpeg',
            'cats' => 'web',
            'tags' => ['JavaScript', 'Figma', 'HTML', 'UML', 'UAT'],
            'links' => [
                ['Figma', 'fab fa-figma', 'https://www.figma.com/file/3EHrChIRnCXbywhxvdHJiu/FigmaDeBouquets'],
                ['GitHub', 'fab fa-github', 'https://github.com/Yubeixuan/web_debouqets'],
            ],
        ],
        'eunoia' => [
            'image' => 'images/eunoia-banner.jpg',
            'cats' => 'app',
            'tags' => ['Testing', 'Bug Tracking'],
            'links' => [['GitHub', 'fab fa-github', 'https://github.com/Yubeixuan/Eunoia']],
        ],
        'eperpus' => [
            'image' => 'images/eperpustakaan-banner.jpg',
            'cats' => 'app data',
            'tags' => ['JavaScript', 'MySQL'],
            'links' => [],
        ],
        'predatoria' => [
            'image' => 'images/predatoria-banner.jpeg',
            'cats' => 'app',
            'tags' => ['AR', 'CSS', 'HTML', 'UEQ'],
            'links' => [['Demo', 'fas fa-arrow-up-right-from-square', 'https://beni1412.github.io/virtual/']],
        ],
        'ishowkost' => [
            'image' => 'images/IShowKost-banner.jpeg',
            'cats' => 'web',
            'tags' => ['CSS', 'HTML', 'JavaScript'],
            'links' => [['GitHub', 'fab fa-github', 'https://github.com/stickyfinger222/web-kos']],
        ],
    ];
@endphp
<section id="projects" class="border-t border-line bg-surface py-20 sm:py-28">
    <div class="mx-auto max-w-6xl px-5 sm:px-8">
        <p class="section-eyebrow reveal">{{ $pt['eyebrow'] }}</p>
        <h2 class="section-title reveal" style="--d:60ms">
            {{ $pt['title_a'] }} <span class="text-accent">{{ $pt['title_b'] }}</span>
        </h2>

        <div class="filter-bar mt-8 flex-wrap gap-2" role="group" aria-label="{{ $pt['filter_label'] }}">
            @foreach($pt['filters'] as $fKey => $fLabel)
            <button type="button" data-filter="{{ $fKey }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                    class="filter-btn rounded-full border border-line px-4 py-1.5 text-sm font-medium text-muted transition-colors hover:border-accent/50 hover:text-ink">
                {{ $fLabel }}
            </button>
            @endforeach
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $key => $p)
            @php $txt = $pt['items'][$key]; @endphp
            <article data-cats="{{ $p['cats'] }}" class="reveal group flex flex-col overflow-hidden rounded-2xl border border-line bg-card transition duration-300 hover:-translate-y-1 hover:border-accent/40" style="--d:{{ ($loop->index % 3) * 80 }}ms">
                <div class="relative aspect-video overflow-hidden border-b border-line bg-surface">
                    @if(isset($p['image']))
                        <img src="{{ asset($p['image']) }}" alt="{{ $txt['title'] }}" loading="lazy"
                             class="size-full object-cover transition duration-500 group-hover:scale-[1.03]">
                    @else
                        <div class="grid size-full place-items-center bg-[radial-gradient(circle_at_30%_20%,rgb(45_212_191/0.16),transparent_60%)]">
                            <i class="fas {{ $p['icon'] }} text-5xl text-accent/80" aria-hidden="true"></i>
                        </div>
                    @endif
                </div>

                <div class="flex flex-1 flex-col p-6">
                    <p class="text-xs font-medium text-accent">{{ $txt['period'] }}</p>
                    <h3 class="mt-2 text-lg font-bold leading-snug">{{ $txt['title'] }}</h3>

                    <div class="mt-3 flex flex-wrap gap-1.5">
                        @foreach($p['tags'] as $tag)
                        <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <p class="mt-4 text-sm text-muted">{{ $txt['desc'] }}</p>
                    <p class="mt-3 text-sm text-muted">{{ $txt['extra'] }}</p>

                    @if(count($p['links']) || ! empty($p['case']))
                    <div class="mt-auto flex flex-wrap gap-4 pt-5">
                        @if(! empty($p['case']))
                        <button type="button" data-open-dialog="case-{{ $key }}"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-accent transition-opacity hover:opacity-80">
                            <i class="fas fa-expand" aria-hidden="true"></i> {{ $pt['case_cta'] }}
                        </button>
                        @endif
                        @foreach($p['links'] as [$label, $icon, $url])
                        <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 text-sm font-semibold text-ink transition-colors hover:text-accent">
                            <i class="{{ $icon }}" aria-hidden="true"></i> {{ $label }}
                        </a>
                        @endforeach
                    </div>
                    @endif
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════
     EXPERIENCE
════════════════════════════════════ --}}
@php
    $ex = $t['experience'];
    $w = $ex['work'];
@endphp
<section id="experience" class="border-t border-line py-20 sm:py-28">
    <div class="mx-auto max-w-6xl px-5 sm:px-8">
        <p class="section-eyebrow reveal">{{ $ex['eyebrow'] }}</p>
        <h2 class="section-title reveal" style="--d:60ms">
            {{ $ex['title_a'] }} <span class="text-accent">{{ $ex['title_b'] }}</span>
        </h2>

        <div class="mt-12 grid gap-10 lg:grid-cols-2 lg:gap-14">
            {{-- Kolom kiri: pekerjaan + organisasi --}}
            <div class="space-y-10">
                <div>
                    <h3 class="reveal mb-5 text-sm font-semibold uppercase tracking-[0.18em] text-muted">{{ $ex['work_heading'] }}</h3>

                    <div class="tl reveal-group">
                    <span class="tl-line" aria-hidden="true"></span>
                    <div class="reveal relative rounded-2xl border border-line bg-card p-6" style="--d:60ms">
                        <span class="tl-dot" aria-hidden="true"></span>
                        <p class="text-xs font-medium text-accent">{{ $w['period'] }}</p>
                        <h4 class="mt-2 text-lg font-bold leading-snug">{{ $w['role'] }}</h4>
                        <p class="text-sm text-muted">{{ $w['org'] }}</p>

                        <ul class="mt-4 space-y-2 text-sm text-muted">
                            @foreach($w['bullets'] as $b)
                            <li class="flex gap-3"><span class="mt-2 size-1.5 shrink-0 rounded-full bg-accent"></span><span>{{ $b }}</span></li>
                            @endforeach
                        </ul>

                        <div class="mt-6 border-t border-line pt-5">
                            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.18em] text-muted">{{ $w['chart_title'] }}</p>
                            @include('partials.stacked-bar', [
                                'title' => $w['chart_title'],
                                'default' => $w['chart_default'],
                                'segments' => [
                                    [$w['chart_a'], $w['chart_a_value'], 20 / 29 * 100, 'neutral'],
                                    [$w['chart_b'], $w['chart_b_value'], 9 / 29 * 100, 'accent'],
                                ],
                            ])
                        </div>
                    </div>
                    </div>
                </div>

                <div>
                    <h3 class="reveal mb-5 text-sm font-semibold uppercase tracking-[0.18em] text-muted">{{ $ex['org_heading'] }}</h3>
                    <div class="tl reveal-group space-y-4">
                        <span class="tl-line" aria-hidden="true"></span>
                        @foreach($ex['orgs'] as $i => $o)
                        <div class="reveal relative rounded-2xl border border-line bg-card p-6" style="--d:{{ $i * 70 }}ms">
                            <span class="tl-dot" aria-hidden="true"></span>
                            <p class="text-xs font-medium text-accent">{{ $o['period'] }}</p>
                            <h4 class="mt-2 font-bold leading-snug">{{ $o['role'] }}</h4>
                            <p class="text-sm text-muted">{{ $o['org'] }}</p>
                            <ul class="mt-3 space-y-2 text-sm text-muted">
                                @foreach($o['bullets'] as $b)
                                <li class="flex gap-3"><span class="mt-2 size-1.5 shrink-0 rounded-full bg-accent"></span><span>{{ $b }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Kolom kanan: pendidikan + sertifikasi --}}
            <div class="space-y-10">
                <div>
                    <h3 class="reveal mb-5 text-sm font-semibold uppercase tracking-[0.18em] text-muted">{{ $ex['edu_heading'] }}</h3>
                    <div class="tl reveal-group space-y-4">
                        <span class="tl-line" aria-hidden="true"></span>
                        @foreach($ex['edu'] as $i => $e)
                        <div class="reveal relative rounded-2xl border border-line bg-card p-6" style="--d:{{ $i * 70 }}ms">
                            <span class="tl-dot" aria-hidden="true"></span>
                            <p class="text-xs font-medium text-accent">{{ $e['period'] }}</p>
                            <h4 class="mt-2 font-bold leading-snug">{{ $e['role'] }}</h4>
                            <ul class="mt-3 space-y-2 text-sm text-muted">
                                @foreach($e['bullets'] as $b)
                                <li class="flex gap-3"><span class="mt-2 size-1.5 shrink-0 rounded-full bg-accent"></span><span>{{ $b }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h3 class="reveal mb-5 text-sm font-semibold uppercase tracking-[0.18em] text-muted">{{ $ex['cert_heading'] }}</h3>
                    <ul class="space-y-3">
                        @foreach($ex['certs'] as $i => $c)
                        <li class="reveal flex items-start gap-3 rounded-xl border border-line bg-card p-4 text-sm" style="--d:{{ $i * 70 }}ms">
                            <i class="fas fa-certificate mt-0.5 text-accent" aria-hidden="true"></i>
                            <span>{{ $c }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════
     SKILLS
════════════════════════════════════ --}}
@php $sk = $t['skills']; @endphp
<section id="skills" class="border-t border-line bg-surface py-20 sm:py-28">
    <div class="mx-auto max-w-6xl px-5 sm:px-8">
        <p class="section-eyebrow reveal">{{ $sk['eyebrow'] }}</p>
        <h2 class="section-title reveal" style="--d:60ms">
            {{ $sk['title_a'] }} <span class="text-accent">{{ $sk['title_b'] }}</span>
        </h2>

        <div class="mt-12 grid gap-4 md:grid-cols-2">
            @foreach($sk['groups'] as $i => [$name, $icon, $items])
            <div class="reveal rounded-2xl border border-line bg-card p-6" style="--d:{{ ($i % 2) * 80 }}ms">
                <div class="flex items-center gap-3">
                    <span class="grid size-10 place-items-center rounded-lg bg-accent-soft text-accent">
                        <i class="fas {{ $icon }}" aria-hidden="true"></i>
                    </span>
                    <h3 class="font-bold">{{ $name }}</h3>
                </div>
                <div class="mt-5 flex flex-wrap gap-2">
                    @foreach($items as $item)
                    <span class="tag">{{ $item }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════
     CONTACT
════════════════════════════════════ --}}
@php $c = $t['contact']; @endphp
<section id="contact" class="border-t border-line py-20 sm:py-28">
    <div class="mx-auto max-w-6xl px-5 sm:px-8">
        <p class="section-eyebrow reveal">{{ $c['eyebrow'] }}</p>
        <h2 class="section-title reveal" style="--d:60ms">
            {{ $c['title_a'] }} <span class="text-accent">{{ $c['title_b'] }}</span>
        </h2>

        <div class="mt-10 grid gap-10 lg:grid-cols-[minmax(0,5fr)_minmax(0,6fr)] lg:gap-16">
            <div class="reveal" style="--d:120ms">
                <h3 class="text-xl font-bold">{{ $c['heading'] }}</h3>
                <p class="mt-3 text-muted">{{ $c['text'] }}</p>
            </div>

            <div class="grid gap-3 sm:grid-cols-2">
                @foreach([
                    ['mailto:yubel.lita@binus.ac.id', 'fas fa-envelope', 'yubel.lita@binus.ac.id', false],
                    ['https://www.linkedin.com/in/yubel-hakinen-joshua-lita-3978b6439', 'fab fa-linkedin', 'Yubel Hakinen Joshua Lita', true],
                    ['https://github.com/Yubeixuan', 'fab fa-github', 'Yubeixuan', true],
                    ['https://www.instagram.com/yubeel_?stkn=MWtzejhhdGMyaW05YQ==', 'fab fa-instagram', '@yubeel_', true],
                ] as $i => [$href, $icon, $text, $external])
                <a href="{{ $href }}" @if($external) target="_blank" rel="noopener noreferrer" @endif
                   class="reveal flex items-center gap-3 rounded-xl border border-line bg-card p-4 text-sm font-medium transition duration-300 hover:-translate-y-0.5 hover:border-accent/40"
                   style="--d:{{ 120 + $i * 70 }}ms">
                    <span class="grid size-10 shrink-0 place-items-center rounded-lg bg-accent-soft text-accent">
                        <i class="{{ $icon }}" aria-hidden="true"></i>
                    </span>
                    <span class="min-w-0 break-words">{{ $text }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════
     STUDI KASUS: MARKET BASKET (dialog)
════════════════════════════════════ --}}
@php
    $cs = $t['case'];
    $mk = $pt['items']['market'];
    $tableauBase = 'https://public.tableau.com/views/BDAFinalProject-MarketBasketandDemandForecast/Dashboard1';
    $tableauEmbed = $tableauBase.'?:embed=true&:showVizHome=no&:display_count=n&:origin=viz_share_link';
    $dashImg = asset('images/market-basket-dashboard.jpg');
    $bullet = '<span class="mt-2 size-1.5 shrink-0 rounded-full bg-accent"></span>';
@endphp
<dialog id="case-market" aria-labelledby="case-market-title"
        class="case-dialog m-auto max-h-[92svh] w-[min(100%-1.5rem,62rem)] overflow-y-auto rounded-2xl border border-line bg-surface p-0 text-ink">
    <div class="sticky top-0 z-10 flex items-start justify-between gap-4 border-b border-line bg-surface/95 px-5 py-4 backdrop-blur sm:px-8">
        <div class="min-w-0">
            <p class="section-eyebrow" style="margin-bottom:.25rem">{{ $cs['eyebrow'] }}</p>
            <h2 id="case-market-title" class="text-xl font-bold leading-snug sm:text-2xl">{{ $mk['title'] }}</h2>
            <p class="mt-1 text-xs text-muted">{{ $cs['meta'] }}</p>
        </div>
        <button type="button" data-close-dialog aria-label="{{ $cs['close'] }}"
                class="grid size-10 shrink-0 place-items-center rounded-lg border border-line text-muted transition-colors hover:border-accent hover:text-accent">
            <i class="fas fa-xmark" aria-hidden="true"></i>
        </button>
    </div>

    <div class="space-y-10 px-5 py-8 sm:px-8">
        {{-- Masalah --}}
        <section>
            <h3 class="text-xs font-semibold uppercase tracking-[0.18em] text-accent">{{ $cs['problem_h'] }}</h3>
            <p class="mt-3 text-muted">{{ $cs['problem'] }}</p>
        </section>

        {{-- Peran + Pendekatan --}}
        <div class="grid gap-10 md:grid-cols-2">
            <section>
                <h3 class="text-xs font-semibold uppercase tracking-[0.18em] text-accent">{{ $cs['role_h'] }}</h3>
                <ul class="mt-3 space-y-2 text-sm text-muted">
                    @foreach($cs['role'] as $item)
                    <li class="flex gap-3">{!! $bullet !!}<span>{{ $item }}</span></li>
                    @endforeach
                </ul>
            </section>
            <section>
                <h3 class="text-xs font-semibold uppercase tracking-[0.18em] text-accent">{{ $cs['approach_h'] }}</h3>
                <ul class="mt-3 space-y-2 text-sm text-muted">
                    @foreach($cs['approach'] as $item)
                    <li class="flex gap-3">{!! $bullet !!}<span>{{ $item }}</span></li>
                    @endforeach
                </ul>
            </section>
        </div>

        {{-- Temuan --}}
        <section>
            <h3 class="text-xs font-semibold uppercase tracking-[0.18em] text-accent">{{ $cs['findings_h'] }}</h3>
            <ul class="mt-3 space-y-2 text-sm text-muted">
                @foreach($cs['findings'] as $item)
                <li class="flex gap-3">{!! $bullet !!}<span>{{ $item }}</span></li>
                @endforeach
            </ul>

            <div class="mt-6 overflow-x-auto rounded-xl border border-line bg-card">
                <table class="w-full min-w-[22rem] text-left text-sm">
                    <caption class="border-b border-line px-4 py-3 text-left text-xs text-muted">{{ $cs['table_title'] }}</caption>
                    <thead class="text-xs uppercase tracking-wider text-muted">
                        <tr>
                            <th scope="col" class="px-4 py-2 font-semibold">{{ $cs['table_method'] }}</th>
                            <th scope="col" class="px-4 py-2 text-right font-semibold">MAE</th>
                            <th scope="col" class="px-4 py-2 text-right font-semibold">RMSE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cs['table_rows'] as [$method, $mae, $rmse, $best])
                        <tr class="border-t border-line {{ $best ? 'text-ink' : 'text-muted' }}">
                            <th scope="row" class="px-4 py-3 font-medium">
                                {{ $method }}
                                @if($best)
                                <span class="ml-2 rounded-md bg-accent-soft px-2 py-0.5 text-[11px] font-semibold text-accent">{{ $cs['table_best'] }}</span>
                                @endif
                            </th>
                            <td class="px-4 py-3 text-right tabular-nums {{ $best ? 'font-bold text-accent' : '' }}">{{ $mae }}</td>
                            <td class="px-4 py-3 text-right tabular-nums {{ $best ? 'font-bold text-accent' : '' }}">{{ $rmse }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="mt-2 text-xs text-muted">{{ $cs['table_note'] }}</p>
        </section>

        {{-- Rekomendasi --}}
        <section>
            <h3 class="text-xs font-semibold uppercase tracking-[0.18em] text-accent">{{ $cs['reco_h'] }}</h3>
            <ul class="mt-3 space-y-2 text-sm text-muted">
                @foreach($cs['reco'] as $item)
                <li class="flex gap-3">{!! $bullet !!}<span>{{ $item }}</span></li>
                @endforeach
            </ul>
        </section>

        {{-- Alat --}}
        <section>
            <h3 class="text-xs font-semibold uppercase tracking-[0.18em] text-accent">{{ $cs['tools_h'] }}</h3>
            <div class="mt-3 flex flex-wrap gap-1.5">
                @foreach($projects['market']['tags'] as $tag)
                <span class="tag">{{ $tag }}</span>
                @endforeach
            </div>
        </section>

        {{-- Dashboard --}}
        <section>
            <h3 class="text-xs font-semibold uppercase tracking-[0.18em] text-accent">{{ $cs['dash_h'] }}</h3>
            <p class="mt-3 text-sm text-muted">{{ $cs['dash_caption'] }}</p>

            <div class="mt-4 max-h-[70svh] overflow-auto rounded-xl border border-line bg-white">
                <button type="button" data-zoom aria-label="{{ $cs['zoom_hint'] }}" class="block w-full text-left">
                    <img src="{{ $dashImg }}" alt="{{ $mk['title'] }} — dashboard" loading="lazy" class="block h-auto">
                </button>
            </div>
            <p class="mt-2 text-xs text-muted">{{ $cs['zoom_hint'] }}</p>

            <div class="mt-5 flex flex-wrap items-center gap-3">
                <button type="button" class="btn btn-primary"
                        data-embed-src="{{ $tableauEmbed }}" data-embed-target="tableau-slot" data-embed-title="{{ $mk['title'] }} — Tableau Public">
                    <i class="fas fa-chart-column" aria-hidden="true"></i> {{ $cs['load_embed'] }}
                </button>
                <a href="{{ $tableauBase }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline">
                    <i class="fas fa-arrow-up-right-from-square" aria-hidden="true"></i> {{ $cs['open_tableau'] }}
                </a>
                <a href="{{ $dashImg }}" target="_blank" rel="noopener" class="btn btn-outline">
                    <i class="fas fa-image" aria-hidden="true"></i> {{ $cs['open_image'] }}
                </a>
            </div>
            <p class="mt-2 text-xs text-muted">{{ $cs['embed_note'] }}</p>
            <div id="tableau-slot" class="mt-5" hidden></div>
        </section>
    </div>
</dialog>

@endsection
