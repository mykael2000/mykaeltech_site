<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 — Page not found</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={theme:{extend:{colors:{brand:{50:'#f0f9ff',500:'#0ea5e9',600:'#0284c7'}}}}}</script>
</head>
<body class="flex min-h-screen items-center justify-center bg-slate-950 px-4 text-center">
    <div>
        <div class="text-8xl font-black text-transparent" style="background:linear-gradient(90deg,#0ea5e9,#8b5cf6);-webkit-background-clip:text;background-clip:text;">404</div>
        <h1 class="mt-4 text-2xl font-bold text-white">This page drifted off the grid.</h1>
        <p class="mt-2 text-slate-400">The link you followed doesn't exist — but plenty does.</p>
        <div class="mt-8 flex justify-center gap-3">
            <a href="{{ url('/') }}" class="rounded-xl bg-gradient-to-r from-sky-500 to-violet-600 px-6 py-3 font-semibold text-white">Back home</a>
            <a href="{{ url('/community') }}" class="rounded-xl border border-white/15 bg-white/5 px-6 py-3 font-semibold text-white">Join the community</a>
        </div>
    </div>
</body>
</html>
