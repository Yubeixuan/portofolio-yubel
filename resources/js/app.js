const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// ── Hitung naik untuk angka statistik ──
function countUp(el) {
    const target = parseFloat(el.dataset.count);
    const decimals = parseInt(el.dataset.decimals || '0', 10);
    const final = el.textContent;
    if (reduceMotion || Number.isNaN(target)) return;

    const start = performance.now();
    const duration = 1100;
    const tick = (now) => {
        const p = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - p, 3);
        el.textContent = (target * eased).toFixed(decimals);
        if (p < 1) requestAnimationFrame(tick);
        else el.textContent = final;
    };
    requestAnimationFrame(tick);
}

// ── Reveal saat scroll ──
const targets = document.querySelectorAll('.reveal, .reveal-group');

if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                entry.target.querySelectorAll('[data-count]').forEach(countUp);
                if (entry.target.matches('[data-count]')) countUp(entry.target);
                io.unobserve(entry.target);
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );
    targets.forEach((el) => io.observe(el));
} else {
    targets.forEach((el) => el.classList.add('is-visible'));
}

// ── Teks peran yang bergantian pelan ──
document.querySelectorAll('[data-rotate]').forEach((el) => {
    let items = [];
    try { items = JSON.parse(el.dataset.items || '[]'); } catch (e) { /* abaikan */ }
    if (reduceMotion || items.length < 2) return;

    let i = 0;
    setInterval(() => {
        el.classList.add('is-swapping');
        setTimeout(() => {
            i = (i + 1) % items.length;
            el.textContent = items[i];
            el.classList.remove('is-swapping');
        }, 260);
    }, 2800);
});

// ── Progress scroll + navigasi aktif ──
const bar = document.getElementById('scroll-progress');
const nav = document.getElementById('site-nav');

const onScroll = () => {
    const max = document.documentElement.scrollHeight - window.innerHeight;
    if (bar) bar.style.transform = `scaleX(${max > 0 ? Math.min(window.scrollY / max, 1) : 0})`;
    if (nav) nav.classList.toggle('border-line', window.scrollY > 8);
};
onScroll();
window.addEventListener('scroll', onScroll, { passive: true });

const navLinks = document.querySelectorAll('a[data-nav]');
if ('IntersectionObserver' in window && navLinks.length) {
    const setActive = (id) =>
        navLinks.forEach((a) => a.classList.toggle('is-active', a.dataset.nav === id));

    const spy = new IntersectionObserver(
        (entries) => {
            entries.forEach((e) => {
                if (e.isIntersecting) setActive(e.target.id);
            });
        },
        { rootMargin: '-45% 0px -50% 0px' }
    );
    ['about', 'projects', 'experience', 'skills', 'contact'].forEach((id) => {
        const s = document.getElementById(id);
        if (s) spy.observe(s);
    });
    const home = document.getElementById('home');
    if (home) {
        new IntersectionObserver((es) => es.forEach((e) => e.isIntersecting && setActive(null)), {
            rootMargin: '-45% 0px -50% 0px',
        }).observe(home);
    }
}

// ── Bar interaktif ──
document.querySelectorAll('[data-stack]').forEach((stack) => {
    const readout = stack.querySelector('[data-readout]');
    const segs = stack.querySelectorAll('[data-seg]');
    const fallback = readout ? readout.textContent : '';

    const show = (seg) => {
        segs.forEach((s) => s.classList.toggle('opacity-40', s !== seg));
        if (readout) readout.textContent = `${seg.dataset.label}: ${seg.dataset.value}`;
    };
    const reset = () => {
        segs.forEach((s) => s.classList.remove('opacity-40'));
        if (readout) readout.textContent = fallback;
    };

    segs.forEach((seg) => {
        ['mouseenter', 'focus', 'click'].forEach((ev) => seg.addEventListener(ev, () => show(seg)));
    });
    stack.addEventListener('mouseleave', reset);
    stack.addEventListener('focusout', (e) => {
        if (!stack.contains(e.relatedTarget)) reset();
    });
});

// ── Filter proyek ──
const filterBtns = document.querySelectorAll('.filter-btn');
const cards = document.querySelectorAll('[data-cats]');
filterBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        const f = btn.dataset.filter;
        filterBtns.forEach((b) => b.setAttribute('aria-pressed', String(b === btn)));
        cards.forEach((c) => {
            const show = f === 'all' || c.dataset.cats.split(' ').includes(f);
            c.hidden = !show;
        });
    });
});

// ── Dialog studi kasus ──
document.querySelectorAll('[data-open-dialog]').forEach((btn) => {
    btn.addEventListener('click', () => {
        const d = document.getElementById(btn.dataset.openDialog);
        if (d && typeof d.showModal === 'function') {
            d.showModal();
            document.body.classList.add('dialog-open');
        }
    });
});

document.querySelectorAll('dialog.case-dialog').forEach((d) => {
    d.addEventListener('close', () => document.body.classList.remove('dialog-open'));
    d.addEventListener('click', (e) => {
        if (e.target === d) d.close(); // klik di luar kotak = tutup
    });
    d.querySelectorAll('[data-close-dialog]').forEach((b) => b.addEventListener('click', () => d.close()));
});

// Zoom gambar dashboard
document.querySelectorAll('[data-zoom]').forEach((z) => {
    z.addEventListener('click', () => z.classList.toggle('zoomed'));
});

// Muat dashboard Tableau hanya saat diminta (hemat bandwidth & privasi)
document.querySelectorAll('[data-embed-src]').forEach((btn) => {
    btn.addEventListener('click', () => {
        const slot = document.getElementById(btn.dataset.embedTarget);
        if (!slot) return;
        const iframe = document.createElement('iframe');
        iframe.src = btn.dataset.embedSrc;
        iframe.title = btn.dataset.embedTitle || 'Dashboard';
        iframe.loading = 'lazy';
        iframe.className = 'h-[560px] w-full rounded-xl border border-line bg-white sm:h-[760px] lg:h-[860px]';
        iframe.setAttribute('allowfullscreen', '');
        slot.replaceChildren(iframe);
        slot.hidden = false;
        btn.hidden = true;
    });
});

// ── Menu mobile ──
const toggle = document.getElementById('menu-toggle');
const menu = document.getElementById('mobile-menu');

if (toggle && menu) {
    const setOpen = (open) => {
        menu.classList.toggle('hidden', !open);
        toggle.setAttribute('aria-expanded', String(open));
    };
    toggle.addEventListener('click', () => setOpen(menu.classList.contains('hidden')));
    menu.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => setOpen(false)));
}
