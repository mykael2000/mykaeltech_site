<x-app-layout>
    <x-slot name="title">{{ $service->title }} — Services</x-slot>

    <section class="bg-glow relative overflow-hidden">
        <div class="page-shell page-shell--content page-hero" data-reveal>
            <a href="{{ route('services') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-300 hover:text-brand-200"><i data-lucide="arrow-left" class="h-4 w-4"></i>All services</a>
            <div class="mt-6 flex items-center gap-4 text-5xl">
                <span class="pro-icon" aria-hidden="true"><i data-lucide="layers-3" class="h-7 w-7"></i></span>
                <span class="hidden sm:block text-sm text-slate-400">/</span>
                <span class="hidden sm:block text-sm font-medium text-slate-300 capitalize">{{ $service->category }}</span>
            </div>
            <h1 class="mt-2 text-4xl font-extrabold text-white sm:text-5xl">{{ $service->title }}</h1>
            <p class="mt-4 text-lg text-slate-400 max-w-2xl">{{ $service->excerpt }}</p>
            @if ($service->starting_price)
                <p class="mt-4 text-sm font-semibold text-amber-300">Starting from <span class="text-white">{{ $service->starting_price }}</span></p>
            @endif
        </div>
    </section>

    <section class="page-shell page-shell--content page-section space-y-16">
        <!-- Description -->
        <div>
            <h2 class="text-2xl font-bold text-white">What you get</h2>
            <div class="mt-6 prose-invert-custom glass rounded-2xl p-8" data-reveal>
                {!! nl2br(e($service->description)) !!}
            </div>
        </div>

        <!-- Pricing / Starting point -->
        @if ($service->starting_price)
            <div class="page-card rounded-2xl border border-brand-400/20 bg-gradient-to-br from-brand-600/10 to-violet-600/10">
                <div class="flex items-center gap-3 text-sm font-semibold uppercase tracking-wider text-brand-300">
                    <span data-lucide="circle-dollar-sign" class="h-5 w-5"></span> Starting price
                </div>
                <p class="mt-2 text-3xl font-extrabold text-white">{{ $service->starting_price }}</p>
                <p class="mt-1 text-sm text-slate-400">Estimated range — final quote depends on scope and requirements</p>
            </div>
        @endif

        <!-- CTA -->
        <div class="page-card rounded-2xl border border-brand-400/20 bg-brand-500/5 text-center">
            <h2 class="text-2xl font-bold text-white">Ready to start this project?</h2>
            <p class="mt-2 text-slate-400">Tell us about your idea — we reply within 24 hours with a free preliminary assessment.</p>
            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-3">
                <a href="{{ route('contact') }}" class="rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-8 py-3.5 font-semibold text-white transition hover:from-brand-400 hover:to-violet-500">
                    Start a conversation
                </a>
                <a href="{{ route('portfolio') }}" class="rounded-xl border border-white/15 bg-white/5 px-8 py-3.5 font-semibold text-white transition hover:bg-white/10">
                    See our work first
                </a>
            </div>
        </div>

        <!-- Related projects -->
        @if ($relatedProjects->isNotEmpty())
            <div>
                <h2 class="text-2xl font-bold text-white">Related work</h2>
                <div class="page-grid mt-8 sm:grid-cols-2 lg:grid-cols-3" data-reveal>
                    @foreach ($relatedProjects as $project)
                        <a href="{{ route('portfolio.show', $project->slug) }}" class="card-hover glass page-card rounded-2xl hover-zoom">
                            <div class="h-36 flex items-center justify-center rounded-xl bg-gradient-to-br from-brand-500/10 to-violet-500/10 text-3xl">
                                <span class="pro-icon" aria-hidden="true"><i data-lucide="monitor" class="h-7 w-7"></i></span>
                            </div>
                            <span class="mt-3 text-xs font-semibold uppercase tracking-wider text-brand-300">{{ $project->category }}</span>
                            <h3 class="mt-1 font-bold text-white">{{ $project->title }}</h3>
                            <p class="mt-1.5 line-clamp-2 text-sm text-slate-400">{{ Str::limit($project->excerpt, 90) }}</p>
                            <span class="mt-3 inline-flex items-center text-xs font-semibold text-slate-400 hover:text-brand-300">
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:text-brand-300">View case study <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i></span>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</x-app-layout>
