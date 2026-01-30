<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'WPGraphQL Gravity Forms')</title>
        <meta name="description" content="@yield('meta_description', 'Expose Gravity Forms data and entries over WPGraphQL.')">
        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:type" content="website">
        <meta property="og:title" content="@yield('og_title', trim($__env->yieldContent('title', 'WPGraphQL Gravity Forms')))" />
        <meta property="og:description" content="@yield('og_description', trim($__env->yieldContent('meta_description', 'Expose Gravity Forms data and entries over WPGraphQL.')))" />
        <meta property="og:url" content="{{ url()->current() }}" />

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

        @vite(['resources/css/app.css','resources/js/app.js'])

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        @stack('head')
    </head>
    @php($theme = trim($__env->yieldContent('theme', 'dark')))
    <body class="min-h-screen {{ $theme === 'light' ? 'bg-[#f6f1e8] text-slate-950 selection:bg-slate-900/10 selection:text-slate-950' : 'bg-slate-950 text-slate-100 selection:bg-cyan-400/30 selection:text-slate-50' }}">
        <div class="relative">
            @if ($theme !== 'light')
                <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(rgba(148,163,184,0.18)_1px,transparent_1px)] [background-size:22px_22px] [background-position:-8px_-8px] opacity-35"></div>
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-cyan-500/10 via-transparent to-transparent"></div>
            @endif

            @if ($theme === 'light')
                <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
                    @php($blobA = random_int(10, 22) / 100)
                    @php($blobB = random_int(8, 18) / 100)
                    @php($blobC = random_int(6, 16) / 100)
                    @php($blobD = random_int(8, 20) / 100)

                    <img
                        data-animate="bg-blob"
                        src="{{ asset('assets/blob.svg') }}"
                        alt=""
                        class="absolute -top-52 right-[-18rem] w-[58rem] blur-3xl mix-blend-multiply"
                        style="opacity: {{ $blobA }}"
                    >

                    <img
                        data-animate="bg-blob"
                        src="{{ asset('assets/blob%20(2).svg') }}"
                        alt=""
                        class="absolute top-[18rem] left-[-18rem] w-[48rem] blur-3xl mix-blend-multiply"
                        style="opacity: {{ $blobB }}"
                    >

                    <img
                        data-animate="bg-blob"
                        src="{{ asset('assets/blob%20(4).svg') }}"
                        alt=""
                        class="absolute top-[55rem] right-[-20rem] w-[52rem] blur-3xl mix-blend-multiply"
                        style="opacity: {{ $blobC }}"
                    >

                    <img
                        data-animate="bg-blob"
                        src="{{ asset('assets/blob%20(1).svg') }}"
                        alt=""
                        class="absolute bottom-[-28rem] left-[-16rem] w-[56rem] blur-3xl mix-blend-multiply"
                        style="opacity: {{ $blobD }}"
                    >
                </div>
            @endif

            @include('partials.nav')

            <main class="{{ trim($__env->yieldContent('main_class', 'mx-auto w-full max-w-6xl px-4 sm:px-6')) }}">
                @yield('content')
            </main>

            @include('partials.footer')
        </div>

        @stack('scripts')
    </body>
</html>
