<x-app-layout>
    <x-slot name="title">{{ $project->title }} — Portfolio</x-slot>

    <section class="bg-glow relative overflow-hidden">
        <div class="page-shell page-shell--content page-hero" data-reveal>
            <a href="{{ route('portfolio') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-300 hover:text-brand-200"><i data-lucide="arrow-left" class="h-4 w-4"></i>Back to portfolio</a>
            <div class="mt-8 flex items-start justify-between gap-6">
                <div>
                    <span class="mt-2 inline-block rounded-full bg-brand-500/15 px-3 py-1 text-xs font-semibold text-brand-300">{{ $project->category }}</span>
                    <h1 class="mt-3 text-4xl font-extrabold text-white sm:text-5xl">{{ $project->title }}</h1>
                    <p class="mt-4 text-lg text-slate-400 max-w-2xl">{{ $project->short_description }}</p>
                </div>
                @if ($project->cover_photo)
                    <div class="h-40 w-44 shrink-0 rounded-2xl bg-gradient-to-br from-brand-500/20 to-violet-500/20 overflow-hidden">
                        <img src="{{ Storage::url($project->cover_photo) }}" alt="{{ $project->title }}" class="h-full w-full object-cover" loading="lazy">
                    </div>
                @endif
            </div>
            <div class="mt-6 flex flex-wrap items-center gap-3">
                @if ($project->external_url)
                    <a href="{{ $project->external_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 rounded-xl bg-gradient-to-r from-brand-500 to-brand-600 px-6 py-3 text-sm font-semibold text-white transition hover:from-brand-400 hover:to-brand-500">
                        <i data-lucide="globe-2" class="h-4 w-4"></i> View live site
                    </a>
                @endif
                @if ($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 rounded-xl border border-white/15 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        <i data-lucide="github" class="h-4 w-4"></i> Source code
                    </a>
                @endif
            </div>
        </div>
    </section>

    <section class="page-shell page-shell--content page-section space-y-16">
        <div>
            <h2 class="text-2xl font-bold text-white">The story behind this project</h2>
            <div class="mt-6 prose-invert-custom glass rounded-2xl p-8" data-reveal>
                {!! nl2br(e($project->description)) !!}
            </div>
        </div>

        @if (! empty($project->technologies))
            <div data-reveal>
                <h2 class="text-2xl font-bold text-white">Technologies used</h2>
                <div class="mt-6 flex flex-wrap gap-3">
                    @foreach ($project->technologies as $tech)
                        <span class="rounded-xl border border-white/10 bg-ink-800/80 px-4 py-2.5 text-sm font-medium text-slate-300 transition hover:border-white/20 hover:bg-white/5">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="page-grid sm:grid-cols-3" data-reveal>
            <div class="page-card rounded-2xl border border-white/5 bg-ink-800/60 text-center">
                <div class="text-2xl font-extrabold text-white">{{ $project->status_label ?? 'Live' }}</div>
                <div class="mt-1 text-xs font-medium uppercase tracking-wider text-slate-400">Status</div>
            </div>
            <div class="page-card rounded-2xl border border-white/5 bg-ink-800/60 text-center">
                <div class="text-2xl font-extrabold text-white">{{ $project->getDurationAttribute() ?? '—' }}</div>
                <div class="mt-1 text-xs font-medium uppercase tracking-wider text-slate-400">Duration</div>
            </div>
            <div class="page-card rounded-2xl border border-white/5 bg-ink-800/60 text-center">
                <div class="text-2xl font-extrabold text-white">{{ $project->challenges ?? 'Complex' }}</div>
                <div class="mt-1 text-xs font-medium uppercase tracking-wider text-slate-400">Challenge level</div>
            </div>
        </div>

        <div class="page-card rounded-2xl border border-brand-400/20 bg-brand-500/5 text-center">
            <h2 class="text-2xl font-bold text-white">Like what you see?</h2>
            <p class="mt-2 text-slate-400">We'd love to build something just as impressive for you.</p>
            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-3">
                <a href="{{ route('contact') }}" class="rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-8 py-3.5 font-semibold text-white transition hover:from-brand-400 hover:to-violet-500">
                    Discuss your project
                </a>
                <a href="{{ route('services') }}" class="rounded-xl border border-white/15 bg-white/5 px-8 py-3.5 font-semibold text-white transition hover:bg-white/10">
                    Explore services
                </a>
            </div>
        </div>

        @if ($related->isNotEmpty())
            <div>
                <h2 class="text-2xl font-bold text-white">More projects</h2>
                <div class="page-grid mt-8 sm:grid-cols-2 lg:grid-cols-3" data-reveal>
                    @foreach ($related as $item)
                        <a href="{{ route('portfolio.show', $item->slug) }}" class="card-hover glass page-card rounded-2xl hover-zoom">
                            <div class="h-36 flex items-center justify-center rounded-xl bg-gradient-to-br from-brand-500/10 to-violet-500/10 text-3xl">
                                <span class="pro-icon" aria-hidden="true"><i data-lucide="monitor" class="h-7 w-7"></i></span>
                            </div>
                            <span class="mt-3 text-xs font-semibold uppercase tracking-wider text-brand-300">{{ $item->category }}</span>
                            <h3 class="mt-1 font-bold text-white">{{ $item->title }}</h3>
                            <p class="mt-1.5 line-clamp-2 text-sm text-slate-400">{{ Str::limit($item->excerpt, 90) }}</p>
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
