{{-- MykaelTech — Homepage Redesign --}}
{{-- Wrapped in the app layout component: renders head, Vite assets, header, main slot, footer. --}}

<x-app-layout>
    <x-slot name="title">Home — MykaelTech</x-slot>

    <div id="main" tabindex="-1" class="sr-only-focusable">

        {{-- Scroll progress --}}
        <div id="scroll-progress" class="fixed top-0 left-0 h-1 w-0 bg-gradient-to-r from-brand-500 via-violet-500 to-brand-500 origin-top-left scale-x-0 scale-origin-left transition-transform z-[60]"></div>

        {{-- Hero --}}
        <section class="home-section relative overflow-hidden bg-glow min-h-[640px] md:min-h-[720px] flex items-center" id="hero" aria-labelledby="hero-heading">
            <div class="hero-orb hero-orb-1" aria-hidden="true"></div>
            <div class="hero-orb hero-orb-2" aria-hidden="true"></div>
            <div class="hero-orb hero-orb-3" aria-hidden="true"></div>
            <div class="hero-grid" aria-hidden="true"></div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col lg:flex-row gap-16 items-center w-full">
                <div class="lg:w-1/2 [data-reveal]" style="transition-delay: 0.05s;">
                    <div class="home-kicker inline-flex items-center gap-2 mb-6 text-brand-400 font-semibold uppercase tracking-wider text-sm">
                        <i data-lucide="rocket" class="w-4 h-4"></i>
                        <span>Building the future</span>
                    </div>
                    <h1 id="hero-heading" class="text-4xl sm:text-5xl lg:text-7xl font-extrabold tracking-tight leading-tight mb-7 text-white">
                        <span class="block text-white">Next-gen</span>
                        <span class="block mt-1 text-gradient">digital experiences</span>
                        <span class="block mt-3 text-5xl sm:text-6xl lg:text-7xl font-extrabold text-white">
                            <span x-data="typewriter(['for creators.', 'for builders.', 'for the web.'])" x-init="start()" class="inline-block">
                                <span x-text="text"></span>
                                <span class="tw-caret inline-block align-[-2px]"></span>
                            </span>
                        </span>
                    </h1>
                    <p class="text-lg sm:text-xl text-slate-400 leading-relaxed mb-10 max-w-lg">
                        MykaelTech is a technology community for builders, designers, and engineers.
                        Showcase your portfolio, publish learning updates, and grow with a network of makers.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('contact') }}" class="btn btn-primary glass-strong text-white px-7 py-3.5 text-base font-semibold shadow-lg shadow-brand-500/25 focus:outline-none focus:ring-2 focus:ring-brand-500/50">
                            Start a Project <i data-lucide="arrow-up-right" class="w-4 h-4 ml-2"></i>
                        </a>
                        <a href="{{ route('portfolio') }}" class="btn glass px-7 py-3.5 text-base font-semibold text-slate-300 hover:text-white hover:border-brand-500/50 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                            View Work
                        </a>
                    </div>
                </div>

                <div class="lg:w-1/2 flex justify-center [data-reveal]" style="transition-delay: 0.2s;">
                    <div class="relative w-full max-w-md">
                        <div class="absolute inset-0 bg-brand-500/10 rounded-2xl blur-3xl"></div>
                        <div class="relative rounded-2xl border border-white/10 bg-ink-900/50 p-1 shadow-2xl shadow-black/40">
                            <div class="grid grid-cols-3 gap-1">
                                <div class="bg-white/5 rounded-lg aspect-square"></div>
                                <div class="bg-brand-500/20 rounded-lg aspect-square"></div>
                                <div class="bg-white/5 rounded-lg aspect-square"></div>
                                <div class="bg-violet-500/20 rounded-lg aspect-square"></div>
                                <div class="bg-brand-500/10 rounded-lg aspect-square"></div>
                                <div class="bg-white/5 rounded-lg aspect-square"></div>
                                <div class="bg-white/5 rounded-lg aspect-square"></div>
                                <div class="bg-brand-500/15 rounded-lg aspect-square"></div>
                                <div class="bg-white/10 rounded-lg aspect-square"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Animated stats band --}}
            <div class="mt-14 flex flex-wrap gap-6 md:gap-8 -mx-2 overflow-hidden">
                <div class="px-2 flex-shrink-0 glass rounded-2xl p-5 md:p-6 min-w-[200px] md:min-w-[220px] flex flex-col items-center text-center [data-reveal]" style="transition-delay: 0.35s;">
                    <div class="text-3xl md:text-4xl font-bold text-white mb-1 [data-counter]" data-target="1200">0</div>
                    <div class="text-sm text-slate-400 uppercase tracking-wider">Hours logged</div>
                </div>
                <div class="px-2 flex-shrink-0 glass rounded-2xl p-5 md:p-6 min-w-[200px] md:min-w-[220px] flex flex-col items-center text-center [data-reveal]" style="transition-delay: 0.45s;">
                    <div class="text-3xl md:text-4xl font-bold text-white mb-1 [data-counter]" data-target="850">0</div>
        {{-- Tech marquee --}}
        <section class="home-section border-y border-white/5 bg-ink-900/40">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-2 rounded-full bg-brand-400 animate-pulse"></div>
                    <h2 class="text-sm font-semibold uppercase tracking-wider text-slate-300">Tech stack</h2>
                </div>
                <div class="overflow-hidden">
                    <div class="inline-flex animate-marquee gap-8 md:gap-12 whitespace-nowrap">
                        <span class="text-sm text-slate-400 font-medium">HTML5</span>
                        <span class="text-sm text-slate-400 font-medium">CSS3</span>
                        <span class="text-sm text-slate-400 font-medium">JavaScript</span>
                        <span class="text-sm text-brand-400 font-medium">Tailwind CSS</span>
                        <span class="text-sm text-slate-400 font-medium">Alpine.js</span>
                        <span class="text-sm text-slate-400 font-medium">Laravel</span>
                        <span class="text-sm text-purple-400 font-medium">PHP</span>
                        <span class="text-sm text-slate-400 font-medium">MySQL</span>
                        <span class="text-sm text-brand-400 font-medium">Vite</span>
                        <span class="text-sm text-slate-400 font-medium">Git</span>
                        <span class="text-sm text-emerald-400 font-medium">Docker</span>
                        <span class="text-sm text-slate-400 font-medium">Figma</span>
                    </div>
                </div>
            </div>
        </section>
        {{-- Services --}}
        <section class="home-section py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center [data-reveal]" style="transition-delay: 0.1s;">
                    <h2 class="home-kicker inline-flex items-center gap-2 mb-4 text-brand-400 font-semibold uppercase tracking-wider text-sm">
                        <i data-lucide="zap" class="w-4 h-4"></i>
                        <span>What we build</span>
                    </h2>
                    <h3 class="section-title text-3xl sm:text-4xl font-bold text-white mb-2">Services</h3>
                    <p class="text-slate-400 max-w-2xl mx-auto mt-3">From idea to production — custom web applications, community platforms, and developer tools tailored to your goals.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16">
                    @php
                        $services = [
                            ['title' => 'Web Applications', 'desc' => 'Modern, responsive web apps built with Laravel and Tailwind. Fast, secure, and scalable.', 'icon' => 'monitor'],
                            ['title' => 'Community Platforms', 'desc' => 'Member portals, event hubs, and learning communities where builders connect and grow.', 'icon' => 'users'],
                            ['title' => 'Developer Tools', 'desc' => 'CV generators, portfolio showcases, and productivity tools for developers and designers.', 'icon' => 'tool'],
                        ];
                    @endphp
                    @foreach ($services as $service)
                        <div class="card-hover p-8 rounded-3xl border border-white/10 bg-ink-900/50 [data-reveal]" style="transition-delay: {{ $loop->index * 0.1 }}s;">
                            <div class="w-10 h-10 rounded-xl bg-brand-500/10 flex items-center justify-center text-brand-400 mb-6">
                                <i data-lucide="{{ $service['icon'] }}" class="w-5 h-5"></i>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-3">{{ $service['title'] }}</h4>
                            <p class="text-slate-400 text-sm leading-relaxed">{{ $service['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        {{-- Featured Projects --}}
        <section class="home-section py-24 border-y border-white/5 bg-ink-900/30">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-10 [data-reveal]" style="transition-delay: 0.1s;">
                    <div>
                        <h2 class="section-title text-3xl sm:text-4xl font-bold text-white mb-2">Featured Projects</h2>
                        <p class="text-slate-400">A selection of work from the MykaelTech community.</p>
                    </div>
                    <a href="{{ route('portfolio') }}" class="btn glass text-sm font-semibold hover:text-white hover:border-brand-500/50 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                        View all <i data-lucide="arrow-up-right" class="w-3.5 h-3.5 ml-1"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $projects = [
                            [
                                'title' => 'DevFolio',
                                'desc' => 'A portfolio platform for developers to showcase projects and track learning progress.',
                                'status_label' => 'Live',
                                'technologies' => ['Laravel', 'Tailwind', 'Alpine.js'],
                                'slug' => 'devfolio',
                                'external_url' => 'https://example.com/devfolio',
                                'github_url' => 'https://github.com/example/devfolio',
                            ],
                            [
                                'title' => 'LearnHub',
                                'desc' => 'Community learning portal with course tracking, badges, and member discussions.',
                                'status_label' => 'Beta',
                                'technologies' => ['Laravel', 'Livewire', 'Alpine.js'],
                                'slug' => 'learnhub',
                                'external_url' => null,
                                'github_url' => 'https://github.com/example/learnhub',
                            ],
                            [
                                'title' => 'CV Forge',
                                'desc' => 'Instant CV generator with multiple templates, export to PDF, and online publishing.',
                                'status_label' => 'Live',
                                'technologies' => ['Laravel', 'Tailwind', 'Alpine.js'],
                                'slug' => 'cvforge',
                                'external_url' => 'https://example.com/cvforge',
                                'github_url' => null,
                            ],
                        ];
                    @endphp
                    @foreach ($projects as $project)
                        <article
                            class="group relative p-6 rounded-3xl border border-white/10 bg-ink-900/50 hover:border-brand-500/50 hover:bg-ink-800/50 transition-all card-hover [data-reveal]"
                            style="transition-delay: {{ $loop->index * 0.08 }}s;"
                        >
                            <div class="flex justify-between items-start mb-5">
                                <span class="text-xs font-semibold uppercase tracking-wider text-brand-400">{{ $project['status_label'] }}</span>
                                <button @click="ui.openRecord('project', '{{ $project['slug'] }}')" class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-400 hover:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30 transition" aria-label="Quick view">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>
                            </div>
                            <h3 class="text-lg font-bold text-white mb-2 group-hover:text-brand-400 transition">{{ $project['title'] }}</h3>
                            <p class="text-slate-400 text-sm leading-relaxed mb-5">{{ $project['desc'] }}</p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach ((array) $project['technologies'] as $tech)
                                    <span class="px-2.5 py-1 rounded bg-white/5 text-xs text-slate-300 border border-white/5">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <div class="flex gap-3">
                                @if($project['external_url'])
                                    <a href="{{ $project['external_url'] }}" target="_blank" rel="noopener noreferrer" class="flex-1 btn btn-primary text-center py-2 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand-500/40">Live demo</a>
                                @else
                                    <button class="flex-1 btn glass text-center py-2 text-xs font-semibold text-slate-500 border-slate-700/50 cursor-not-allowed opacity-60" disabled>Live demo</button>
                                @endif
                                @if($project['github_url'])
                                    <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener noreferrer" class="flex-1 btn glass text-center py-2 text-xs font-semibold text-slate-300 hover:text-white hover:border-white/30 focus:outline-none focus:ring-2 focus:ring-white/20">GitHub</a>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        {{-- Testimonials Slider --}}
        <section class="home-section py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center [data-reveal]" style="transition-delay: 0.1s;">
                    <h2 class="home-kicker inline-flex items-center gap-2 mb-4 text-brand-400 font-semibold uppercase tracking-wider text-sm">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                        <span>What members say</span>
                    </h2>
                    <h3 class="section-title text-3xl sm:text-4xl font-bold text-white mb-8">Testimonials</h3>
                </div>

                <div x-data="testimonialSlider()" class="relative overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out" x-bind:style="`transform: translateX(-${current * 100}%)`">
                        <template x-for="(testimonial, index) in testimonials" :key="index">
                            <div class="min-w-full flex items-center justify-center px-4">
                                <div class="max-w-2xl text-center [data-reveal]" :style="`transition-delay: ${0.1 + index * 0.05}s`">
                                    <div class="flex justify-center mb-6">
                                        <template x-for="n in 5" :key="n">
                                            <i data-lucide="star" class="w-4 h-4 text-brand-400 fill-current"></i>
                                        </template>
                                    </div>
                                    <p class="text-lg text-slate-300 leading-relaxed mb-6 italic">"<span x-text="testimonial.text"></span>"</p>
                                    <div class="flex items-center justify-center gap-3">
                                        <img :src="testimonial.avatar" :alt="testimonial.name" class="w-10 h-10 rounded-full border border-white/10 object-cover">
                                        <div class="text-left">
                                            <h4 class="text-sm font-bold text-white" x-text="testimonial.name"></h4>
                                            <p class="text-xs text-slate-500" x-text="testimonial.role"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="flex justify-center mt-8 gap-2">
                        <template x-for="n in testimonials.length" :key="n">
                            <button @click="current = n - 1" :class="current === n - 1 ? 'bg-brand-500 w-6' : 'bg-white/10 w-3'" class="h-1.5 rounded-full transition hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-brand-500/30"></button>
                        </template>
                    </div>

                    <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/5 border border-white/10 text-slate-300 hover:text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-brand-500/30 transition" aria-label="Previous">
                        <i data-lucide="chevron-left" class="w-4 h-4"></i>
                    </button>
                    <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/5 border border-white/10 text-slate-300 hover:text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-brand-500/30 transition" aria-label="Next">
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </section>

        {{-- CTA Band --}}
        <section class="home-section py-20">
            <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8 text-center [data-reveal]" style="transition-delay: 0.1s;">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Ready to start your next project?</h2>
                <p class="text-slate-400 mb-8 text-lg">Join 800+ builders in the MykaelTech community. Get help, share your work, and grow together.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="flex-1 btn btn-primary glass-strong text-white px-8 py-4 text-base font-semibold shadow-lg shadow-brand-500/25 focus:outline-none focus:ring-2 focus:ring-brand-500/50">
                        Start a Project <i data-lucide="arrow-up-right" class="w-4 h-4 ml-2"></i>
                    </a>
                    <a href="{{ route('join') }}" class="flex-1 btn glass text-center px-8 py-4 text-base font-semibold text-slate-300 hover:text-white hover:border-brand-500/50 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                        Join free
        {{-- Project quick-view modals --}}
        @foreach ($projects as $project)
            <div
                x-show="ui.open && ui.kind === 'project' && ui.record === '{{ $project['slug'] }}'"
                x-transition:enter="transition-opacity ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8"
                @click.outside="ui.close()"
                aria-modal="true" role="dialog"
            >
                <div
                    x-show="ui.open && ui.kind === 'project' && ui.record === '{{ $project['slug'] }}'"
                    x-transition:enter="transition-opacity ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-ink-950/70 backdrop-blur-sm"
                    @click="ui.close()"
                    aria-hidden="true"
                ></div>
                <div
                    x-show="ui.open && ui.kind === 'project' && ui.record === '{{ $project['slug'] }}'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-4 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-4 sm:scale-95"
                    class="bg-ink-900 border border-white/10 rounded-3xl p-6 md:p-10 max-w-md w-full shadow-2xl shadow-black/50"
                    @click.stop
                >
                    <div class="flex justify-between items-start mb-6">
                        <h3 class="text-xl font-bold text-white">{{ $project['title'] }}</h3>
                        <button @click="ui.close()" class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-brand-500/30 transition" aria-label="Close">
                            <i data-lucide="x" class="w-5 h-5"></i>
                        </button>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">{{ $project['desc'] }}</p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-between text-sm border-b border-white/5 pb-2">
                            <span class="text-slate-400">Status</span>
                            <span class="font-semibold text-brand-400">{{ $project['status_label'] }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm border-b border-white/5 pb-2">
                            <span class="text-slate-400">Technologies</span>
                            <span class="font-semibold text-white">
                                @foreach ((array) $project['technologies'] as $tech) {{ $tech }} @if(!$loop->last), @endif @endforeach
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-white/5">
                        @if($project['external_url'])
                            <a href="{{ $project['external_url'] }}" target="_blank" rel="noopener noreferrer" class="flex-1 btn btn-primary text-center py-3 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-500/40">
                                Live demo <i data-lucide="arrow-up-right" class="w-3.5 h-3.5 ml-1.5"></i>
                            </a>
                        @else
                            <button class="flex-1 btn glass text-center py-3 text-sm font-semibold text-slate-500 border-slate-700/50 cursor-not-allowed opacity-60" disabled>
                                Live demo
                            </button>
                        @endif
                        @if($project['github_url'])
                            <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener noreferrer" class="flex-1 btn glass text-center py-3 text-sm font-semibold text-slate-300 hover:text-white hover:border-white/30 focus:outline-none focus:ring-2 focus:ring-white/20">
                                <i data-lucide="github" class="w-3.5 h-3.5 mr-1.5"></i> GitHub
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        {{-- Contact / Quote modal --}}
        <div
            x-show="ui.open && ui.kind === 'contact'"
            x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8"
            @click.outside="ui.close()"
            aria-modal="true" role="dialog"
        >
            <div
                x-show="ui.open && ui.kind === 'contact'"
                x-transition:enter="transition-opacity ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-ink-950/70 backdrop-blur-sm"
                @click="ui.close()"
                aria-hidden="true"
            ></div>
            <div
                x-show="ui.open && ui.kind === 'contact'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-4 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-4 sm:scale-95"
                class="bg-ink-900 border border-white/10 rounded-3xl p-6 md:p-10 max-w-md w-full shadow-2xl shadow-black/50"
                @click.stop
            >
                <div class="flex justify-between items-start mb-7">
                    <h3 class="text-xl font-bold text-white">Get a Quote</h3>
                    <button @click="ui.close()" class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-brand-500/30 transition" aria-label="Close">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed mb-7">Tell us about your project and we'll get back to you within one business day.</p>
                <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Name</label>
                        <input type="text" name="name" required class="w-full rounded-lg border border-white/10 bg-ink-950/50 px-3.5 py-2.5 text-sm text-white placeholder:text-slate-500 focus:border-brand-500/50 focus:outline-none focus:ring-2 focus:ring-brand-500/20" placeholder="Your name">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Email</label>
                        <input type="email" name="email" required class="w-full rounded-lg border border-white/10 bg-ink-950/50 px-3.5 py-2.5 text-sm text-white placeholder:text-slate-500 focus:border-brand-500/50 focus:outline-none focus:ring-2 focus:ring-brand-500/20" placeholder="you@example.com">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">What are you building?</label>
                        <textarea name="message" required rows="4" class="w-full rounded-lg border border-white/10 bg-ink-950/50 px-3.5 py-2.5 text-sm text-white placeholder:text-slate-500 focus:border-brand-500/50 focus:outline-none focus:ring-2 focus:ring-brand-500/20" placeholder="Briefly describe your project..."></textarea>
                    </div>
                    <button type="submit" class="w-full btn btn-primary py-3 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-500/40">Send message</button>
                </form>
                <p class="mt-6 text-xs text-slate-500 text-center">Protected by reCAPTCHA — Privacy Policy · Terms of Service</p>
            </div>
        </div>
        {{-- Once-per-session promo pop-up --}}
        <div
            x-data="{ promoOpen: (() => { try { return localStorage.getItem('mt_promo_dismissed') === '1'; } catch(e) { return true; } })() }"
            x-init="
                if (!promoOpen) {
                    setTimeout(() => { promoOpen = true; }, 2500);
                }
            "
        >
            <div
                x-show="promoOpen"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-y-10"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-10"
                class="fixed bottom-6 right-6 z-[100] glass-strong rounded-2xl border border-brand-500/30 p-5 md:p-7 max-w-xs w-full shadow-2xl shadow-brand-500/10"
            >
                <div class="flex gap-3">
                    <div class="w-10 h-10 rounded-xl bg-brand-500/20 flex items-center justify-center text-brand-400 shrink-0">
                        <i data-lucide="gift" class="w-5 h-5"></i>
                    </div>
                    <div class="flex flex-col leading-tight">
                        <h4 class="text-sm font-bold text-white">Free community access</h4>
                        <p class="text-xs text-slate-400 leading-relaxed mt-0.5">Join 800+ builders. Get early access to events, project showcases, and the CV generator.</p>
                    </div>
                </div>
                <div class="mt-5 flex flex-col sm:flex-row gap-3 pt-4 border-t border-white/10">
                    <a href="{{ route('join') }}" class="flex-1 btn btn-primary text-center py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand-500/40">Join free</a>
                    <button @click="promoOpen = false; try { localStorage.setItem('mt_promo_dismissed', '1'); } catch(e) {}" class="btn glass text-center py-2.5 text-xs font-semibold text-slate-300 hover:text-white hover:border-white/30 focus:outline-none focus:ring-2 focus:ring-white/20">Maybe later</button>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
