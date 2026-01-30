import './bootstrap';

import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

const random = gsap.utils.random;

function shouldReduceMotion() {
    return window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
}

function isMobile() {
    return window.innerWidth < 768;
}

function setWillChange(el) {
    if (!el || !(el instanceof HTMLElement)) return;
    el.style.willChange = 'transform, opacity';
}

function animateHero() {
    document.querySelectorAll('[data-animate="hero"]').forEach((el) => {
        const children = Array.from(el.children);
        children.forEach(setWillChange);

        gsap.from(children, {
            opacity: 0,
            y: 20,
            duration: 0.8,
            stagger: 0.1,
            ease: 'power2.out',
            clearProps: 'transform,opacity',
        });
    });
}

function initDocsNavigation() {
    const app = document.getElementById('docs-app');
    if (!app) return;

    const titleEl = document.getElementById('docs-title');
    const contentEl = document.getElementById('docs-content');
    if (!titleEl || !contentEl) return;

    console.log('[Docs] Client-side navigation enabled');

    let abortController = null;

    const setActive = () => {
        const current = window.location.pathname.replace(/\/$/, '');
        document.querySelectorAll('a[href^="/docs"]').forEach((a) => {
            const href = (a.getAttribute('href') || '').replace(/\/$/, '');
            const isActive = href !== '' && href === current;
            a.classList.toggle('bg-slate-950', isActive);
            a.classList.toggle('text-white', isActive);
        });
    };

    const fetchPartial = async (url) => {
        const u = new URL(url, window.location.origin);
        u.searchParams.set('_partial', '1');

        if (abortController) abortController.abort();
        abortController = new AbortController();

        const res = await fetch(u.toString(), {
            headers: { 'X-Requested-With': 'fetch' },
            signal: abortController.signal,
            credentials: 'same-origin',
        });

        if (!res.ok) throw new Error(`Failed to load: ${res.status}`);
        return res.json();
    };

    const render = async (url, { push = true } = {}) => {
        console.log('[Docs] Loading:', url);
        const data = await fetchPartial(url);

        const doSwap = () => {
            titleEl.textContent = data.title;
            contentEl.innerHTML = data.html;
            document.title = `${data.title} — Docs`;
            setActive();
            console.log('[Docs] Loaded:', url);
        };

        // Always fade, even without GSAP, to make it obvious we’re swapping
        contentEl.style.transition = 'opacity 0.15s ease-out';
        contentEl.style.opacity = '0';
        setTimeout(() => {
            doSwap();
            contentEl.style.opacity = '1';
        }, 150);

        if (push) {
            window.history.pushState({ url }, '', url);
        }
    };

    document.addEventListener('click', (e) => {
        const a = e.target instanceof Element ? e.target.closest('a') : null;
        if (!a) return;

        const href = a.getAttribute('href');
        if (!href || !href.startsWith('/docs')) return;
        if (a.getAttribute('target') === '_blank') return;
        if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;

        e.preventDefault();
        console.log('[Docs] Intercepted click:', href);
        render(href, { push: true }).catch((err) => {
            console.warn('[Docs] Fallback to full navigation', err);
            window.location.href = href;
        });
    });

    window.addEventListener('popstate', () => {
        render(window.location.pathname + window.location.search, { push: false }).catch(() => {
            window.location.reload();
        });
    });

    setActive();
}

function animateBackgroundBlobs() {
    if (isMobile()) return;

    document.querySelectorAll('[data-animate="bg-blob"]').forEach((el) => {
        setWillChange(el);

        gsap.set(el, {
            x: random(-18, 18),
            y: random(-18, 18),
            rotate: random(-6, 6),
        });

        gsap.to(el, {
            x: random(-34, 34),
            y: random(-34, 34),
            rotate: random(-10, 10),
            duration: random(18, 34),
            ease: 'sine.inOut',
            yoyo: true,
            repeat: -1,
        });
    });
}

function animateGraphqlLogo() {
    document.querySelectorAll('[data-animate="graphql-logo"]').forEach((el) => {
        setWillChange(el);

        gsap.timeline()
            .from(el, {
                opacity: 0,
                scale: 0.92,
                y: -10,
                rotate: -8,
                duration: 0.6,
                ease: 'power2.out',
                clearProps: 'transform,opacity',
            })
            .to(el, {
                y: -8,
                duration: 2.6,
                ease: 'sine.inOut',
                repeat: -1,
                yoyo: true,
            }, 0)
            .to(el, {
                rotate: 360,
                duration: 40,
                ease: 'none',
                repeat: -1,
            }, 0);
    });
}

function animateFadeUpOnScroll() {
    document.querySelectorAll('[data-animate="fade-up"]').forEach((el) => {
        setWillChange(el);

        gsap.from(el, {
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                once: true,
            },
            opacity: 0,
            y: 24,
            duration: 0.6,
            ease: 'power2.out',
            clearProps: 'transform,opacity',
        });
    });
}

function animateStaggerGridsOnScroll() {
    document.querySelectorAll('[data-animate="stagger"]').forEach((container) => {
        const items = Array.from(container.children);
        if (items.length === 0) return;

        items.forEach(setWillChange);

        gsap.from(items, {
            scrollTrigger: {
                trigger: container,
                start: 'top 75%',
                once: true,
            },
            opacity: 0,
            y: 20,
            stagger: 0.12,
            duration: 0.5,
            ease: 'power2.out',
            clearProps: 'transform,opacity',
        });
    });
}

function initAnimations() {
    if (shouldReduceMotion()) return;

    animateBackgroundBlobs();
    animateHero();
    animateGraphqlLogo();

    if (isMobile()) return;

    gsap.registerPlugin(ScrollTrigger);
    animateFadeUpOnScroll();
    animateStaggerGridsOnScroll();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAnimations);
    document.addEventListener('DOMContentLoaded', initDocsNavigation);
} else {
    initAnimations();
    initDocsNavigation();
}
