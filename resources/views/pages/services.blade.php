<x-app-layout>
    <x-slot name="title">Services</x-slot>

    <section class="bg-glow">
        <div class="mx-auto max-w-7xl px-4 py-20 text-center sm:px-6 lg:px-8" data-reveal>
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl">Our Services</h1>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-400">
                Everything you need to design, build and scale modern software — delivered by engineers who love the craft.
            </p>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 pb-24 sm:px-6 lg:px-8">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($services as $service)
                <a href="{{ route('services.show', $service->slug) }}" class="card-hover group glass flex flex-col rounded-2xl p-7" data-reveal>
                    <div class="text-4xl">{{ $service->icon ?? '⚡' }}</div>
                    <h2 class="mt-5 text-xl font-bold text-white group-hover:text-brand-300">{{ $service->title }}</h2>
                    <p class="mt-3 flex-1 text-sm leading-relaxed text-slate-400">{{ $service->excerpt }}</p>
                    @if ($service->starting_price)
                        <p class="mt-4 text-sm font-semibold text-brand-300">From {{ $service->starting_price }}</p>
                    @endif
                    <span class="mt-4 text-sm font-semibold text-brand-300 opacity-0 transition group-hover:opacity-100">Details →</span>
                </a>
            @empty
                <p class="text-slate-400">Services coming soon.</p>
            @endforelse
        </div>
    </section>
</x-app-layout>
