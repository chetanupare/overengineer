@php($theme = trim($__env->yieldContent('theme', 'dark')))
<header class="sticky top-0 z-50 backdrop-blur {{ $theme === 'light' ? 'border-b border-black/5 bg-[#f6f1e8]/70' : 'border-b border-slate-800/70 bg-slate-950/70' }}">
    <div x-data="{ open: false }" class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-cyan-300 to-cyan-600 shadow-[0_0_0_1px_rgba(148,163,184,0.12),0_20px_50px_rgba(0,0,0,0.45)]">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                    <path d="M7 17V7l10 5-10 5Z" fill="rgba(15,23,42,0.95)" />
                </svg>
            </span>
            <span class="text-sm font-semibold tracking-tight {{ $theme === 'light' ? 'text-slate-950' : '' }}">WPGraphQL Gravity Forms</span>
        </a>

        <nav class="hidden items-center gap-6 text-sm md:flex {{ $theme === 'light' ? 'text-slate-700' : 'text-slate-200' }}">
            <a class="{{ $theme === 'light' ? 'hover:text-slate-950' : 'hover:text-white' }}" href="{{ route('docs.show') }}">Docs</a>
            <a class="{{ $theme === 'light' ? 'hover:text-slate-950' : 'hover:text-white' }}" href="{{ route('home') }}#features">Features</a>
            <a class="{{ $theme === 'light' ? 'hover:text-slate-950' : 'hover:text-white' }}" href="{{ route('home') }}#use-cases">Use cases</a>
            <a class="{{ $theme === 'light' ? 'hover:text-slate-950' : 'hover:text-white' }}" href="https://github.com/AxeWP/wp-graphql-gravity-forms" target="_blank" rel="noreferrer">GitHub</a>
            <a class="inline-flex items-center rounded-lg bg-slate-950 px-3 py-2 text-sm font-semibold text-white hover:bg-slate-900" href="{{ route('docs.show') }}">Get started</a>
        </nav>

        <button
            type="button"
            class="inline-flex items-center justify-center rounded-lg px-3 py-2 text-sm md:hidden {{ $theme === 'light' ? 'border border-black/10 bg-white/60 text-slate-800 hover:bg-white' : 'border border-slate-800 bg-slate-900/40 text-slate-200 hover:bg-slate-900' }}"
            aria-label="Open menu"
            @click="open = !open"
            :aria-expanded="open"
        >
            Menu
        </button>

        <div x-cloak x-show="open" class="absolute left-0 right-0 top-full md:hidden {{ $theme === 'light' ? 'border-t border-black/10 bg-[#f6f1e8]/95' : 'border-t border-slate-800/70 bg-slate-950/90' }}">
            <div class="mx-auto max-w-6xl px-4 py-4 sm:px-6">
                <div class="grid gap-3 text-sm {{ $theme === 'light' ? 'text-slate-800' : 'text-slate-200' }}">
                    <a class="{{ $theme === 'light' ? 'hover:text-slate-950' : 'hover:text-white' }}" href="{{ route('docs.show') }}">Docs</a>
                    <a class="{{ $theme === 'light' ? 'hover:text-slate-950' : 'hover:text-white' }}" href="{{ route('home') }}#features">Features</a>
                    <a class="{{ $theme === 'light' ? 'hover:text-slate-950' : 'hover:text-white' }}" href="{{ route('home') }}#use-cases">Use cases</a>
                    <a class="{{ $theme === 'light' ? 'hover:text-slate-950' : 'hover:text-white' }}" href="https://github.com/AxeWP/wp-graphql-gravity-forms" target="_blank" rel="noreferrer">GitHub</a>
                    <a class="mt-2 inline-flex items-center justify-center rounded-lg bg-slate-950 px-3 py-2 text-sm font-semibold text-white hover:bg-slate-900" href="{{ route('docs.show') }}">Get started</a>
                </div>
            </div>
        </div>
    </div>
</header>
