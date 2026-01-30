@php($theme = trim($__env->yieldContent('theme', 'dark')))
<footer class="mt-16 {{ $theme === 'light' ? 'border-t border-black/10' : 'border-t border-slate-800/70' }}">
    <div class="mx-auto max-w-6xl px-4 py-10 sm:px-6">
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <div class="text-sm font-semibold">WPGraphQL Gravity Forms</div>
                <div class="mt-3 text-sm {{ $theme === 'light' ? 'text-slate-600' : 'text-slate-300' }}">AxeWP plugin docs + marketing site.</div>
            </div>

            <div class="text-sm">
                <div class="font-semibold">Product</div>
                <div class="mt-3 grid gap-2 {{ $theme === 'light' ? 'text-slate-600' : 'text-slate-300' }}">
                    <a class="hover:text-white" href="{{ route('home') }}#features">Features</a>
                    <a class="hover:text-white" href="{{ route('home') }}#use-cases">Use cases</a>
                    <a class="hover:text-white" href="{{ route('docs.show') }}">Documentation</a>
                </div>
            </div>

            <div class="text-sm">
                <div class="font-semibold">Docs</div>
                <div class="mt-3 grid gap-2 {{ $theme === 'light' ? 'text-slate-600' : 'text-slate-300' }}">
                    <a class="hover:text-white" href="{{ route('docs.show', ['page' => 'installation']) }}">Installation</a>
                    <a class="hover:text-white" href="{{ route('docs.show', ['page' => 'querying-forms']) }}">Querying forms</a>
                    <a class="hover:text-white" href="{{ route('docs.show', ['page' => 'submitting-forms']) }}">Submitting forms</a>
                </div>
            </div>

            <div class="text-sm">
                <div class="font-semibold">Community</div>
                <div class="mt-3 grid gap-2 {{ $theme === 'light' ? 'text-slate-600' : 'text-slate-300' }}">
                    <a class="hover:text-white" href="https://github.com/AxeWP/wp-graphql-gravity-forms" target="_blank" rel="noreferrer">GitHub</a>
                    <a class="hover:text-white" href="https://github.com/AxeWP/wp-graphql-gravity-forms/issues" target="_blank" rel="noreferrer">Issues</a>
                    <a class="hover:text-white" href="https://github.com/AxeWP/wp-graphql-gravity-forms/releases" target="_blank" rel="noreferrer">Releases</a>
                </div>
            </div>
        </div>

        <div class="mt-10 flex flex-col gap-2 pt-6 text-xs sm:flex-row sm:items-center sm:justify-between {{ $theme === 'light' ? 'border-t border-black/10 text-slate-600' : 'border-t border-slate-800/70 text-slate-400' }}">
            <div>© {{ now()->year }} AxeWP. All rights reserved.</div>
            <div class="{{ $theme === 'light' ? 'text-slate-500' : 'text-slate-500' }}">Built with Laravel + Blade + Tailwind.</div>
        </div>
    </div>
</footer>
