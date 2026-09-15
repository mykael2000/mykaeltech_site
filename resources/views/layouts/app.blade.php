<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@isset($title){{ $title }} — MykaelTech @else MykaelTech — Build. Learn. Belong. @endisset</title>
    <meta name="description" content="@isset($metaDescription){{ $metaDescription }} @else MykaelTech is a technology community: services, portfolio showcases, learning updates, tech facts and a CV builder for members. @endisset">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="MykaelTech">
    <meta property="og:title" content="@isset($title){{ $title }} @else MykaelTech — Build. Learn. Belong. @endisset">
    <meta property="og:description" content="@isset($metaDescription){{ $metaDescription }} @else Join a growing community of builders. Showcase your portfolio, publish learning updates, and generate a polished CV. @endisset">
    <meta property="og:url" content="{{ url()->current() }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,{!! rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><path d="M24 2.5 42.5 13v22L24 45.5 5.5 35V13L24 2.5Z" stroke="#22d3ee" stroke-width="3" fill="rgba(14,165,233,0.15)"/><path d="M14 32V17.5l5.5 8 4.5-8 4.5 8 5.5-8V32" stroke="#22d3ee" stroke-width="3.2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>') !!}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-ink-950 antialiased" x-data="{
    mobileOpen: false,
    toastMessage: @json(session('toast') ?? null)
}" x-init="
    $nextTick(() => {
        if (toastMessage) setTimeout(() => toastMessage = null, 4000);
    });
    $watch('mobileOpen', (val) => {
        document.documentElement.classList.toggle('mobile-menu-open', val);
    });
">
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:z-[100] focus:bg-brand-600 focus:px-4 focus:py-2 focus:text-white">Skip to content</a>

    <header class="sticky top-0 z-50 border-b border-white/5 bg-ink-950/80 backdrop-blur-lg">
        <nav class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8" aria-label="Main">
            <a href="{{ route('home') }}" class="flex items-center" aria-label="MykaelTech home">
                <x-logo />
            </a>

            <div class="hidden items-center gap-1 md:flex">
                @foreach (['services' => 'Services', 'portfolio' => 'Portfolio', 'learn' => 'Learn', 'community' => 'Community', 'team' => 'Team', 'contact' => 'Contact'] as $route => $label)
                    <a href="{{ route($route) }}"
                       class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs($route.'*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
            <div class="hidden items-center gap-3 md:flex">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-sm font-medium text-slate-300 transition hover:text-white">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-slate-400 transition hover:text-white">Log out</button>
                    </form>
                    <a href="{{ route('dashboard.cv.download') }}" class="rounded-lg bg-gradient-to-r from-brand-500 to-brand-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-brand-500/25 transition hover:from-brand-400 hover:to-brand-500">
                        My CV
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-300 transition hover:text-white">Log in</a>
                    <a href="{{ route('join') }}" class="rounded-lg bg-gradient-to-r from-brand-500 to-violet-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-brand-500/25 transition hover:from-brand-400 hover:to-violet-500">
                        Join Community
                    </a>
                @endauth
            </div>

            <button class="rounded-lg p-2 text-slate-300 hover:bg-white/10 md:hidden" x-on:click="mobileOpen = ! mobileOpen" aria-label="Toggle menu" :aria-expanded="mobileOpen">
                <svg x-show="! mobileOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="mobileOpen" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </nav>

        {{-- Mobile menu --}}
        <div x-show="mobileOpen" x-cloak x-transition.origin.top class="border-t border-white/5 bg-ink-900 px-4 pb-6 pt-3 md:hidden">
            <div class="flex flex-col gap-1">
                @foreach (['services' => 'Services', 'portfolio' => 'Portfolio', 'learn' => 'Learn', 'community' => 'Community', 'team' => 'Team', 'contact' => 'Contact'] as $route => $label)
                    <a href="{{ route($route) }}" class="rounded-lg px-3 py-2.5 text-base font-medium text-slate-200 hover:bg-white/5 {{ request()->routeIs($route.'*') ? 'bg-white/10 text-white' : '' }}">{{ $label }}</a>
                @endforeach
                <div class="mt-3 flex flex-col gap-2 border-t border-white/5 pt-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="rounded-lg bg-white/10 px-4 py-2.5 text-center font-semibold text-white">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">@csrf
                            <button class="w-full rounded-lg px-4 py-2.5 text-center text-slate-300">Log out</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="rounded-lg px-4 py-2.5 text-center text-slate-300">Log in</a>
                        <a href="{{ route('join') }}" class="rounded-lg bg-gradient-to-r from-brand-500 to-violet-600 px-4 py-2.5 text-center font-semibold text-white">Join Community</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main id="main">
        @if (session('success'))
            <div class="mx-auto mt-6 max-w-7xl px-4 sm:px-6 lg:px-8" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 6000)">
                <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>
    <footer class="mt-24 border-t border-white/5 bg-ink-900/60">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="grid gap-10 md:grid-cols-4">
                <div class="md:col-span-2">
                    <x-logo />
                    <p class="mt-4 max-w-md text-sm leading-relaxed text-slate-400">
                        Building technology, people and community. Showcase your work, learn in public,
                        and grow with a network of builders, designers and engineers.
                    </p>
                    <form method="POST" action="{{ route('newsletter.subscribe') }}" class="mt-6 flex max-w-sm gap-2">
                        @csrf
                        <input type="email" name="email" required placeholder="you@example.com" aria-label="Email address"
                               class="w-full rounded-lg border border-white/10 bg-ink-800 px-3.5 py-2.5 text-sm text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                        <button class="rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-500">
                            Subscribe
                        </button>
                    </form>
                </div>

                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-300">Explore</h3>
                    <ul class="mt-4 space-y-2.5 text-sm text-slate-400">
                        @foreach (['services' => 'Services', 'portfolio' => 'Portfolio', 'learn' => 'Learning Updates', 'community' => 'Community', 'team' => 'Team', 'contact' => 'Contact'] as $route => $label)
                            <li><a href="{{ route($route) }}" class="transition hover:text-brand-300">{{ $label }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-300">Community</h3>
                    <ul class="mt-4 space-y-2.5 text-sm text-slate-400">
                        <li><a href="{{ route('join') }}" class="transition hover:text-brand-300">Become a member</a></li>
                        <li><a href="{{ route('login') }}" class="transition hover:text-brand-300">Member login</a></li>
                        <li><a href="{{ route('dashboard.cv') }}" class="transition hover:text-brand-300">CV generator</a></li>
                        <li><a href="{{ route('community') }}" class="transition hover:text-brand-300">Events</a></li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 flex flex-col items-center justify-between gap-4 border-t border-white/5 pt-8 text-sm text-slate-500 sm:flex-row">
                <p>&copy; {{ now()->year }} MykaelTech. All rights reserved.</p>
                <p class="flex items-center gap-1.5">
                    <span class="inline-block h-2 w-2 animate-pulse rounded-full bg-emerald-400"></span>
                    Built with Laravel — always online, always improving.
                </p>
            </div>
        </div>
    </footer>

    <style>[x-cloak]{display:none!important}</style>
</body>
</html>
