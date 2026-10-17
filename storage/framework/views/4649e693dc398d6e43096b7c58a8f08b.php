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
     <?php $__env->slot('title', null, []); ?> <?php echo e($service->title); ?> — Services <?php $__env->endSlot(); ?>

    <section class="bg-glow relative overflow-hidden">
        <div class="page-shell page-shell--content page-hero" data-reveal>
            <a href="<?php echo e(route('services')); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-300 hover:text-brand-200"><i data-lucide="arrow-left" class="h-4 w-4"></i>All services</a>
            <div class="mt-6 flex items-center gap-4 text-5xl">
                <span class="pro-icon" aria-hidden="true"><i data-lucide="layers-3" class="h-7 w-7"></i></span>
                <span class="hidden sm:block text-sm text-slate-400">/</span>
                <span class="hidden sm:block text-sm font-medium text-slate-300 capitalize"><?php echo e($service->category); ?></span>
            </div>
            <h1 class="mt-2 text-4xl font-extrabold text-white sm:text-5xl"><?php echo e($service->title); ?></h1>
            <p class="mt-4 text-lg text-slate-400 max-w-2xl"><?php echo e($service->excerpt); ?></p>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->starting_price): ?>
                <p class="mt-4 text-sm font-semibold text-amber-300">Starting from <span class="text-white"><?php echo e($service->starting_price); ?></span></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <section class="page-shell page-shell--content page-section space-y-16">
        <!-- Description -->
        <div>
            <h2 class="text-2xl font-bold text-white">What you get</h2>
            <div class="mt-6 prose-invert-custom glass rounded-2xl p-8" data-reveal>
                <?php echo nl2br(e($service->description)); ?>

            </div>
        </div>

        <!-- Pricing / Starting point -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->starting_price): ?>
            <div class="page-card rounded-2xl border border-brand-400/20 bg-gradient-to-br from-brand-600/10 to-violet-600/10">
                <div class="flex items-center gap-3 text-sm font-semibold uppercase tracking-wider text-brand-300">
                    <span data-lucide="circle-dollar-sign" class="h-5 w-5"></span> Starting price
                </div>
                <p class="mt-2 text-3xl font-extrabold text-white"><?php echo e($service->starting_price); ?></p>
                <p class="mt-1 text-sm text-slate-400">Estimated range — final quote depends on scope and requirements</p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- CTA -->
        <div class="page-card rounded-2xl border border-brand-400/20 bg-brand-500/5 text-center">
            <h2 class="text-2xl font-bold text-white">Ready to start this project?</h2>
            <p class="mt-2 text-slate-400">Tell us about your idea — we reply within 24 hours with a free preliminary assessment.</p>
            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-3">
                <a href="<?php echo e(route('contact')); ?>" class="rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-8 py-3.5 font-semibold text-white transition hover:from-brand-400 hover:to-violet-500">
                    Start a conversation
                </a>
                <a href="<?php echo e(route('portfolio')); ?>" class="rounded-xl border border-white/15 bg-white/5 px-8 py-3.5 font-semibold text-white transition hover:bg-white/10">
                    See our work first
                </a>
            </div>
        </div>

        <!-- Related projects -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($relatedProjects->isNotEmpty()): ?>
            <div>
                <h2 class="text-2xl font-bold text-white">Related work</h2>
                <div class="page-grid mt-8 sm:grid-cols-2 lg:grid-cols-3" data-reveal>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('portfolio.show', $project->slug)); ?>" class="card-hover glass page-card rounded-2xl hover-zoom">
                            <div class="h-36 flex items-center justify-center rounded-xl bg-gradient-to-br from-brand-500/10 to-violet-500/10 text-3xl">
                                <span class="pro-icon" aria-hidden="true"><i data-lucide="monitor" class="h-7 w-7"></i></span>
                            </div>
                            <span class="mt-3 text-xs font-semibold uppercase tracking-wider text-brand-300"><?php echo e($project->category); ?></span>
                            <h3 class="mt-1 font-bold text-white"><?php echo e($project->title); ?></h3>
                            <p class="mt-1.5 line-clamp-2 text-sm text-slate-400"><?php echo e(Str::limit($project->excerpt, 90)); ?></p>
                            <span class="mt-3 inline-flex items-center text-xs font-semibold text-slate-400 hover:text-brand-300">
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:text-brand-300">View case study <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i></span>
                            </span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/pages/service-detail.blade.php ENDPATH**/ ?>