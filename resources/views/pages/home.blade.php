<x-app-layout>
    <x-slot name="title">Home</x-slot>
    <div class="home-shell">

    <section class="home-hero bg-glow relative overflow-hidden">
        <div class="mx-auto max-w-7xl px-6 pb-32 pt-20 sm:px-8 sm:pt-24 lg:px-10 lg:pb-40 lg:pt-32">
            <div class="grid items-center gap-16 lg:grid-cols-[1.05fr_0.95fr] lg:gap-20">
                <div class="text-center lg:text-left" data-reveal>
                    <span class="inline-flex items-center gap-2 rounded-full border border-brand-400/30 bg-brand-500/10 px-4 py-2 text-sm font-medium text-brand-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-400"></span>
                        A community of builders, not just an agency
                    </span>

                    <h1 class="mt-8 max-w-3xl text-5xl font-extrabold tracking-tight text-white sm:text-6xl lg:text-7xl">
                        Build. Learn. <span class="bg-gradient-to-r from-brand-400 to-violet-400 bg-clip-text text-transparent">Belong.</span>
                    </h1>

                    <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-400 lg:text-xl">
                        MykaelTech turns ideas into products and learners into professionals.
                        Explore our services, showcase your portfolio, track learning updates,
                        and generate a polished CV — all in one tech-driven platform.
                    </p>

                    <div class="mt-10 flex flex-col items-center gap-4 sm:flex-row lg:items-start">
                        <a href="{{ route('join') }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-7 py-4 text-base font-semibold text-white shadow-xl shadow-brand-500/20 transition hover:-translate-y-0.5 hover:from-brand-400 hover:to-violet-500 sm:w-auto">
                            Join the Community
                            <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
                        </a>
                        <a href="{{ route('portfolio') }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-white/15 bg-white/5 px-7 py-4 text-base font-semibold text-white transition hover:border-white/25 hover:bg-white/10 sm:w-auto">
                            View Portfolio
                            <i data-lucide="arrow-right" class="h-4 w-4"></i>
                        </a>
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-ink-900 shadow-2xl shadow-black/40" data-reveal>
                    <img src="{{ asset('images/workspace.jpg') }}" alt="Modern collaborative technology workspace" class="h-[27rem] w-full object-cover opacity-85 sm:h-[34rem]" fetchpriority="high">
                    <div class="absolute inset-0 bg-gradient-to-t from-ink-950 via-ink-950/20 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-8 sm:p-10">
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-brand-300">Ideas into impact</p>
                        <p class="mt-3 max-w-sm text-2xl font-bold leading-tight text-white">A focused space for ambitious people to learn, build, and grow together.</p>
                    </div>
                </div>
            </div>

            <div class="mx-auto mt-28 grid max-w-5xl grid-cols-2 gap-4 sm:grid-cols-4 sm:gap-6" data-reveal>
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
    <section class="home-section mx-auto max-w-7xl px-6 sm:px-8 lg:px-10">
        <div class="flex items-end justify-between" data-reveal>
            <div>
                <h2 class="text-3xl font-bold text-white sm:text-4xl">What we do</h2>
                <p class="mt-3 max-w-xl text-slate-400">From idea to launch — engineering, design and strategy under one roof.</p>
            </div>
            <a href="{{ route('services') }}" class="hidden items-center gap-2 text-sm font-semibold text-brand-300 transition hover:text-brand-200 sm:inline-flex">All services <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>

        <div class="mt-14 grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($services as $service)
                <a href="{{ route('services.show', $service->slug) }}" class="card-hover group glass block rounded-2xl p-8" data-reveal>
                    <div class="icon-box"><i data-lucide="{{ match (true) { Str::contains(Str::lower($service->title), 'web') => 'globe-2', Str::contains(Str::lower($service->title), 'design') => 'palette', Str::contains(Str::lower($service->title), 'mobile') => 'smartphone', Str::contains(Str::lower($service->title), 'data') => 'bar-chart-3', default => 'layers-3' } }}"></i></div>
                    <h3 class="mt-6 text-xl font-bold text-white group-hover:text-brand-300">{{ $service->title }}</h3>
                    <p class="mt-3 line-clamp-3 text-sm leading-7 text-slate-400">{{ Str::limit($service->excerpt, 140) }}</p>
                    <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-brand-300 opacity-0 transition group-hover:opacity-100">Learn more <i data-lucide="arrow-right" class="h-4 w-4"></i></span>
                </a>
            @empty
                <p class="text-slate-400">Services coming soon.</p>
            @endforelse
        </div>
    </section>

    <section class="home-section border-y border-white/5 bg-ink-900/40">
        <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-10">
            <div class="flex items-end justify-between" data-reveal>
                <div>
                    <h2 class="text-3xl font-bold text-white sm:text-4xl">Featured work</h2>
                    <p class="mt-3 max-w-xl text-slate-400">Real products, real results. Every project can carry a live link — click through.</p>
                </div>
                <a href="{{ route('portfolio') }}" class="hidden items-center gap-2 text-sm font-semibold text-brand-300 transition hover:text-brand-200 sm:inline-flex">Full portfolio <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
            </div>

            <div class="grid gap-8 md:grid-cols-3 lg:gap-10">
                @forelse ($projects as $project)
                    <article class="card-hover group glass overflow-hidden rounded-2xl" data-reveal>
                        <a href="{{ route('portfolio.show', $project->slug) }}" class="block">
                            <div class="relative h-52 overflow-hidden bg-ink-800 sm:h-60">
                                <img src="{{ asset($loop->even ? 'images/collaboration.jpg' : 'images/technology.jpg') }}" alt="{{ $loop->even ? 'Technology professionals collaborating around a workstation' : 'Close-up of professional technology hardware and digital systems' }}" class="h-full w-full object-cover opacity-70 transition duration-500 group-hover:scale-105" loading="lazy">

                                <div class="absolute inset-0 bg-gradient-to-t from-ink-950 via-ink-950/25 to-transparent"></div>
                                <div class="absolute bottom-5 left-6 flex h-11 w-11 items-center justify-center rounded-xl border border-white/15 bg-ink-950/70 text-brand-300 backdrop-blur">
                                    <i data-lucide="{{ $project->category === 'Web' ? 'globe-2' : ($project->category === 'Mobile' ? 'smartphone' : 'layers-3') }}" class="h-5 w-5"></i>
                                </div>
                            </div>
                            <div class="p-6">
                                <span class="rounded-full bg-brand-500/15 px-3 py-1 text-xs font-semibold text-brand-300">{{ $project->category }}</span>
                                <h3 class="mt-3 text-lg font-bold text-white group-hover:text-brand-300">{{ $project->title }}</h3>
                                <p class="mt-2 line-clamp-2 text-sm text-slate-400">{{ Str::limit($project->short_description, 110) }}</p>
                                @if ($project->external_url)
                                    <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-brand-300">Live demo <i data-lucide="arrow-up-right" class="h-4 w-4"></i></span>
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
    <section class="home-section mx-auto max-w-7xl px-6 sm:px-8 lg:px-10">
        <div class="grid gap-12 lg:grid-cols-3">
            <div class="lg:col-span-2" data-reveal>
                <div class="flex items-end justify-between">
                    <h2 class="text-3xl font-bold text-white">Learning updates</h2>
                    <a href="{{ route('learn') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-300 transition hover:text-brand-200">All posts <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
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
                            <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.16em] text-brand-300">
                                <i data-lucide="lightbulb" class="h-4 w-4"></i> Did you know
                            </div>
                            <p class="mt-2 text-sm leading-relaxed text-slate-300">{{ $fact->fact }}</p>
                            @if ($fact->source_url)
                                <a href="{{ $fact->source_url }}" target="_blank" rel="noopener" class="mt-3 inline-flex items-center gap-2 text-xs font-semibold text-brand-300 transition hover:text-brand-200">Source <i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i></a>
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
        <section class="home-section border-y border-white/5 bg-ink-900/40">
            <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-10">
                <div class="flex flex-col items-start justify-between gap-5 sm:flex-row sm:items-end" data-reveal>
                    <div>
                        <p class="home-kicker">Community calendar</p>
                        <h2 class="section-title mt-4">Upcoming community events</h2>
                    </div>
                    <a href="{{ route('community') }}" class="pro-link">All events <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
                </div>
                <div class="mt-12 grid gap-7 md:grid-cols-3">
                    @foreach ($events as $event)
                        <article class="card-hover glass flex flex-col rounded-2xl p-7">
                            <div class="flex items-center gap-3 text-sm font-medium text-brand-300">
                                <i data-lucide="calendar-days" class="h-4 w-4"></i>
                                {{ optional($event->starts_at)->format('D, M j Y, g:i A') }}
                            </div>
                            <h3 class="mt-5 text-xl font-bold leading-snug text-white">{{ $event->title }}</h3>
                            <p class="mt-3 line-clamp-3 text-sm leading-7 text-slate-400">{{ Str::limit($event->description, 120) }}</p>
                            @if ($event->registration_url)
                                <a href="{{ $event->registration_url }}" target="_blank" rel="noopener" class="mt-6 inline-flex w-fit items-center gap-2 rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-500">Register <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="home-section mx-auto max-w-7xl px-6 sm:px-8 lg:px-10">
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
    </div>
</x-app-layout>
