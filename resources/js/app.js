// Animasi reveal saat scroll
const targets = document.querySelectorAll('.reveal, .reveal-group');

if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );
    targets.forEach((el) => io.observe(el));
} else {
    targets.forEach((el) => el.classList.add('is-visible'));
}

// Bar interaktif: arahkan kursor / fokus / tap untuk melihat detail segmen
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

// Menu mobile
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

// Bayangan tipis pada navbar setelah scroll
const nav = document.getElementById('site-nav');
if (nav) {
    const onScroll = () => nav.classList.toggle('border-line', window.scrollY > 8);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
}
