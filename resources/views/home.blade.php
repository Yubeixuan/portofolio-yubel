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

            <p class="reveal mt-8 text-sm font-semibold tracking-wide text-muted" style="--d:60ms">{{ $h['name'] }}</p>

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
                <img src="{{ asset('images/foto-saya.jpeg') }}"
                     alt="Yubel Hakinen Joshua Lita"
                     loading="lazy"
                     class="aspect-[4/5] w-full rounded-2xl border border-line object-cover">
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
                    <dd class="text-2xl font-bold text-ink">{{ $num }}</dd>
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
            'tags' => ['Python', 'Jupyter', 'Power BI', 'Tableau', 'Association Rule Mining', 'Time Series Forecasting'],
            'links' => [],
        ],
        'debouquets' => [
            'image' => 'images/debouquets-banner.jpeg',
            'tags' => ['JavaScript', 'Figma', 'HTML', 'UML', 'UAT'],
            'links' => [
                ['Figma', 'fab fa-figma', 'https://www.figma.com/file/3EHrChIRnCXbywhxvdHJiu/FigmaDeBouquets'],
                ['GitHub', 'fab fa-github', 'https://github.com/Yubeixuan/web_debouqets'],
            ],
        ],
        'eunoia' => [
            'image' => 'images/eunoia-banner.jpg',
            'tags' => ['Testing', 'Bug Tracking'],
            'links' => [['GitHub', 'fab fa-github', 'https://github.com/Yubeixuan/Eunoia']],
        ],
        'eperpus' => [
            'image' => 'images/eperpustakaan-banner.jpg',
            'tags' => ['JavaScript', 'MySQL'],
            'links' => [],
        ],
        'predatoria' => [
            'image' => 'images/predatoria-banner.jpeg',
            'tags' => ['AR', 'CSS', 'HTML', 'UEQ'],
            'links' => [['Demo', 'fas fa-arrow-up-right-from-square', 'https://beni1412.github.io/virtual/']],
        ],
        'ishowkost' => [
            'image' => 'images/IShowKost-banner.jpeg',
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

        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $key => $p)
            @php $txt = $pt['items'][$key]; @endphp
            <article class="reveal group flex flex-col overflow-hidden rounded-2xl border border-line bg-card transition duration-300 hover:-translate-y-1 hover:border-accent/40" style="--d:{{ ($loop->index % 3) * 80 }}ms">
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

                    @if(count($p['links']))
                    <div class="mt-auto flex flex-wrap gap-4 pt-5">
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

                    <div class="reveal rounded-2xl border border-line bg-card p-6" style="--d:60ms">
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

                <div>
                    <h3 class="reveal mb-5 text-sm font-semibold uppercase tracking-[0.18em] text-muted">{{ $ex['org_heading'] }}</h3>
                    <div class="space-y-4">
                        @foreach($ex['orgs'] as $i => $o)
                        <div class="reveal rounded-2xl border border-line bg-card p-6" style="--d:{{ $i * 70 }}ms">
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
                    <div class="space-y-4">
                        @foreach($ex['edu'] as $i => $e)
                        <div class="reveal rounded-2xl border border-line bg-card p-6" style="--d:{{ $i * 70 }}ms">
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

@endsection
