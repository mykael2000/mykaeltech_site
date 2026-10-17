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
<body class="min-h-screen bg-ink-950 antialiased"
      x-data="{ mobileOpen: false, searchOpen: false, toastMessage: @json(session('toast') ?? null) }"
      x-init="$nextTick(() => { if (toastMessage) setTimeout(() => toastMessage = null, 4000); })"
      @keydown.escape.window="mobileOpen = false; searchOpen = false">

    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100] focus:rounded-lg focus:bg-brand-600 focus:px-4 focus:py-2 focus:text-white">Skip to content</a>
    <div id="scroll-progress" aria-hidden="true"></div>

    <header class="sticky top-0 z-50 border-b border-white/5 bg-ink-950/80 backdrop-blur-lg">
        <nav class="page-shell flex h-16 items-center justify-between gap-4" aria-label="Main">
            <a href="{{ route('home') }}" class="flex shrink-0 items-center" aria-label="MykaelTech home"><x-logo /></a>

            <div class="hidden items-center gap-1 md:flex">
                @foreach (['services' => 'Services', 'portfolio' => 'Portfolio', 'learn' => 'Learn', 'community' => 'Community', 'team' => 'Team', 'contact' => 'Contact'] as $route => $label)
                    <a href="{{ route($route) }}" data-nav-link
                       class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs($route.'*') ? 'active text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">{{ $label }}</a>
                @endforeach
            </div>

            <div class="hidden items-center gap-2 md:flex">
                <button type="button" @click="searchOpen = !searchOpen" class="rounded-lg p-2 text-slate-300 transition hover:bg-white/5 hover:text-white" aria-label="Search"><i data-lucide="search" class="h-5 w-5"></i></button>
                @auth
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                        <button type="button" @click="open = !open" class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">
                            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-gradient-to-br from-brand-500 to-violet-600 text-xs font-bold text-white">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                            <span class="max-w-[8rem] truncate">{{ auth()->user()->name }}</span>
                            <i data-lucide="chevron-down" class="h-4 w-4"></i>
                        </button>
                        <div x-show="open" x-transition.origin.top.right x-cloak class="glass-strong absolute right-0 mt-2 w-56 overflow-hidden rounded-xl py-1 shadow-2xl">
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-300 transition hover:bg-white/5 hover:text-white"><i data-lucide="layout-dashboard" class="h-4 w-4"></i>Dashboard</a>
                            <a href="{{ route('dashboard.profile') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-300 transition hover:bg-white/5 hover:text-white"><i data-lucide="user" class="h-4 w-4"></i>Profile</a>
                            <a href="{{ route('dashboard.cv') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-300 transition hover:bg-white/5 hover:text-white"><i data-lucide="shield-check" class="h-4 w-4"></i>CV generator</a>
                            <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="flex w-full items-center gap-2 px-4 py-2.5 text-sm text-slate-300 transition hover:bg-white/5 hover:text-white"><i data-lucide="log-out" class="h-4 w-4"></i>Log out</button></form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">Log in</a>
                    <a href="{{ route('join') }}" class="btn btn-primary !px-4 !py-2">Join free</a>
                @endauth
            </div>


            <button type="button" @click="mobileOpen = !mobileOpen" class="rounded-lg p-2 text-slate-300 transition hover:bg-white/5 hover:text-white md:hidden" :aria-expanded="mobileOpen.toString()" aria-label="Toggle menu">
                <i data-lucide="menu" class="h-6 w-6" x-show="!mobileOpen"></i>
                <i data-lucide="x" class="h-6 w-6" x-show="mobileOpen" x-cloak></i>
            </button>
        </nav>


        {{-- Search overlay --}}
        <div x-show="searchOpen" x-transition.opacity x-cloak style="display:none" class="border-t border-white/5 bg-ink-950/95 py-4 backdrop-blur-lg">
            <form method="GET" action="{{ route('search') }}" class="page-shell flex gap-3">
                <input type="text" name="q" placeholder="Search services, projects, posts…" class="input flex-1" autofocus>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        {{-- Mobile drawer --}}
        <div x-show="mobileOpen"
             x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 -translate-y-2"
             x-cloak style="display:none" class="border-t border-white/5 bg-ink-950/95 backdrop-blur-lg md:hidden">
            <div class="page-shell flex flex-col gap-1 py-4">
                @foreach (['services' => 'Services', 'portfolio' => 'Portfolio', 'learn' => 'Learn', 'community' => 'Community', 'team' => 'Team', 'contact' => 'Contact'] as $route => $label)
                    <a href="{{ route($route) }}" @click="mobileOpen = false" data-nav-link class="rounded-lg px-3 py-2.5 text-sm font-medium transition {{ request()->routeIs($route.'*') ? 'active text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">{{ $label }}</a>
                @endforeach
                <div class="my-2 border-t border-white/5"></div>
                <form method="GET" action="{{ route('search') }}" class="flex gap-2 px-1 pb-2">
                    <input type="text" name="q" placeholder="Search…" class="input flex-1 !py-2.5 text-sm">
                    <button type="submit" class="btn btn-primary !px-3" aria-label="Search"><i data-lucide="search" class="h-4 w-4"></i></button>
                </form>
                @auth
                    <a href="{{ route('dashboard') }}" @click="mobileOpen = false" class="rounded-lg px-3 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">Log out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" @click="mobileOpen = false" class="rounded-lg px-3 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">Log in</a>
                    <a href="{{ route('join') }}" @click="mobileOpen = false" class="btn btn-primary mt-1">Join free</a>
                @endauth
            </div>
        </div>
    </header>


    <main id="main" class="relative">
        {{-- Session toast (Alpine-driven) --}}
        <div x-show="toastMessage" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 translate-y-4" x-cloak style="display:none" class="fixed bottom-6 left-1/2 z-[95] -translate-x-1/2">
            <div class="glass-strong flex items-center gap-3 rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300 shadow-2xl">
                <i data-lucide="check" class="h-4 w-4"></i>
                <span x-text="toastMessage"></span>
            </div>
        </div>

        @if (session('success'))
            <div class="page-shell pt-4">
                <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">{{ session('success') }}</div>
            </div>
        @endif

        {{ $slot }}
    </main>

    {{-- Global modal host (driven by the Alpine `ui` store) --}}
    <div x-data x-show="$store.ui.open" x-transition.opacity x-cloak style="display:none" class="fixed inset-0 z-[110] flex items-center justify-center bg-black/70 p-4 backdrop-blur-sm" @keydown.escape.window="$store.ui.close()" @click.self="$store.ui.close()">
        <div x-show="$store.ui.open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="glass-strong relative w-full max-w-lg rounded-2xl p-6 shadow-2xl sm:p-8">
            <button type="button" @click="$store.ui.close()" class="absolute right-4 top-4 text-slate-400 transition hover:text-white" aria-label="Close"><i data-lucide="x" class="h-5 w-5"></i></button>
            <template x-if="$store.ui.record">
                <div>
                    <span class="badge" x-text="$store.ui.kind"></span>
                    <h3 class="mt-3 text-xl font-bold text-white" x-text="$store.ui.record.title"></h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-300" x-text="$store.ui.record.body || $store.ui.record.description"></p>
                </div>
            </template>
        </div>
    </div>

    {{-- Cookie-consent banner (Alpine `cookieConsent` component) --}}
    <div x-data="cookieConsent" x-show="visible" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 translate-y-6" x-cloak style="display:none" class="cookie-banner" role="dialog" aria-live="polite" aria-label="Cookie consent">
        <div class="glass-strong flex flex-col gap-4 rounded-2xl border border-white/10 p-5 shadow-2xl sm:flex-row sm:items-center sm:gap-6 sm:p-6">
            <div class="flex flex-1 items-start gap-3">
                <span class="mt-0.5 flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-brand-500/20 to-violet-600/20 text-brand-300 ring-1 ring-brand-500/30">
                    <i data-lucide="cookie" class="h-5 w-5"></i>
                </span>
                <div>
                    <p class="text-sm font-semibold text-white">We use cookies</p>
                    <p class="mt-1 text-xs leading-relaxed text-slate-400">We use cookies to improve your experience, analyse traffic and remember your preferences. By clicking “Accept”, you agree to our use of cookies.</p>
                </div>
            </div>
            <div class="flex shrink-0 gap-3">
                <button type="button" @click="decline" class="btn btn-secondary !px-4 !py-2 text-sm">Decline</button>
                <button type="button" @click="accept" class="btn btn-primary !px-4 !py-2 text-sm">Accept</button>
            </div>
        </div>
    </div>

    <footer class="relative mt-24 border-t border-white/5 bg-ink-950">
        <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
            <div class="hero-orb hero-orb-1"></div>
        </div>
        <div class="page-shell relative grid gap-10 py-14 md:grid-cols-4">
            <div class="md:col-span-1">
                <x-logo />
                <p class="mt-4 text-sm leading-relaxed text-slate-400">A technology community where builders showcase work, share learning updates and grow together.</p>
                <div class="mt-5 flex items-center gap-3">
                    <a href="https://github.com/mykael2000" target="_blank" rel="noopener" class="rounded-lg p-2 text-slate-400 transition hover:bg-white/5 hover:text-white" aria-label="GitHub"><i data-lucide="github" class="h-5 w-5"></i></a>
                    <a href="#" class="rounded-lg p-2 text-slate-400 transition hover:bg-white/5 hover:text-white" aria-label="Globe"><i data-lucide="globe-2" class="h-5 w-5"></i></a>
                </div>
            </div>

            <div>
                <p class="label">Explore</p>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li><a href="{{ route('services') }}" class="text-slate-400 transition hover:text-white">Services</a></li>
                    <li><a href="{{ route('portfolio') }}" class="text-slate-400 transition hover:text-white">Portfolio</a></li>
                    <li><a href="{{ route('learn') }}" class="text-slate-400 transition hover:text-white">Learn</a></li>
                    <li><a href="{{ route('community') }}" class="text-slate-400 transition hover:text-white">Community</a></li>
                </ul>
            </div>

            <div>
                <p class="label">Company</p>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li><a href="{{ route('team') }}" class="text-slate-400 transition hover:text-white">Team</a></li>
                    <li><a href="{{ route('contact') }}" class="text-slate-400 transition hover:text-white">Contact</a></li>
                    <li><a href="{{ route('search') }}" class="text-slate-400 transition hover:text-white">Search</a></li>
                    @auth
                        <li><a href="{{ route('dashboard') }}" class="text-slate-400 transition hover:text-white">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('join') }}" class="text-slate-400 transition hover:text-white">Join free</a></li>
                    @endauth
                </ul>
            </div>

            <div>
                <p class="label">Stay in the loop</p>
                <p class="mt-4 text-sm text-slate-400">Get learning updates and community news.</p>
                <form method="POST" action="{{ route('newsletter.subscribe') }}" class="mt-4 flex gap-2">
                    @csrf
                    <input type="email" name="email" required placeholder="you@example.com" class="input flex-1 !py-2.5 text-sm">
                    <button type="submit" class="btn btn-primary !px-4"><i data-lucide="send" class="h-4 w-4"></i></button>
                </form>
            </div>
        </div>

        <div class="border-t border-white/5">
            <div class="page-shell flex flex-col items-center justify-between gap-2 py-6 text-xs text-slate-500 sm:flex-row">
                <p>&copy; {{ date('Y') }} MykaelTech. All rights reserved.</p>
                <p>Built with the MykaelTech design system.</p>
            </div>
        </div>
    </footer>
</body>
</html>


