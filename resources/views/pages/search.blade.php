<x-app-layout>
    <x-slot name="title">Search</x-slot>

    <section class="bg-glow relative overflow-hidden">
        <div class="page-shell page-shell--narrow page-hero" data-reveal>
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl">Search</h1>
            <p class="mt-4 text-lg text-slate-400">
                Find services, projects, learning posts, tech facts, and events across MykaelTech.
            </p>

            <form method="GET" action="{{ route('search') }}" class="mt-10 flex gap-3">
                <div class="flex-1">
                    <div class="relative">
                        <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m2.823-2.823-3.536 3.536m-10.707 10.707C8.73 17.465 7.5 19.065 7.5 21h12c0-1.935-1.23-3.535-2.593-4.265L21 21"/>
                        </svg>
                        <input type="text" name="q" value="{{ old('q', $query) }}" placeholder="Search services, projects, posts..."
                               class="w-full rounded-xl border border-white/10 bg-ink-800 pl-12 pr-4 py-4 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30"
                               autofocus>
                    </div>
                </div>
                <button type="submit" class="rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-6 py-4 font-semibold text-white transition hover:from-brand-400 hover:to-violet-500 shadow-lg shadow-brand-500/25">
                    Search
                </button>
            </form>
        </div>
    </section>

    @if ($query)
        <section class="page-shell page-section">
            <div class="flex items-baseline justify-between" data-reveal>
                <p class="text-lg font-semibold text-white">
                    @if ($count > 0)
                        <span class="text-brand-300">{{ $count }}</span> result{{ $count === 1 ? '' : 's' }} for "<span class="underline underline-offset-2 decoration-brand-500/40">{{ $query }}</span>"
                    @else
                        No results for "<span class="underline underline-offset-2 decoration-brand-500/40">{{ $query }}</span>"
                    @endif
                </p>
                @if ($count > 0)
                    <a href="{{ route('search') }}" class="text-sm font-semibold text-brand-300 hover:text-brand-200">Clear</a>
                @endif
            </div>

            @if ($count > 0)
                <div class="mt-10 space-y-8">
                    @foreach (['service' => 'Services', 'project' => 'Projects', 'post' => 'Learning Posts', 'event' => 'Events'] as $type => $label)
                        @php $items = $results->where('type', $type); @endphp
                        @if ($items->isNotEmpty())
                            <div>
                                <h2 class="text-xl font-bold text-white" data-reveal>{{ $label }}</h2>
                                <div class="page-grid mt-6 sm:grid-cols-2 lg:grid-cols-3">
                                    @foreach ($items as $item)
                                        <a href="{{ $item['url'] }}" class="card-hover group glass page-card block rounded-2xl" data-reveal>
                                            <span class="rounded-full bg-brand-500/15 px-2.5 py-1 text-xs font-semibold text-brand-300">{{ $label }}</span>
                                            <h3 class="mt-3 text-lg font-bold text-white group-hover:text-brand-300">{{ $item['title'] }}</h3>
                                            <p class="mt-2 text-sm text-slate-400 line-clamp-2">{{ Str::limit($item['excerpt'], 120) }}</p>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="mt-16 text-center" data-reveal>
                    <div class="pro-icon mx-auto mb-6 h-14 w-14" aria-hidden="true"><i data-lucide="search-x" class="h-7 w-7"></i></div>
                    <h2 class="text-2xl font-bold text-white">Nothing found for "{{ $query }}"</h2>
                    <p class="mt-3 text-slate-400">Try different keywords, or browse the site directly.</p>
                    <div class="mt-8 flex flex-wrap justify-center gap-3">
                        <a href="{{ route('services') }}" class="rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white transition hover:bg-white/10">Services</a>
                        <a href="{{ route('portfolio') }}" class="rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white transition hover:bg-white/10">Portfolio</a>
                        <a href="{{ route('learn') }}" class="rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white transition hover:bg-white/10">Learn</a>
                        <a href="{{ route('community') }}" class="rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white transition hover:bg-white/10">Community</a>
                    </div>
                </div>
            @endif
        </section>
    @endif
</x-app-layout>