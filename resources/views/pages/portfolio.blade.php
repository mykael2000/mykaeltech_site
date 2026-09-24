<x-app-layout>
    <x-slot name="title">Portfolio</x-slot>

    <section class="bg-glow">
        <div class="page-shell page-hero text-center" data-reveal>
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl">Portfolio</h1>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-400">
                A showcase of what our community and studio have built. Open any project for the full story and live links.
            </p>
        </div>
    </section>

    <section class="page-shell page-section">
        <div class="page-filter-row" data-reveal>
            <a href="{{ route('portfolio') }}"
               class="rounded-full px-4 py-2 text-sm font-semibold transition {{ ! $currentCategory ? 'bg-brand-500 text-white' : 'glass text-slate-300 hover:text-white' }}">
                All
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('portfolio', ['category' => $category]) }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold transition {{ $currentCategory === $category ? 'bg-brand-500 text-white' : 'glass text-slate-300 hover:text-white' }}">
                    {{ $category }}
                </a>
            @endforeach
        </div>

        <div class="page-grid mt-12 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($projects as $project)
                <article class="card-hover group glass overflow-hidden rounded-2xl" data-reveal>
                    <a href="{{ route('portfolio.show', $project->slug) }}" class="block">
                        <div class="pro-icon h-44 w-full rounded-2xl bg-gradient-to-br from-brand-600/30 via-ink-800 to-violet-600/30" aria-hidden="true">
                            <i data-lucide="{{ $project->category === 'Mobile' ? 'smartphone' : ($project->category === 'Web' ? 'monitor' : 'bar-chart-3') }}" class="h-10 w-10"></i>
                        </div>
                        <div class="page-card">
                            <span class="rounded-full bg-brand-500/15 px-3 py-1 text-xs font-semibold text-brand-300">{{ $project->category }}</span>
                            <h2 class="mt-3 text-lg font-bold text-white group-hover:text-brand-300">{{ $project->title }}</h2>
                            <p class="mt-2 line-clamp-2 text-sm text-slate-400">{{ Str::limit($project->excerpt, 120) }}</p>
                            <div class="mt-4 flex flex-wrap gap-1.5">
                                @foreach (array_slice($project->technologies ?? [], 0, 4) as $tech)
                                    <span class="rounded-md bg-white/5 px-2 py-1 text-xs text-slate-300">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    </a>
                </article>
            @empty
                <p class="text-slate-400">No projects in this category yet.</p>
            @endforelse
        </div>
    </section>
</x-app-layout>
