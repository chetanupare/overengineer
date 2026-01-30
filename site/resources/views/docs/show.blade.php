@extends('layouts.app')

@section('title', $title . ' — Docs')
@section('theme', 'light')
@section('main_class', 'w-full')

@section('content')
    <div id="docs-app">
    <section class="relative overflow-hidden border-b border-black/10" data-animate="fade-up">
        <div id="docs-particles" class="pointer-events-none absolute inset-0"></div>
        <div class="mx-auto w-full max-w-6xl px-6 py-12 sm:px-10">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full bg-white/60 px-3 py-1 text-xs font-semibold text-slate-800 shadow-sm ring-1 ring-black/5">
                    <span class="h-1.5 w-1.5 rounded-full bg-cyan-500"></span>
                    <span>Documentation</span>
                </div>
                <h1 id="docs-title" class="mt-5 text-3xl font-semibold tracking-tight text-slate-950 sm:text-4xl">{{ $title }}</h1>
            </div>

            <div class="hidden sm:block">
                <a href="https://github.com/AxeWP/wp-graphql-gravity-forms" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center rounded-xl bg-slate-950 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-900">GitHub</a>
            </div>
        </div>
        </div>
    </section>

    <section class="py-10">
        <div class="mx-auto w-full max-w-6xl px-6 sm:px-10">
            <div class="grid gap-8 lg:grid-cols-12">
            <aside class="lg:col-span-4 xl:col-span-3">
                <div class="sticky top-24" data-animate="fade-up">
                    <div class="rounded-3xl bg-white/70 p-5 shadow-sm ring-1 ring-black/5">
                        <div class="text-xs font-semibold uppercase tracking-wide text-slate-600">Docs</div>
                        <div class="mt-4 space-y-5">
                            @foreach ($sections as $section)
                                <div>
                                    <div class="text-xs font-semibold text-slate-600">{{ $section['title'] }}</div>
                                    <div class="mt-2 grid gap-1 text-sm text-slate-800">
                                        @foreach ($section['pages'] as $link)
                                            @php($isActive = $page === $link['slug'])
                                            <a
                                                class="rounded-xl px-3 py-2 transition {{ $isActive ? 'bg-slate-950 text-white' : 'hover:bg-black/5' }}"
                                                href="{{ route('docs.show', ['page' => $link['slug']]) }}"
                                            >
                                                {{ $link['title'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </aside>

            <article class="lg:col-span-8 xl:col-span-9">
                <div class="rounded-3xl bg-white/80 p-6 shadow-sm ring-1 ring-black/5 sm:p-10" data-animate="fade-up">
                    <div id="docs-content" class="markdown markdown--light max-w-none">
                        {!! Illuminate\Support\Str::markdown($markdown) !!}
                    </div>
                </div>
            </article>
            </div>
        </div>
    </section>
@endsection
    </div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        (function () {
            const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const isMobile = window.innerWidth < 768;
            if (reduceMotion || isMobile) return;

            const el = document.getElementById('docs-particles');
            if (!el || typeof window.particlesJS !== 'function') return;

            window.particlesJS('docs-particles', {
                particles: {
                    number: { value: 38, density: { enable: true, value_area: 1000 } },
                    color: { value: '#E535AB' },
                    shape: { type: 'circle' },
                    opacity: { value: 0.22, random: true },
                    size: { value: 2.2, random: true },
                    line_linked: {
                        enable: true,
                        distance: 170,
                        color: '#E535AB',
                        opacity: 0.16,
                        width: 1,
                    },
                    move: {
                        enable: true,
                        speed: 0.45,
                        direction: 'none',
                        random: false,
                        straight: false,
                        out_mode: 'out',
                        bounce: false,
                    },
                },
                interactivity: {
                    detect_on: 'canvas',
                    events: {
                        onhover: { enable: true, mode: 'grab' },
                        onclick: { enable: false, mode: 'push' },
                        resize: true,
                    },
                    modes: {
                        grab: { distance: 180, line_linked: { opacity: 0.25 } },
                    },
                },
                retina_detect: true,
            });
        })();
    </script>
@endpush
