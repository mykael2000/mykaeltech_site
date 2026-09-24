<x-app-layout>
    <x-slot name="title">Services</x-slot>

    <section class="bg-glow">
        <div class="page-shell page-hero text-center" data-reveal>
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl">Our Services</h1>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-400">
                Everything you need to design, build and scale modern software — delivered by engineers who love the craft.
            </p>
        </div>
    </section>

    <section class="page-shell page-section">
        <div class="page-grid md:grid-cols-2 lg:grid-cols-3">
            @forelse ($services as $service)
                <a href="{{ route('services.show', $service->slug) }}" class="card-hover group glass flex flex-col rounded-2xl page-card" data-reveal>
                    <div class="pro-icon" aria-hidden="true"><i data-lucide="layers-3" class="h-7 w-7"></i></div>
                    <h2 class="mt-5 text-xl font-bold text-white group-hover:text-brand-300">{{ $service->title }}</h2>
                    <p class="mt-3 flex-1 text-sm leading-relaxed text-slate-400">{{ $service->excerpt }}</p>
                    @if ($service->starting_price)
                        <p class="mt-4 text-sm font-semibold text-brand-300">From {{ $service->starting_price }}</p>
                    @endif
                    <span class="pro-link">Details <i data-lucide="arrow-right" class="h-4 w-4"></i></span>
                </a>
            @empty
                <p class="text-slate-400">Services coming soon.</p>
            @endforelse
        </div>
    </section>
</x-app-layout>
