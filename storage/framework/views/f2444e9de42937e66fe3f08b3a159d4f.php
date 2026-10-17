


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
     <?php $__env->slot('title', null, []); ?> Home — MykaelTech <?php $__env->endSlot(); ?>

    <div id="main" tabindex="-1" class="sr-only-focusable">

        
        <div id="scroll-progress" class="fixed top-0 left-0 h-1 w-0 bg-gradient-to-r from-brand-500 via-violet-500 to-brand-500 origin-top-left scale-x-0 scale-origin-left transition-transform z-[60]"></div>

        
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
                        <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary glass-strong text-white px-7 py-3.5 text-base font-semibold shadow-lg shadow-brand-500/25 focus:outline-none focus:ring-2 focus:ring-brand-500/50">
                            Start a Project <i data-lucide="arrow-up-right" class="w-4 h-4 ml-2"></i>
                    
                    <div class="mt-14 flex flex-wrap gap-6 md:gap-8 -mx-2 overflow-hidden">
                        <div class="px-2 flex-shrink-0 glass rounded-2xl p-5 md:p-6 min-w-[200px] md:min-w-[220px] flex flex-col items-center text-center [data-reveal]" style="transition-delay: 0.35s;">
                            <div class="text-3xl md:text-4xl font-bold text-white mb-1 [data-counter]" data-target="1200">0</div>
                            <div class="text-sm text-slate-400 uppercase tracking-wider">Hours logged</div>
                        </div>
                        <div class="px-2 flex-shrink-0 glass rounded-2xl p-5 md:p-6 min-w-[200px] md:min-w-[220px] flex flex-col items-center text-center [data-reveal]" style="transition-delay: 0.5s;">
                            <div class="text-3xl md:text-4xl font-bold text-white mb-1 [data-counter]" data-target="85">0</div>
                            <div class="text-sm text-slate-400 uppercase tracking-wider">Projects shipped</div>
                        </div>
                        <div class="px-2 flex-shrink-0 glass rounded-2xl p-5 md:p-6 min-w-[200px] md:min-w-[220px] flex flex-col items-center text-center [data-reveal]" style="transition-delay: 0.65s;">
                            <div class="text-3xl md:text-4xl font-bold text-white mb-1 [data-counter]" data-target="<?php echo e($membersCount ?? 0); ?>">0</div>
                            <div class="text-sm text-slate-400 uppercase tracking-wider">Community members</div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2 [data-reveal] relative" style="transition-delay: 0.2s;">
                    <div class="glass-strong rounded-3xl p-8 md:p-12 border-brand-500/20 shadow-[0_0_80px_rgba(6,182,212,0.12)] relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-br from-transparent to-brand-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                        <div class="absolute top-6 left-6 w-12 h-12 rounded-full bg-brand-500/20 flex items-center justify-center border border-brand-500/30">
                            <i data-lucide="layers3" class="w-6 h-6 text-brand-400"></i>
                        </div>
                        <div class="relative z-10 grid grid-cols-2 gap-4 md:gap-6">
                            <div class="col-span-2 bg-ink-950/60 rounded-xl p-4 md:p-5 border border-white/6">
                                <div class="flex items-center gap-2.5 mb-3">
                                    <div class="w-2.5 h-2.5 rounded-full bg-red-500/90"></div>
                                    <div class="w-2.5 h-2.5 rounded-full bg-yellow-500/90"></div>
                                    <div class="w-2.5 h-2.5 rounded-full bg-emerald-500/90"></div>
                                </div>
                                <pre class="text-xs md:text-sm text-slate-400 font-mono leading-relaxed overflow-x-auto"><code>&lt;MykaelTech /&gt;<br/><span class="text-brand-400">  build</span> --community --learn --ship</code></pre>
                            </div>
                            <div class="h-32 md:h-40 bg-ink-800/60 rounded-xl border border-white/8"></div>
                            <div class="h-32 md:h-40 bg-ink-800/60 rounded-xl border border-white/8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <div class="bg-ink-900 border-y border-white/5 py-8 overflow-hidden">
            <div class="marquee" aria-hidden="true">
                <div class="marquee-track">
                    <?php
                        $_marquee = ['HTML5', 'CSS3', 'JavaScript', 'Laravel', 'Vue.js', 'React', 'Tailwind CSS', 'Node.js', 'Python', 'PostgreSQL', 'Git', 'Docker', 'Figma', 'Web Accessibility', 'Performance', 'API Design'];
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $_marquee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="px-4 py-1.5 text-sm text-slate-400 whitespace-nowrap font-medium"><?php echo e($_tech); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $_marquee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="px-4 py-1.5 text-sm text-slate-400 whitespace-nowrap font-medium"><?php echo e($_tech); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
    
    <section class="home-section py-24 lg:py-32" id="services">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 lg:mb-24 [data-reveal]">
                <h2 class="home-kicker inline-flex items-center gap-2 text-brand-400 font-semibold uppercase tracking-wider text-sm mb-4">
                    <i data-lucide="cpu" class="w-4 h-4"></i>
                    <span>Services</span>
                </h2>
                <h3 class="section-title text-3xl md:text-4xl font-bold text-white mb-6">What we build</h3>
                <p class="text-lg text-slate-400 max-w-2xl mx-auto leading-relaxed">
                    From idea to production. We design, develop, and deploy digital products that scale — for
                    creators, builders, and the open web.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 lg:gap-10">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article
                        class="glass card-hover rounded-3xl p-8 md:p-10 flex flex-col group border border-white/5 hover:border-brand-500/30 [data-reveal]"
                        role="button" tabindex="0"
                        aria-label="View <?php echo e($service->title); ?> details"
                        @click="ui.openRecord('service', '<?php echo e($service->slug); ?>')"
                    >
                        <div class="w-14 h-14 rounded-2xl bg-brand-500/10 flex items-center justify-center mb-7 group-hover:bg-brand-500/20 transition-colors duration-300">
                            <i data-lucide="<?php echo e($service->icon ?? 'code2'); ?>" class="w-7 h-7 text-brand-400 group-hover:text-brand-300 transition-colors"></i>
                        </div>
                        <h4 class="text-xl md:text-2xl font-bold text-white mb-3 group-hover:text-brand-400 transition-colors"><?php echo e($service->title); ?></h4>
                        <p class="text-slate-400 text-sm md:text-base leading-relaxed mb-7 flex-1"><?php echo e($service->excerpt); ?></p>
                        <ul class="space-y-2.5 mb-8 mt-auto">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = (array) ($service->features ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="flex items-center gap-3 text-xs md:text-sm text-slate-300">
                                    <i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                                    <?php echo e($feature); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                        <div class="flex items-center justify-between pt-7 border-t border-white/5">
                            <span class="text-sm font-semibold text-white">
                                <?php echo e($service->starting_price ? '$'.number_format($service->starting_price) : 'From $0'); ?>

                            </span>
                            <span class="text-xs font-semibold text-brand-400 uppercase tracking-wider flex items-center gap-1.5">
                                View details <i data-lucide="chevron-right" class="w-3 h-3"></i>
                            </span>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    
    <section class="home-section py-24 lg:py-32 bg-ink-900/30" id="portfolio">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-16 lg:mb-24 [data-reveal]">
                <div>
                    <h2 class="home-kicker inline-flex items-center gap-2 text-brand-400 font-semibold uppercase tracking-wider text-sm mb-4">
                        <i data-lucide="globe2" class="w-4 h-4"></i>
                        <span>Featured Work</span>
                    </h2>
                    <h3 class="section-title text-3xl md:text-4xl font-bold text-white">Selected projects</h3>
                </div>
                <a href="<?php echo e(route('portfolio')); ?>" class="btn glass text-sm px-5 py-2.5 text-slate-300 hover:text-white hover:border-brand-500/50 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    All projects <i data-lucide="arrow-right" class="w-3 h-3 ml-1.5"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div
                        class="glass card-hover rounded-2xl overflow-hidden group border border-white/5 [data-reveal]"
                        role="button" tabindex="0"
                        aria-label="View <?php echo e($project->title); ?> project"
                        @click="ui.openRecord('project', '<?php echo e($project->slug); ?>')"
                    >
                        <div class="relative h-48 md:h-56 lg:h-60 overflow-hidden">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->cover_photo): ?>
                                <img
                                    src="<?php echo e(asset('storage/'.$project->cover_photo)); ?>"
                                    alt="<?php echo e($project->title); ?>"
                                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700"
                                    loading="lazy"
                                >
                            <?php else: ?>
                                <div class="w-full h-full bg-ink-800 border border-white/10 flex items-center justify-center">
                                    <i data-lucide="image" class="w-10 h-10 text-slate-500 group-hover:text-brand-400 transition-colors"></i>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <span class="absolute top-4 left-4 text-xs font-semibold px-2 py-1 rounded bg-brand-500/10 text-brand-300 border border-brand-500/20 backdrop-blur-sm">
                                <?php echo e($project->status_label); ?>

                            </span>
                            <a
                                href="<?php echo e($project->external_url); ?>"
                                target="_blank" rel="noopener noreferrer"
                                class="absolute top-4 right-4 w-8 h-8 rounded bg-white/5 flex items-center justify-center text-slate-400 hover:text-brand-400 hover:bg-brand-500/10 transition focus:outline-none focus:ring-2 focus:ring-brand-500/30"
                                aria-label="Open <?php echo e($project->title); ?>"
                            >
                                <i data-lucide="external-link" class="w-4 h-4"></i>
                            </a>
                        </div>
                        <div class="p-6">
                            <h4 class="text-lg font-bold text-white mb-2 group-hover:text-brand-400 transition-colors"><?php echo e($project->title); ?></h4>
                            <p class="text-xs text-slate-400 mb-4 line-clamp-2"><?php echo e($project->excerpt); ?></p>
                            <div class="flex flex-wrap gap-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = (array) ($project->technologies ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="text-[10px] md:text-xs font-semibold px-2 py-0.5 rounded bg-white/5 text-slate-300 border border-white/10 uppercase tracking-wider">
                                        <?php echo e($tech); ?>

                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    
    <section class="home-section py-24 lg:py-32" id="testimonials">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 lg:mb-24 [data-reveal]">
                <h2 class="home-kicker inline-flex items-center gap-2 text-brand-400 font-semibold uppercase tracking-wider text-sm mb-4">
                    <i data-lucide="quote" class="w-4 h-4"></i>
                    <span>Testimonials</span>
                </h2>
                <h3 class="section-title text-3xl md:text-4xl font-bold text-white">What they're saying</h3>
            </div>

            <div
                x-data="testimonialSlider(<?php echo \Illuminate\Support\Js::from($testimonials)->toHtml() ?>)"
                x-init="init()"
            >
                <div class="relative max-w-4xl mx-auto">
                    <div class="overflow-hidden rounded-2xl border border-white/5 bg-ink-900/40 p-1 md:p-2">
                        <div class="flex transition-transform duration-700 ease-in-out will-change-transform"
                             :style="`transform: translateX(-${current * 100}%)`"
                         >
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="min-w-full px-2 md:px-4">
                                    <div class="glass rounded-3xl p-8 md:p-12 h-full flex flex-col">
                                        <div class="flex items-center gap-3 mb-7">
                                            <div class="w-11 h-11 rounded-full bg-brand-500/20 flex items-center justify-center text-brand-400 font-bold text-sm">
                                                <?php echo e(strtoupper(substr($testimonial->author_name ?? '?', 0, 1))); ?>

                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-white"><?php echo e($testimonial->author_name); ?></div>
                                                <div class="text-xs text-slate-400"><?php echo e($testimonial->author_role); ?> <span class="mx-1">•</span> <?php echo e($testimonial->company); ?></div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-1 text-yellow-400 mb-7">
                                            <?php $_rating = max(1, min(5, (int) ($testimonial->rating ?? 5))); ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($_i = 0; $_i < $_rating; $_i++): ?>
                                                <i data-lucide="star" class="w-4 h-4 fill-yellow-400"></i>
                                            <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                        <p class="text-lg md:text-xl text-slate-300 leading-relaxed italic">“<?php echo e($testimonial->content); ?>”</p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="flex justify-center gap-3 mt-10">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_i => $_t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button
                                @click="current = <?php echo e($_i); ?>"
                                :class="current === <?php echo e($_i); ?> ? 'w-8 bg-brand-500' : 'w-3 bg-slate-700'"
                                class="h-1.5 rounded-full transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-brand-500/50"
                                aria-label="Slide <?php echo e($_i + 1); ?>"
                            ></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <button @click="prev()" class="absolute -left-10 sm:-left-12 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-300 hover:bg-white/10 hover:text-white focus:outline-none focus:ring-2 focus:ring-brand-500/30 transition md:hidden">
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </button>
                    <button @click="next()" class="absolute -right-10 sm:-right-12 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-300 hover:bg-white/10 hover:text-white focus:outline-none focus:ring-2 focus:ring-brand-500/30 transition md:hidden">
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>
                </div>
    
    <section class="home-section py-24 lg:py-32 relative overflow-hidden">
        <div class="glass-strong rounded-3xl p-10 md:p-16 mx-auto max-w-4xl border-brand-500/20 relative z-10 [data-reveal] text-center">
            <div class="absolute inset-0 bg-gradient-to-tr from-brand-500/10 via-transparent to-violet-500/10 rounded-3xl -z-1"></div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to build something great?</h2>
            <p class="text-slate-400 mb-10 max-w-xl mx-auto text-sm md:text-base leading-relaxed">
                Get a free quote and let's discuss your next project. No obligation, just a conversation.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary px-9 py-4 text-lg font-semibold shadow-lg shadow-brand-500/30 focus:outline-none focus:ring-2 focus:ring-brand-500/50">
                    Request a Quote <i data-lucide="send" class="w-4 h-4 ml-2"></i>
                </a>
                <a href="<?php echo e(route('portfolio')); ?>" class="btn glass px-9 py-4 text-lg font-semibold text-white hover:border-brand-500/50 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    Explore Work
                </a>
            </div>
        </div>
    </section>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                x-show="ui.open && ui.kind === 'service' && ui.record === '<?php echo e($service->slug); ?>'"
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
                    x-show="ui.open && ui.kind === 'service' && ui.record === '<?php echo e($service->slug); ?>'"
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
                    x-show="ui.open && ui.kind === 'service' && ui.record === '<?php echo e($service->slug); ?>'"
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
                        <h3 class="text-xl font-bold text-white"><?php echo e($service->title); ?></h3>
                        <button @click="ui.close()" class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-brand-500/30 transition" aria-label="Close">
                            <i data-lucide="x" class="w-5 h-5"></i>
                        </button>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6"><?php echo e($service->description ?? $service->excerpt); ?></p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-between text-sm border-b border-white/5 pb-2">
                            <span class="text-slate-400">Starting price</span>
                            <span class="font-semibold text-white"><?php echo e($service->starting_price ? '$'.number_format($service->starting_price) : 'Contact us'); ?></span>
                        </div>
                        <div class="flex items-center justify-between text-sm border-b border-white/5 pb-2">
                            <span class="text-slate-400">Category</span>
                            <span class="font-semibold text-white"><?php echo e($service->category ?? '—'); ?></span>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if((array) ($service->features ?? []) && count((array) $service->features)): ?>
                        <div class="mb-6">
                            <h5 class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-3">Features</h5>
                            <ul class="space-y-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = (array) $service->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="flex items-center gap-2.5 text-sm text-slate-300">
                                        <i data-lucide="check" class="w-3.5 h-3.5 text-brand-400 shrink-0"></i>
                                        <?php echo e($feature); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-white/5">
                        <a href="<?php echo e(route('services.show', $service->slug)); ?>" class="flex-1 btn btn-primary text-center py-3 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-500/40">
                            Full details
                        </a>
                        <a href="<?php echo e(route('contact')); ?>" class="flex-1 btn glass text-center py-3 text-sm font-semibold text-slate-300 hover:text-white hover:border-brand-500/50 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                            Get quote
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                x-show="ui.open && ui.kind === 'project' && ui.record === '<?php echo e($project->slug); ?>'"
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
                    x-show="ui.open && ui.kind === 'project' && ui.record === '<?php echo e($project->slug); ?>'"
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
                    x-show="ui.open && ui.kind === 'project' && ui.record === '<?php echo e($project->slug); ?>'"
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
                        <h3 class="text-xl font-bold text-white"><?php echo e($project->title); ?></h3>
                        <button @click="ui.close()" class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-brand-500/30 transition" aria-label="Close">
                            <i data-lucide="x" class="w-5 h-5"></i>
                        </button>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->cover_photo): ?>
                        <img src="<?php echo e(asset('storage/'.$project->cover_photo)); ?>" alt="<?php echo e($project->title); ?>" class="w-full rounded-xl mb-5 object-cover h-48 md:h-56">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6"><?php echo e($project->description ?? $project->excerpt); ?></p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-between text-sm border-b border-white/5 pb-2">
                            <span class="text-slate-400">Status</span>
                            <span class="font-semibold text-brand-400"><?php echo e($project->status_label); ?></span>
                        </div>
                        <div class="flex items-center justify-between text-sm border-b border-white/5 pb-2">
                            <span class="text-slate-400">Technologies</span>
                            <span class="font-semibold text-white">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = (array) ($project->technologies ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($_tech); ?> <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$loop->last): ?>, <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-white/5">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->external_url): ?>
                            <a href="<?php echo e($project->external_url); ?>" target="_blank" rel="noopener noreferrer" class="flex-1 btn btn-primary text-center py-3 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-500/40">
                                Live demo <i data-lucide="arrow-up-right" class="w-3.5 h-3.5 ml-1.5"></i>
                            </a>
                        <?php else: ?>
                            <button class="flex-1 btn glass text-center py-3 text-sm font-semibold text-slate-500 border-slate-700/50 cursor-not-allowed opacity-60" disabled>
                                Live demo
                            </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->github_url): ?>
                            <a href="<?php echo e($project->github_url); ?>" target="_blank" rel="noopener noreferrer" class="flex-1 btn glass text-center py-3 text-sm font-semibold text-slate-300 hover:text-white hover:border-white/30 focus:outline-none focus:ring-2 focus:ring-white/20">
                                <i data-lucide="github" class="w-3.5 h-3.5 mr-1.5"></i> GitHub
                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
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
                <form method="POST" action="<?php echo e(route('contact.store')); ?>" class="space-y-4">
                    <?php echo csrf_field(); ?>
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
                    <a href="<?php echo e(route('join')); ?>" class="flex-1 btn btn-primary text-center py-2.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-brand-500/40">Join free</a>
                    <button @click="promoOpen = false; try { localStorage.setItem('mt_promo_dismissed', '1'); } catch(e) {}" class="btn glass text-center py-2.5 text-xs font-semibold text-slate-300 hover:text-white hover:border-white/30 focus:outline-none focus:ring-2 focus:ring-white/20">Maybe later</button>
                </div>
            </div>
        </div>

    </div>
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

            </div>
        </div>
    </section>

    </section>

    </section>

            </div>
        </div>

                        </a>
                        <a href="<?php echo e(route('portfolio')); ?>" class="btn glass px-7 py-3.5 text-base font-semibold text-slate-300 hover:text-white hover:border-brand-500/50 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                            View Work
                        </a>
                    </div>


<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/pages/home.blade.php ENDPATH**/ ?>