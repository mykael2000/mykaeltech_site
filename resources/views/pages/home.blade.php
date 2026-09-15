<x-app-layout>
    <x-slot name="title">Home</x-slot>

    <section class="bg-glow relative overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 pb-24 pt-20 sm:px-6 lg:px-8 lg:pt-28">
            <div class="mx-auto max-w-3xl text-center" data-reveal>
                <span class="inline-flex items-center gap-2 rounded-full border border-brand-400/30 bg-brand-500/10 px-4 py-1.5 text-sm font-medium text-brand-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-400"></span>
                    A community of builders, not just an agency
                </span>

                <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-white sm:text-6xl">
                    Build. Learn. <span class="bg-gradient-to-r from-brand-400 to-violet-400 bg-clip-text text-transparent">Belong.</span>
                </h1>

                <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-slate-400">
                    MykaelTech turns ideas into products and learners into professionals.
                    Explore our services, showcase your portfolio, track learning updates,
                    and generate a polished CV — all in one tech-driven platform.
                </p>

                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <a href="{{ route('join') }}" class="w-full rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-8 py-4 text-base font-semibold text-white shadow-xl shadow-brand-500/30 transition hover:from-brand-400 hover:to-violet-500 sm:w-auto">
                        Join the Community →
                    </a>
                    <a href="{{ route('portfolio') }}" class="w-full rounded-xl border border-white/15 bg-white/5 px-8 py-4 text-base font-semibold text-white transition hover:bg-white/10 sm:w-auto">
                        View Portfolio
                    </a>
                </div>
            </div>

            <div class="mx-auto mt-20 grid max-w-4xl grid-cols-2 gap-4 sm:grid-cols-4" data-reveal>
                @foreach ([
                    ['value' => $membersCount, 'label' => 'Community members'],
                    ['value' => $projects->count() + 24, 'label' => 'Projects shipped'],
                    ['value' => $posts->count() + 40, 'label' => 'Learning posts'],
                    ['value' => 12, 'label' => 'Events hosted'],
                ] as $stat)
                    <div class="glass rounded-2xl px-4 py-6 text-center">
                        <div class="text-3xl font-extrabold text-white" data-counter="{{ $stat['value'] }}">0</div>
                        <div class="mt-1 text-xs font-medium uppercase tracking-wider text-slate-400">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between" data-reveal>
            <div>
                <h2 class="text-3xl font-bold text-white sm:text-4xl">What we do</h2>
                <p class="mt-3 max-w-xl text-slate-400">From idea to launch — engineering, design and strategy under one roof.</p>
            </div>
            <a href="{{ route('services') }}" class="hidden text-sm font-semibold text-brand-300 hover:text-brand-200 sm:block">All services →</a>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($services as $service)
                <a href="{{ route('services.show', $service->slug) }}" class="card-hover group glass block rounded-2xl p-6" data-reveal>
                    <div class="text-3xl">{{ $service->icon ?? '⚡' }}</div>
                    <h3 class="mt-4 text-lg font-bold text-white group-hover:text-brand-300">{{ $service->title }}</h3>
                    <p class="mt-2 line-clamp-3 text-sm leading-relaxed text-slate-400">{{ Str::limit($service->excerpt, 140) }}</p>
                    <span class="mt-4 inline-block text-sm font-semibold text-brand-300 opacity-0 transition group-hover:opacity-100">Learn more →</span>
                </a>
            @empty
                <p class="text-slate-400">Services coming soon.</p>
            @endforelse
        </div>
    </section>

    <section class="border-y border-white/5 bg-ink-900/40">
        <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between" data-reveal>
                <div>
                    <h2 class="text-3xl font-bold text-white sm:text-4xl">Featured work</h2>
                    <p class="mt-3 max-w-xl text-slate-400">Real products, real results. Every project can carry a live link — click through.</p>
                </div>
                <a href="{{ route('portfolio') }}" class="hidden text-sm font-semibold text-brand-300 hover:text-brand-200 sm:block">Full portfolio →</a>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($projects as $project)
                    <article class="card-hover group glass overflow-hidden rounded-2xl" data-reveal>
                        <a href="{{ route('portfolio.show', $project->slug) }}" class="block">
                            <div class="flex h-44 items-center justify-center bg-gradient-to-br from-brand-600/30 via-ink-800 to-violet-600/30 text-5xl">
                                {{ $project->category === 'Web' ? '🖥️' : ($project->category === 'Mobile' ? '📱' : '🧠') }}
                            </div>
                            <div class="p-6">
                                <span class="rounded-full bg-brand-500/15 px-3 py-1 text-xs font-semibold text-brand-300">{{ $project->category }}</span>
                                <h3 class="mt-3 text-lg font-bold text-white group-hover:text-brand-300">{{ $project->title }}</h3>
                                <p class="mt-2 line-clamp-2 text-sm text-slate-400">{{ Str::limit($project->short_description, 110) }}</p>
                                @if ($project->external_url)
                                    <span class="mt-3 inline-block text-sm font-semibold text-brand-300">Live demo ↗</span>
                                @endif
                            </div>
                        </a>
                    </article>
                @empty
                    <p class="text-slate-400">Projects coming soon.</p>
                @endforelse
            </div>
        </div>
    </section>
    <section class="mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-3">
            <div class="lg:col-span-2" data-reveal>
                <div class="flex items-end justify-between">
                    <h2 class="text-3xl font-bold text-white">Learning updates</h2>
                    <a href="{{ route('learn') }}" class="text-sm font-semibold text-brand-300 hover:text-brand-200">All posts →</a>
                </div>
                <div class="mt-8 space-y-4">
                    @forelse ($posts as $post)
                        <a href="{{ route('learn.show', $post->slug) }}" class="card-hover glass block rounded-2xl p-5">
                            <div class="flex flex-wrap items-center gap-3 text-xs text-slate-400">
                                <span class="rounded-full bg-violet-500/15 px-2.5 py-1 font-semibold text-violet-300">{{ $post->type_label }}</span>
                                <time datetime="{{ optional($post->published_at)->toDateString() }}">{{ optional($post->published_at)->format('M j, Y') }}</time>
                                <span>{{ $post->read_time }} min read</span>
                            </div>
                            <h3 class="mt-3 text-lg font-bold text-white">{{ $post->title }}</h3>
                            <p class="mt-1.5 line-clamp-2 text-sm text-slate-400">{{ Str::limit($post->excerpt, 160) }}</p>
                        </a>
                    @empty
                        <p class="text-slate-400">No posts yet.</p>
                    @endforelse
                </div>
            </div>

            <div data-reveal>
                <h2 class="text-2xl font-bold text-white">Tech facts feed</h2>
                <div class="mt-8 space-y-4">
                    @forelse ($facts as $fact)
                        <div class="glass rounded-2xl p-5">
                            <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-brand-300">
                                <span>💡</span> Did you know
                            </div>
                            <p class="mt-2 text-sm leading-relaxed text-slate-300">{{ $fact->fact }}</p>
                            @if ($fact->source_url)
                                <a href="{{ $fact->source_url }}" target="_blank" rel="noopener" class="mt-2 inline-block text-xs font-semibold text-brand-300 hover:underline">Source ↗</a>
                            @endif
                        </div>
                    @empty
                        <p class="text-slate-400">Facts coming soon.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    @if ($events->isNotEmpty())
        <section class="border-y border-white/5 bg-ink-900/40">
            <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
                <div class="flex items-end justify-between" data-reveal>
                    <h2 class="text-3xl font-bold text-white">Upcoming community events</h2>
                    <a href="{{ route('community') }}" class="text-sm font-semibold text-brand-300 hover:text-brand-200">All events →</a>
                </div>
                <div class="mt-10 grid gap-6 md:grid-cols-3">
                    @foreach ($events as $event)
                        <div class="card-hover glass rounded-2xl p-6">
                            <div class="flex items-center gap-3 text-sm text-brand-300">
                                <span class="text-lg">📅</span>
                                {{ optional($event->starts_at)->format('D, M j Y · g:i A') }}
                            </div>
                            <h3 class="mt-3 text-lg font-bold text-white">{{ $event->title }}</h3>
                            <p class="mt-2 line-clamp-2 text-sm text-slate-400">{{ Str::limit($event->description, 120) }}</p>
                            @if ($event->registration_url)
                                <a href="{{ $event->registration_url }}" target="_blank" rel="noopener" class="mt-4 inline-block rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-500">Register ↗</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="mx-auto max-w-7xl px-4 pb-8 pt-24 sm:px-6 lg:px-8">
        <div class="bg-glow relative overflow-hidden rounded-3xl border border-brand-400/20 bg-gradient-to-br from-brand-600/20 via-ink-800 to-violet-600/20 px-8 py-16 text-center" data-reveal>
            <h2 class="text-3xl font-bold text-white sm:text-4xl">Ready to build your future with us?</h2>
            <p class="mx-auto mt-4 max-w-xl text-slate-300">
                Join free, create your profile, publish learning updates, and generate a professional CV in minutes.
            </p>
            <a href="{{ route('join') }}" class="mt-8 inline-block rounded-xl bg-white px-8 py-4 text-base font-bold text-ink-950 transition hover:bg-brand-100">
                Join Community — it's free
            </a>
        </div>
    </section>
</x-app-layout>
