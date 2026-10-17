<x-app-layout>
    <x-slot name="title">MykaelTech — Build. Learn. Belong.</x-slot>
    <x-slot name="metaDescription">MykaelTech is a technology community: services, portfolio showcases, learning updates, tech facts and a CV builder for members.</x-slot>

    {{-- ============ HERO ============ --}}
    <section class="bg-glow relative overflow-hidden">
        <div class="hero-grid" aria-hidden="true"></div>
        <div class="hero-orb hero-orb-1" aria-hidden="true"></div>
        <div class="hero-orb hero-orb-2" aria-hidden="true"></div>
        <div class="hero-orb hero-orb-3" aria-hidden="true"></div>

        <div class="page-shell relative grid items-center gap-14 py-20 md:py-28 lg:grid-cols-2">
            <div class="text-center lg:text-left" data-reveal>
                <span class="home-kicker"><i data-lucide="sparkles" class="h-4 w-4"></i> Welcome to the community</span>

                <h1 class="mt-5 text-4xl font-extrabold leading-tight text-white sm:text-5xl lg:text-6xl">
                    We build, learn and grow
                    <span class="block h-[1.15em]">
                        <span x-data="typewriter({{ \Illuminate\Support\Js::from(['innovative web apps','modern mobile experiences','open-source tools','the next big thing']) }})" x-init="start()" class="text-gradient"><span x-text="text"></span></span><span class="tw-caret" aria-hidden="true"></span>
                    </span>
                </h1>

                <p class="mx-auto mt-6 max-w-xl text-lg leading-relaxed text-slate-400 lg:mx-0">
                    A technology community where builders ship real projects, share what they learn, and lift each other up. Explore our services, browse the portfolio, and join the journey.
                </p>

                <div class="mt-9 flex flex-wrap items-center justify-center gap-4 lg:justify-start">
                    <a href="{{ route('portfolio') }}" class="btn btn-primary shine !px-7 !py-3 text-base">Explore portfolio <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                    <a href="{{ route('join') }}" class="btn !border !border-white/10 !bg-white/5 !px-7 !py-3 text-base text-white hover:!bg-white/10">Join the community</a>
                </div>

                <div class="mt-10 flex items-center justify-center gap-8 text-sm text-slate-400 lg:justify-start">
                    <div class="flex items-center gap-2"><i data-lucide="users" class="h-4 w-4 text-brand-400"></i><span><strong class="font-semibold text-white">{{ number_format($membersCount) }}+</strong> members</span></div>
                    <div class="flex items-center gap-2"><i data-lucide="layers-3" class="h-4 w-4 text-brand-400"></i><span><strong class="font-semibold text-white">{{ $projects->count() }}+</strong> projects</span></div>
                </div>
            </div>

            <div class="relative hidden lg:block" data-reveal>
                <div class="float-card glass shine relative rounded-3xl p-6">
                    <div class="flex items-center gap-3">
                        <span class="pro-icon !h-11 !w-11"><i data-lucide="rocket" class="h-5 w-5"></i></span>
                        <div>
                            <p class="text-sm font-semibold text-white">Shipped this week</p>
                            <p class="text-xs text-slate-400">Portfolio · Community · Learn</p>
                        </div>
                    </div>
                    <div class="mt-5 space-y-3">
                        <div class="h-2.5 w-full rounded-full bg-white/5"></div>
                        <div class="h-2.5 w-4/5 rounded-full bg-brand-500/30"></div>
                        <div class="h-2.5 w-3/5 rounded-full bg-violet-500/30"></div>
                    </div>
                </div>
                <div class="float-card float-card-delay glass absolute -bottom-8 -left-10 w-56 rounded-2xl p-5">
                    <div class="flex items-center gap-2 text-brand-300"><i data-lucide="zap" class="h-4 w-4"></i><span class="text-xs font-semibold uppercase tracking-widest">Community</span></div>
                    <p class="mt-2 text-2xl font-bold text-white">{{ number_format($membersCount) }}+</p>
                    <p class="text-xs text-slate-400">active builders</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ TECH MARQUEE ============ --}}
    @php $tech = ['Laravel', 'PHP', 'JavaScript', 'Tailwind CSS', 'Alpine.js', 'React', 'Node.js', 'MySQL', 'Git', 'Docker', 'Figma', 'Flutter']; @endphp
    <section class="border-y border-white/5 bg-ink-900/40 py-6">
        <div class="marquee">
            <div class="marquee-track">
                @foreach (array_merge($tech, $tech) as $t)
                    <span class="flex items-center gap-2 whitespace-nowrap text-sm font-medium text-slate-400"><i data-lucide="cpu" class="h-4 w-4 text-brand-500"></i>{{ $t }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ STATS ============ --}}
    <section class="page-shell page-section">
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div class="stat-tile" data-reveal>
                <i data-lucide="users" class="mx-auto h-7 w-7 text-brand-400"></i>
                <p class="mt-3 text-3xl font-extrabold text-white"><span data-counter="{{ $membersCount }}">0</span>+</p>
                <p class="mt-1 text-sm text-slate-400">Community members</p>
            </div>
            <div class="stat-tile" data-reveal>
                <i data-lucide="layers-3" class="mx-auto h-7 w-7 text-brand-400"></i>
                <p class="mt-3 text-3xl font-extrabold text-white"><span data-counter="{{ $projects->count() + 40 }}">0</span>+</p>
                <p class="mt-1 text-sm text-slate-400">Projects delivered</p>
            </div>
            <div class="stat-tile" data-reveal>
                <i data-lucide="book-open" class="mx-auto h-7 w-7 text-brand-400"></i>
                <p class="mt-3 text-3xl font-extrabold text-white"><span data-counter="{{ $posts->count() + 60 }}">0</span>+</p>
                <p class="mt-1 text-sm text-slate-400">Learning posts</p>
            </div>
            <div class="stat-tile" data-reveal>
                <i data-lucide="calendar-days" class="mx-auto h-7 w-7 text-brand-400"></i>
                <p class="mt-3 text-3xl font-extrabold text-white"><span data-counter="25">0</span>+</p>
                <p class="mt-1 text-sm text-slate-400">Events hosted</p>
            </div>
        </div>
    </section>

    {{-- ============ SERVICES ============ --}}
    <section class="page-shell page-section">
        <div class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end" data-reveal>
            <div>
                <span class="home-kicker"><i data-lucide="layers-3" class="h-4 w-4"></i> What we do</span>
                <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">Services built for modern teams</h2>
            </div>
            <a href="{{ route('services') }}" class="pro-link !mt-0">All services <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>

        <div class="page-grid md:grid-cols-2 lg:grid-cols-3">
            @forelse ($services as $service)
                <a href="{{ route('services.show', $service->slug) }}" class="card-hover group glass flex flex-col rounded-2xl page-card shine" data-reveal>
                    <div class="pro-icon" aria-hidden="true"><i data-lucide="zap" class="h-7 w-7"></i></div>
                    <h3 class="mt-5 text-xl font-bold text-white group-hover:text-brand-300">{{ $service->title }}</h3>
                    <p class="mt-3 flex-1 text-sm leading-relaxed text-slate-400">{{ $service->excerpt }}</p>
                    @if ($service->starting_price)
                        <p class="mt-4 text-sm font-semibold text-brand-300">From {{ $service->starting_price }}</p>
                    @endif
                    <span class="pro-link">Details <i data-lucide="arrow-up-right" class="h-4 w-4"></i></span>
                </a>
            @empty
                <p class="text-slate-400">Services coming soon.</p>
            @endforelse
        </div>
    </section>


    {{-- ============ FEATURED PROJECTS ============ --}}
    <section class="page-shell page-section">
        <div class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end" data-reveal>
            <div>
                <span class="home-kicker"><i data-lucide="rocket" class="h-4 w-4"></i> Featured work</span>
                <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">Projects we're proud of</h2>
            </div>
            <a href="{{ route('portfolio') }}" class="pro-link !mt-0">Full portfolio <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>

        <div class="page-grid md:grid-cols-2 lg:grid-cols-3">
            @forelse ($projects as $project)
                @php $cover = $project->cover_photo ?? $project->image_path ?? null; @endphp
                <article class="card-hover group glass overflow-hidden rounded-2xl" data-reveal>
                    <div class="relative h-44 w-full overflow-hidden bg-gradient-to-br from-brand-600/30 via-ink-800 to-violet-600/30">
                        @if ($cover)
                            <button type="button" class="h-full w-full" data-lightbox="{{ $cover }}" aria-label="View {{ $project->title }} image">
                                <img src="{{ $cover }}" alt="{{ $project->title }}" loading="lazy" class="hover-zoom h-full w-full object-cover">
                            </button>
                        @else
                            <div class="flex h-full w-full items-center justify-center">
                                <i data-lucide="{{ $project->category === 'Mobile' ? 'smartphone' : ($project->category === 'Web' ? 'monitor' : 'bar-chart-3') }}" class="h-10 w-10 text-brand-300"></i>
                            </div>
                        @endif
                        <span class="absolute left-3 top-3 rounded-full bg-ink-950/80 px-3 py-1 text-xs font-semibold text-brand-300 backdrop-blur">{{ $project->category }}</span>
                    </div>
                    <div class="page-card">
                        <h3 class="text-lg font-bold text-white group-hover:text-brand-300">{{ $project->title }}</h3>
                        <p class="mt-2 line-clamp-2 text-sm text-slate-400">{{ Str::limit($project->excerpt ?? $project->short_description, 120) }}</p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            @foreach (array_slice($project->technologies ?? $project->tech_stack ?? [], 0, 4) as $tech)
                                <span class="rounded-md bg-white/5 px-2 py-1 text-xs text-slate-300">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('portfolio.show', $project->slug) }}" class="pro-link">Case study <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                    </div>
                </article>
            @empty
                <p class="text-slate-400">Featured projects coming soon.</p>
            @endforelse
        </div>
    </section>

    {{-- ============ LEARN / POSTS ============ --}}
    <section class="page-shell page-section">
        <div class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end" data-reveal>
            <div>
                <span class="home-kicker"><i data-lucide="book-open" class="h-4 w-4"></i> From the blog</span>
                <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">Latest learning updates</h2>
            </div>
            <a href="{{ route('learn') }}" class="pro-link !mt-0">Read more <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>

        <div class="page-grid md:grid-cols-3">
            @forelse ($posts as $post)
                <a href="{{ route('learn.show', $post->slug) }}" class="card-hover group glass flex flex-col rounded-2xl page-card shine" data-reveal>
                    <span class="w-fit rounded-full bg-violet-500/15 px-2.5 py-1 text-xs font-semibold text-violet-300">{{ $post->type_label }}</span>
                    <h3 class="mt-4 text-lg font-bold text-white group-hover:text-brand-300">{{ $post->title }}</h3>
                    <p class="mt-2 flex-1 text-sm leading-relaxed text-slate-400">{{ Str::limit($post->excerpt, 130) }}</p>
                    <div class="mt-4 flex items-center gap-3 text-xs text-slate-500">
                        <span>{{ $post->user?->name ?? 'MykaelTech' }}</span> ·
                        <time datetime="{{ optional($post->published_at)->toDateString() }}">{{ optional($post->published_at)->format('M j, Y') }}</time> ·
                        <span>{{ $post->views }} views</span>
                    </div>
                </a>
            @empty
                <p class="text-slate-400">No posts yet.</p>
            @endforelse
        </div>
    </section>


    {{-- ============ TECH FACTS ============ --}}
    @if ($facts->isNotEmpty())
    <section class="border-y border-white/5 bg-ink-900/40 page-section">
        <div class="page-shell">
            <div class="mb-10 text-center" data-reveal>
                <span class="home-kicker"><i data-lucide="lightbulb" class="h-4 w-4"></i> Did you know?</span>
                <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">Tech facts worth knowing</h2>
            </div>
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($facts as $fact)
                    <div class="glass card-hover rounded-2xl p-5" data-reveal>
                        <i data-lucide="zap" class="h-5 w-5 text-brand-400"></i>
                        <p class="mt-3 text-sm leading-relaxed text-slate-300">{{ $fact->fact }}</p>
                        @if ($fact->source_url)
                            <a href="{{ $fact->source_url }}" target="_blank" rel="noopener" class="mt-3 inline-flex items-center gap-1.5 text-xs font-semibold text-brand-300 hover:underline">Source <i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i></a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ============ TESTIMONIALS ============ --}}
    @if ($testimonials->isNotEmpty())
    <section class="page-shell page-section">
        <div class="mb-10 text-center" data-reveal>
            <span class="home-kicker"><i data-lucide="quote" class="h-4 w-4"></i> Testimonials</span>
            <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">What members say</h2>
        </div>

        <div class="mx-auto max-w-3xl" data-reveal
             x-data="testimonialSlider({{ \Illuminate\Support\Js::from($testimonials->map(fn ($t) => ['content' => $t->content, 'author_name' => $t->author_name, 'author_role' => $t->author_role, 'company' => $t->company, 'rating' => $t->rating])->values()->all()) }})">
            <div class="glass relative rounded-3xl p-8 text-center sm:p-10">
                <i data-lucide="quote" class="mx-auto h-8 w-8 text-brand-500/50"></i>
                <template x-if="testimonials.length">
                    <div>
                        <p class="mt-5 text-lg leading-relaxed text-slate-300" x-text="`“${testimonials[current].content}”`"></p>
                        <div class="mt-6 flex items-center justify-center gap-1" x-show="testimonials[current].rating">
                            <template x-for="n in 5" :key="n">
                                <i data-lucide="star" class="h-4 w-4" :class="(n <= (testimonials[current].rating || 0)) ? 'fill-amber-400 text-amber-400' : 'text-slate-600'"></i>
                            </template>
                        </div>
                        <div class="mt-5">
                            <p class="font-semibold text-white" x-text="testimonials[current].author_name"></p>
                            <p class="text-sm text-slate-400" x-text="[testimonials[current].author_role, testimonials[current].company].filter(Boolean).join(' · ')"></p>
                        </div>
                    </div>
                </template>
            </div>
            <div class="mt-6 flex items-center justify-center gap-4">
                <button type="button" @click="prev()" class="btn !border !border-white/10 !bg-white/5 !p-2.5 text-white hover:!bg-white/10" aria-label="Previous testimonial"><i data-lucide="chevron-left" class="h-5 w-5"></i></button>
                <span class="text-sm text-slate-400"><span x-text="current + 1"></span> / <span x-text="testimonials.length"></span></span>
                <button type="button" @click="next()" class="btn !border !border-white/10 !bg-white/5 !p-2.5 text-white hover:!bg-white/10" aria-label="Next testimonial"><i data-lucide="chevron-right" class="h-5 w-5"></i></button>
            </div>
        </div>
    </section>
    @endif


    {{-- ============ EVENTS ============ --}}
    @if ($events->isNotEmpty())
    <section class="page-shell page-section">
        <div class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end" data-reveal>
            <div>
                <span class="home-kicker"><i data-lucide="calendar-days" class="h-4 w-4"></i> Upcoming</span>
                <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">Events & meetups</h2>
            </div>
            <a href="{{ route('community') }}" class="pro-link !mt-0">Community <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>
        <div class="page-grid md:grid-cols-3">
            @foreach ($events as $event)
                <article class="glass card-hover rounded-2xl page-card" data-reveal>
                    <div class="flex items-center gap-3">
                        <div class="flex h-14 w-14 shrink-0 flex-col items-center justify-center rounded-xl bg-gradient-to-br from-brand-600/30 to-violet-600/30 text-white">
                            <span class="text-lg font-extrabold leading-none">{{ optional($event->starts_at)->format('d') }}</span>
                            <span class="text-[10px] font-semibold uppercase tracking-wider">{{ optional($event->starts_at)->format('M') }}</span>
                        </div>
                        <div class="min-w-0">
                            <h3 class="truncate text-base font-bold text-white">{{ $event->title }}</h3>
                            <p class="mt-0.5 flex items-center gap-1.5 text-xs text-slate-400"><i data-lucide="map-pin" class="h-3.5 w-3.5"></i>{{ $event->location ?? 'Online' }}</p>
                        </div>
                    </div>
                    <p class="mt-4 line-clamp-3 text-sm leading-relaxed text-slate-400">{{ $event->description }}</p>
                    @if ($event->registration_url)
                        <a href="{{ $event->registration_url }}" target="_blank" rel="noopener" class="pro-link">Register <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                    @endif
                </article>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ============ COMMUNITY CTA (promo modal) ============ --}}
    <section class="page-shell page-section" data-reveal>
        <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-brand-600/20 via-ink-900 to-violet-600/20 p-10 text-center sm:p-14">
            <div class="hero-orb hero-orb-3" aria-hidden="true"></div>
            <div class="relative">
                <span class="home-kicker"><i data-lucide="users" class="h-4 w-4"></i> Join us</span>
                <h2 class="mt-4 text-3xl font-extrabold text-white sm:text-4xl">Ready to build in public?</h2>
                <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-400">
                    Create a free account to publish your portfolio, share learning updates and generate a polished CV — all in one place.
                </p>
                <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ route('join') }}" class="btn btn-primary shine !px-7 !py-3 text-base">Create free account <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                    <button type="button"
                            @click="$store.ui.openRecord('promo', { title: 'MykaelTech membership', body: 'Members get a public portfolio, a CV generator, learning updates, community events and a profile at /cv/your-username — free, no credit card required.' })"
                            class="btn !border !border-white/10 !bg-white/5 !px-7 !py-3 text-base text-white hover:!bg-white/10">
                        <i data-lucide="gift" class="h-4 w-4"></i> What's included?
                    </button>
                </div>
            </div>
        </div>
    </section>


    {{-- ============ CONTACT + NEWSLETTER ============ --}}
    <section class="page-shell page-section grid gap-6 lg:grid-cols-2">
        {{-- Quick contact --}}
        <div class="glass rounded-3xl p-8 sm:p-10" data-reveal>
            <span class="home-kicker"><i data-lucide="send" class="h-4 w-4"></i> Get in touch</span>
            <h2 class="mt-4 text-2xl font-extrabold text-white sm:text-3xl">Have a project in mind?</h2>
            <p class="mt-3 text-sm leading-relaxed text-slate-400">Tell us what you're building and we'll get back to you within 24 hours. Or reach us directly via the contact page.</p>

            <form method="POST" action="{{ route('contact.store') }}" class="mt-7 space-y-4">
                @csrf
                <div class="hidden" aria-hidden="true">
                    <label for="home-website">Website</label>
                    <input type="text" id="home-website" name="website" tabindex="-1" autocomplete="off">
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="home-name" class="label">Name *</label>
                        <input type="text" id="home-name" name="name" value="{{ old('name') }}" required maxlength="120" class="input" placeholder="Your name">
                        @error('name')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="home-email" class="label">Email *</label>
                        <input type="email" id="home-email" name="email" value="{{ old('email') }}" required maxlength="190" class="input" placeholder="you@example.com">
                        @error('email')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div>
                    <label for="home-subject" class="label">Subject</label>
                    <input type="text" id="home-subject" name="subject" value="{{ old('subject') }}" maxlength="190" class="input" placeholder="How can we help?">
                    @error('subject')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="home-message" class="label">Message *</label>
                    <textarea id="home-message" name="message" rows="4" required maxlength="5000" class="input resize-y" placeholder="Tell us a little about your project…">{{ old('message') }}</textarea>
                    @error('message')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="btn btn-primary shine w-full !py-3">Send message <i data-lucide="send" class="h-4 w-4"></i></button>
            </form>
        </div>

        {{-- Newsletter --}}
        <div class="glass flex flex-col rounded-3xl p-8 sm:p-10" data-reveal>
            <span class="home-kicker"><i data-lucide="bell" class="h-4 w-4"></i> Newsletter</span>
            <h2 class="mt-4 text-2xl font-extrabold text-white sm:text-3xl">Stay in the loop</h2>
            <p class="mt-3 text-sm leading-relaxed text-slate-400">Learning updates, tech facts and community news — straight to your inbox. No spam, unsubscribe anytime.</p>

            <form method="POST" action="{{ route('newsletter.subscribe') }}" class="mt-7">
                @csrf
                <label for="home-newsletter" class="label">Email address</label>
                <div class="flex gap-3">
                    <input type="email" id="home-newsletter" name="email" value="{{ old('email') }}" required maxlength="190" class="input flex-1" placeholder="you@example.com">
                    <button type="submit" class="btn btn-primary !px-5">Subscribe</button>
                </div>
                @error('email')<p class="mt-2 text-sm text-rose-400">{{ $message }}</p>@enderror
            </form>

            <div class="mt-8 grid gap-3 sm:grid-cols-2">
                <div class="flex items-center gap-2.5 rounded-xl bg-white/5 px-4 py-3 text-sm text-slate-300"><i data-lucide="check" class="h-4 w-4 shrink-0 text-brand-400"></i>Weekly digest</div>
                <div class="flex items-center gap-2.5 rounded-xl bg-white/5 px-4 py-3 text-sm text-slate-300"><i data-lucide="check" class="h-4 w-4 shrink-0 text-brand-400"></i>Event invites</div>
                <div class="flex items-center gap-2.5 rounded-xl bg-white/5 px-4 py-3 text-sm text-slate-300"><i data-lucide="check" class="h-4 w-4 shrink-0 text-brand-400"></i>Tutorials & tips</div>
                <div class="flex items-center gap-2.5 rounded-xl bg-white/5 px-4 py-3 text-sm text-slate-300"><i data-lucide="check" class="h-4 w-4 shrink-0 text-brand-400"></i>Portfolio features</div>
            </div>
        </div>
    </section>
</x-app-layout>

