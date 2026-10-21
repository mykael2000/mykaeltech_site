<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> MykaelTech — Build. Learn. Belong. <?php $__env->endSlot(); ?>
     <?php $__env->slot('metaDescription', null, []); ?> MykaelTech is a technology community: services, portfolio showcases, learning updates, tech facts and a CV builder for members. <?php $__env->endSlot(); ?>

    
    <section class="bg-glow relative overflow-hidden">
        <div class="hero-grid" aria-hidden="true"></div>
        <div class="hero-orb hero-orb-1" aria-hidden="true"></div>
        <div class="hero-orb hero-orb-2" aria-hidden="true"></div>
        <div class="hero-orb hero-orb-3" aria-hidden="true"></div>

        <div class="page-shell relative grid items-start gap-6 py-8 md:py-12 lg:grid-cols-2">
            <div class="text-center lg:text-left">
                <span class="home-kicker"><i data-lucide="sparkles" class="h-4 w-4"></i> Welcome to the community</span>

                <h1 class="mt-5 text-4xl font-extrabold leading-tight text-white sm:text-5xl lg:text-6xl">
                    We build, learn and grow
                    <span class="block h-[1.15em]">
                        <span x-data="typewriter(<?php echo e(\Illuminate\Support\Js::from(['innovative web apps','modern mobile experiences','open-source tools','the next big thing'])); ?>)" x-init="start()" class="text-gradient"><span x-text="text"></span></span><span class="tw-caret" aria-hidden="true"></span>
                    </span>
                </h1>

                <p class="mx-auto mt-6 max-w-xl text-lg leading-relaxed text-slate-400 lg:mx-0">
                    A technology community where builders ship real projects, share what they learn, and lift each other up. Explore our services, browse the portfolio, and join the journey.
                </p>

                <div class="mt-9 flex flex-wrap items-center justify-center gap-4 lg:justify-start">
                    <a href="<?php echo e(route('portfolio')); ?>" class="btn btn-primary shine !px-7 !py-3 text-base">Explore portfolio <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                    <a href="<?php echo e(route('join')); ?>" class="btn !border !border-white/10 !bg-white/5 !px-7 !py-3 text-base text-white hover:!bg-white/10">Join the community</a>
                </div>

                <div class="mt-10 flex items-center justify-center gap-8 text-sm text-slate-400 lg:justify-start">
                    <div class="flex items-center gap-2"><i data-lucide="users" class="h-4 w-4 text-brand-400"></i><span><strong class="font-semibold text-white"><?php echo e(number_format($membersCount)); ?>+</strong> members</span></div>
                    <div class="flex items-center gap-2"><i data-lucide="layers-3" class="h-4 w-4 text-brand-400"></i><span><strong class="font-semibold text-white"><?php echo e($projects->count()); ?>+</strong> projects</span></div>
                </div>
            </div>

            <div class="relative hidden lg:block">
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
                    <p class="mt-2 text-2xl font-bold text-white"><?php echo e(number_format($membersCount)); ?>+</p>
                    <p class="text-xs text-slate-400">active builders</p>
                </div>
            </div>
        </div>
    </section>

    
    <?php $tech = ['Laravel', 'PHP', 'JavaScript', 'Tailwind CSS', 'Alpine.js', 'React', 'Node.js', 'MySQL', 'Git', 'Docker', 'Figma', 'Flutter']; ?>
    <section class="border-y border-white/5 bg-ink-900/40 py-6">
        <div class="marquee">
            <div class="marquee-track">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = array_merge($tech, $tech); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="flex items-center gap-2 whitespace-nowrap text-sm font-medium text-slate-400"><i data-lucide="cpu" class="h-4 w-4 text-brand-500"></i><?php echo e($t); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    
    <section class="page-shell page-section">
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div class="stat-tile" data-reveal>
                <i data-lucide="users" class="mx-auto h-7 w-7 text-brand-400"></i>
                <p class="mt-3 text-3xl font-extrabold text-white"><span data-counter="<?php echo e($membersCount); ?>">0</span>+</p>
                <p class="mt-1 text-sm text-slate-400">Community members</p>
            </div>
            <div class="stat-tile" data-reveal>
                <i data-lucide="layers-3" class="mx-auto h-7 w-7 text-brand-400"></i>
                <p class="mt-3 text-3xl font-extrabold text-white"><span data-counter="<?php echo e($projects->count() + 40); ?>">0</span>+</p>
                <p class="mt-1 text-sm text-slate-400">Projects delivered</p>
            </div>
            <div class="stat-tile" data-reveal>
                <i data-lucide="book-open" class="mx-auto h-7 w-7 text-brand-400"></i>
                <p class="mt-3 text-3xl font-extrabold text-white"><span data-counter="<?php echo e($posts->count() + 60); ?>">0</span>+</p>
                <p class="mt-1 text-sm text-slate-400">Learning posts</p>
            </div>
            <div class="stat-tile" data-reveal>
                <i data-lucide="calendar-days" class="mx-auto h-7 w-7 text-brand-400"></i>
                <p class="mt-3 text-3xl font-extrabold text-white"><span data-counter="25">0</span>+</p>
                <p class="mt-1 text-sm text-slate-400">Events hosted</p>
            </div>
        </div>
    </section>

    
    <section class="page-shell page-section">
        <div class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end" data-reveal>
            <div>
                <span class="home-kicker"><i data-lucide="layers-3" class="h-4 w-4"></i> What we do</span>
                <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">Services built for modern teams</h2>
            </div>
            <a href="<?php echo e(route('services')); ?>" class="pro-link !mt-0">All services <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>

        <div class="page-grid md:grid-cols-2 lg:grid-cols-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('services.show', $service->slug)); ?>" class="card-hover group glass flex flex-col rounded-2xl page-card shine" data-reveal>
                    <div class="pro-icon" aria-hidden="true"><i data-lucide="zap" class="h-7 w-7"></i></div>
                    <h3 class="mt-5 text-xl font-bold text-white group-hover:text-brand-300"><?php echo e($service->title); ?></h3>
                    <p class="mt-3 flex-1 text-sm leading-relaxed text-slate-400"><?php echo e($service->excerpt); ?></p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->starting_price): ?>
                        <p class="mt-4 text-sm font-semibold text-brand-300">From <?php echo e($service->starting_price); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <span class="pro-link">Details <i data-lucide="arrow-up-right" class="h-4 w-4"></i></span>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-slate-400">Services coming soon.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>


    
    <section class="page-shell page-section">
        <div class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end" data-reveal>
            <div>
                <span class="home-kicker"><i data-lucide="rocket" class="h-4 w-4"></i> Featured work</span>
                <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">Projects we're proud of</h2>
            </div>
            <a href="<?php echo e(route('portfolio')); ?>" class="pro-link !mt-0">Full portfolio <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>

        <div class="page-grid md:grid-cols-2 lg:grid-cols-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php $cover = $project->cover_photo ?? $project->image_path ?? null; ?>
                <article class="card-hover group glass overflow-hidden rounded-2xl" data-reveal>
                    <div class="relative h-44 w-full overflow-hidden bg-gradient-to-br from-brand-600/30 via-ink-800 to-violet-600/30">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cover): ?>
                            <button type="button" class="h-full w-full" data-lightbox="<?php echo e($cover); ?>" aria-label="View <?php echo e($project->title); ?> image">
                                <img src="<?php echo e($cover); ?>" alt="<?php echo e($project->title); ?>" loading="lazy" class="hover-zoom h-full w-full object-cover">
                            </button>
                        <?php else: ?>
                            <div class="flex h-full w-full items-center justify-center">
                                <i data-lucide="<?php echo e($project->category === 'Mobile' ? 'smartphone' : ($project->category === 'Web' ? 'monitor' : 'bar-chart-3')); ?>" class="h-10 w-10 text-brand-300"></i>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <span class="absolute left-3 top-3 rounded-full bg-ink-950/80 px-3 py-1 text-xs font-semibold text-brand-300 backdrop-blur"><?php echo e($project->category); ?></span>
                    </div>
                    <div class="page-card">
                        <h3 class="text-lg font-bold text-white group-hover:text-brand-300"><?php echo e($project->title); ?></h3>
                        <p class="mt-2 line-clamp-2 text-sm text-slate-400"><?php echo e(Str::limit($project->excerpt ?? $project->short_description, 120)); ?></p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = array_slice($project->technologies ?? $project->tech_stack ?? [], 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="rounded-md bg-white/5 px-2 py-1 text-xs text-slate-300"><?php echo e($tech); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <a href="<?php echo e(route('portfolio.show', $project->slug)); ?>" class="pro-link">Case study <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-slate-400">Featured projects coming soon.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    
    <section class="page-shell page-section">
        <div class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end" data-reveal>
            <div>
                <span class="home-kicker"><i data-lucide="book-open" class="h-4 w-4"></i> From the blog</span>
                <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">Latest learning updates</h2>
            </div>
            <a href="<?php echo e(route('learn')); ?>" class="pro-link !mt-0">Read more <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>

        <div class="page-grid md:grid-cols-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('learn.show', $post->slug)); ?>" class="card-hover group glass flex flex-col rounded-2xl page-card shine" data-reveal>
                    <span class="w-fit rounded-full bg-violet-500/15 px-2.5 py-1 text-xs font-semibold text-violet-300"><?php echo e($post->type_label); ?></span>
                    <h3 class="mt-4 text-lg font-bold text-white group-hover:text-brand-300"><?php echo e($post->title); ?></h3>
                    <p class="mt-2 flex-1 text-sm leading-relaxed text-slate-400"><?php echo e(Str::limit($post->excerpt, 130)); ?></p>
                    <div class="mt-4 flex items-center gap-3 text-xs text-slate-500">
                        <span><?php echo e($post->user?->name ?? 'MykaelTech'); ?></span> ·
                        <time datetime="<?php echo e(optional($post->published_at)->toDateString()); ?>"><?php echo e(optional($post->published_at)->format('M j, Y')); ?></time> ·
                        <span><?php echo e($post->views); ?> views</span>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-slate-400">No posts yet.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>


    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($facts->isNotEmpty()): ?>
    <section class="border-y border-white/5 bg-ink-900/40 page-section">
        <div class="page-shell">
            <div class="mb-10 text-center" data-reveal>
                <span class="home-kicker"><i data-lucide="lightbulb" class="h-4 w-4"></i> Did you know?</span>
                <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">Tech facts worth knowing</h2>
            </div>
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $facts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="glass card-hover rounded-2xl p-5" data-reveal>
                        <i data-lucide="zap" class="h-5 w-5 text-brand-400"></i>
                        <p class="mt-3 text-sm leading-relaxed text-slate-300"><?php echo e($fact->fact); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fact->source_url): ?>
                            <a href="<?php echo e($fact->source_url); ?>" target="_blank" rel="noopener" class="mt-3 inline-flex items-center gap-1.5 text-xs font-semibold text-brand-300 hover:underline">Source <i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i></a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($testimonials->isNotEmpty()): ?>
    <section class="page-shell page-section">
        <div class="mb-10 text-center" data-reveal>
            <span class="home-kicker"><i data-lucide="quote" class="h-4 w-4"></i> Testimonials</span>
            <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">What members say</h2>
        </div>

        <div class="mx-auto max-w-3xl" data-reveal
             x-data="testimonialSlider(<?php echo e(\Illuminate\Support\Js::from($testimonials->map(fn ($t) => ['content' => $t->content, 'author_name' => $t->author_name, 'author_role' => $t->author_role, 'company' => $t->company, 'rating' => $t->rating])->values()->all())); ?>)">
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($events->isNotEmpty()): ?>
    <section class="page-shell page-section">
        <div class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end" data-reveal>
            <div>
                <span class="home-kicker"><i data-lucide="calendar-days" class="h-4 w-4"></i> Upcoming</span>
                <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">Events & meetups</h2>
            </div>
            <a href="<?php echo e(route('community')); ?>" class="pro-link !mt-0">Community <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>
        <div class="page-grid md:grid-cols-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="glass card-hover rounded-2xl page-card" data-reveal>
                    <div class="flex items-center gap-3">
                        <div class="flex h-14 w-14 shrink-0 flex-col items-center justify-center rounded-xl bg-gradient-to-br from-brand-600/30 to-violet-600/30 text-white">
                            <span class="text-lg font-extrabold leading-none"><?php echo e(optional($event->starts_at)->format('d')); ?></span>
                            <span class="text-[10px] font-semibold uppercase tracking-wider"><?php echo e(optional($event->starts_at)->format('M')); ?></span>
                        </div>
                        <div class="min-w-0">
                            <h3 class="truncate text-base font-bold text-white"><?php echo e($event->title); ?></h3>
                            <p class="mt-0.5 flex items-center gap-1.5 text-xs text-slate-400"><i data-lucide="map-pin" class="h-3.5 w-3.5"></i><?php echo e($event->location ?? 'Online'); ?></p>
                        </div>
                    </div>
                    <p class="mt-4 line-clamp-3 text-sm leading-relaxed text-slate-400"><?php echo e($event->description); ?></p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($event->registration_url): ?>
                        <a href="<?php echo e($event->registration_url); ?>" target="_blank" rel="noopener" class="pro-link">Register <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
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
                    <a href="<?php echo e(route('join')); ?>" class="btn btn-primary shine !px-7 !py-3 text-base">Create free account <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                    <button type="button"
                            @click="$store.ui.openRecord('promo', { title: 'MykaelTech membership', body: 'Members get a public portfolio, a CV generator, learning updates, community events and a profile at /cv/your-username — free, no credit card required.' })"
                            class="btn !border !border-white/10 !bg-white/5 !px-7 !py-3 text-base text-white hover:!bg-white/10">
                        <i data-lucide="gift" class="h-4 w-4"></i> What's included?
                    </button>
                </div>
            </div>
        </div>
    </section>


    
    <section class="page-shell page-section grid gap-6 lg:grid-cols-2">
        
        <div class="glass rounded-3xl p-8 sm:p-10" data-reveal>
            <span class="home-kicker"><i data-lucide="send" class="h-4 w-4"></i> Get in touch</span>
            <h2 class="mt-4 text-2xl font-extrabold text-white sm:text-3xl">Have a project in mind?</h2>
            <p class="mt-3 text-sm leading-relaxed text-slate-400">Tell us what you're building and we'll get back to you within 24 hours. Or reach us directly via the contact page.</p>

            <form method="POST" action="<?php echo e(route('contact.store')); ?>" class="mt-7 space-y-4">
                <?php echo csrf_field(); ?>
                <div class="hidden" aria-hidden="true">
                    <label for="home-website">Website</label>
                    <input type="text" id="home-website" name="website" tabindex="-1" autocomplete="off">
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="home-name" class="label">Name *</label>
                        <input type="text" id="home-name" name="name" value="<?php echo e(old('name')); ?>" required maxlength="120" class="input" placeholder="Your name">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-rose-400"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div>
                        <label for="home-email" class="label">Email *</label>
                        <input type="email" id="home-email" name="email" value="<?php echo e(old('email')); ?>" required maxlength="190" class="input" placeholder="you@example.com">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-rose-400"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <div>
                    <label for="home-subject" class="label">Subject</label>
                    <input type="text" id="home-subject" name="subject" value="<?php echo e(old('subject')); ?>" maxlength="190" class="input" placeholder="How can we help?">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-rose-400"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <label for="home-message" class="label">Message *</label>
                    <textarea id="home-message" name="message" rows="4" required maxlength="5000" class="input resize-y" placeholder="Tell us a little about your project…"><?php echo e(old('message')); ?></textarea>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-rose-400"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary shine w-full !py-3">Send message <i data-lucide="send" class="h-4 w-4"></i></button>
            </form>
        </div>

        
        <div class="glass flex flex-col rounded-3xl p-8 sm:p-10" data-reveal>
            <span class="home-kicker"><i data-lucide="bell" class="h-4 w-4"></i> Newsletter</span>
            <h2 class="mt-4 text-2xl font-extrabold text-white sm:text-3xl">Stay in the loop</h2>
            <p class="mt-3 text-sm leading-relaxed text-slate-400">Learning updates, tech facts and community news — straight to your inbox. No spam, unsubscribe anytime.</p>

            <form method="POST" action="<?php echo e(route('newsletter.subscribe')); ?>" class="mt-7">
                <?php echo csrf_field(); ?>
                <label for="home-newsletter" class="label">Email address</label>
                <div class="flex gap-3">
                    <input type="email" id="home-newsletter" name="email" value="<?php echo e(old('email')); ?>" required maxlength="190" class="input flex-1" placeholder="you@example.com">
                    <button type="submit" class="btn btn-primary !px-5">Subscribe</button>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-2 text-sm text-rose-400"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </form>

            <div class="mt-8 grid gap-3 sm:grid-cols-2">
                <div class="flex items-center gap-2.5 rounded-xl bg-white/5 px-4 py-3 text-sm text-slate-300"><i data-lucide="check" class="h-4 w-4 shrink-0 text-brand-400"></i>Weekly digest</div>
                <div class="flex items-center gap-2.5 rounded-xl bg-white/5 px-4 py-3 text-sm text-slate-300"><i data-lucide="check" class="h-4 w-4 shrink-0 text-brand-400"></i>Event invites</div>
                <div class="flex items-center gap-2.5 rounded-xl bg-white/5 px-4 py-3 text-sm text-slate-300"><i data-lucide="check" class="h-4 w-4 shrink-0 text-brand-400"></i>Tutorials & tips</div>
                <div class="flex items-center gap-2.5 rounded-xl bg-white/5 px-4 py-3 text-sm text-slate-300"><i data-lucide="check" class="h-4 w-4 shrink-0 text-brand-400"></i>Portfolio features</div>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/pages/home.blade.php ENDPATH**/ ?>