<x-app-layout>
    <x-slot name="title">404 — Page not found</x-slot>

    <section class="bg-glow">
        <div class="page-shell page-hero text-center" data-reveal>
            <p class="text-8xl font-black text-transparent" style="background:linear-gradient(90deg,#22d3ee,#a78bfa);-webkit-background-clip:text;background-clip:text;">404</p>
            <h1 class="mt-4 text-3xl font-extrabold text-white sm:text-4xl">This page drifted off the grid.</h1>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-400">The link you followed doesn't exist — but plenty does.</p>

            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="{{ route('home') }}" class="btn btn-primary shine !px-6 !py-3">Back home <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                <a href="{{ route('community') }}" class="btn !border !border-white/10 !bg-white/5 !px-6 !py-3 text-white hover:!bg-white/10">Join the community</a>
            </div>
        </div>

        <div class="page-shell pb-14">
            <div class="mx-auto grid max-w-3xl gap-4 sm:grid-cols-3">
                <a href="{{ route('services') }}" class="glass card-hover rounded-2xl p-5 text-left">
                    <i data-lucide="layers-3" class="h-5 w-5 text-brand-400"></i>
                    <p class="mt-3 font-semibold text-white">Services</p>
                    <p class="mt-1 text-sm text-slate-400">See what we build.</p>
                </a>
                <a href="{{ route('portfolio') }}" class="glass card-hover rounded-2xl p-5 text-left">
                    <i data-lucide="rocket" class="h-5 w-5 text-brand-400"></i>
                    <p class="mt-3 font-semibold text-white">Portfolio</p>
                    <p class="mt-1 text-sm text-slate-400">Browse our work.</p>
                </a>
                <a href="{{ route('learn') }}" class="glass card-hover rounded-2xl p-5 text-left">
                    <i data-lucide="book-open" class="h-5 w-5 text-brand-400"></i>
                    <p class="mt-3 font-semibold text-white">Learn</p>
                    <p class="mt-1 text-sm text-slate-400">Read community posts.</p>
                </a>
            </div>
        </div>
    </section>
</x-app-layout>

