<x-app-layout>
    <x-slot name="title">Page not found</x-slot>

    <section class="mx-auto flex min-h-[60vh] max-w-3xl flex-col items-center justify-center px-4 text-center">
        <div class="text-8xl font-extrabold text-brand-500">404</div>
        <h1 class="mt-4 text-3xl font-bold text-white">Lost in cyberspace</h1>
        <p class="mt-3 text-slate-400">The page you're looking for doesn't exist — but plenty of cool ones do.</p>
        <div class="mt-8 flex gap-3">
            <a href="{{ url('/') }}" class="rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-6 py-3 font-semibold text-white hover:from-brand-400 hover:to-violet-500">Back home</a>
            <a href="{{ url('/community') }}" class="rounded-xl border border-white/15 bg-white/5 px-6 py-3 font-semibold text-white hover:bg-white/10">Explore community</a>
        </div>
    </section>
</x-app-layout>
