<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — MykaelTech</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-slate-950 text-slate-200">
<div class="flex min-h-screen">
    <aside class="w-60 shrink-0 border-r border-white/10 bg-black/40 p-4">
        <a href="{{ route('home') }}" class="mb-6 flex items-center gap-2 px-2 text-white">
            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-indigo-500 to-violet-600 font-black">M</div>
            <span class="font-bold">MykaelTech <span class="text-xs text-slate-500">Admin</span></span>
        </a>
        <nav class="space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-3 py-2 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-500/20 text-white' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">📊 Overview</a>
            @foreach (config('admin.resources') as $key => $res)
                <a href="{{ route('admin.resource.index', $key) }}" class="block rounded-lg px-3 py-2 {{ request()->routeIs('admin.resource.*') && request()->route('resource') === $key ? 'bg-indigo-500/20 text-white' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    {{ $res['icon'] }} {{ $res['label'] }}
                </a>
            @endforeach
            <div class="my-3 border-t border-white/10"></div>
            <a href="{{ route('home') }}" class="block rounded-lg px-3 py-2 text-slate-400 hover:bg-white/5 hover:text-white">↩ View site</a>
        </nav>
    </aside>
    <main class="flex-1 overflow-x-hidden p-8">
        @if (session('success'))
            <div class="mb-6 rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</div>
</body>
</html>
