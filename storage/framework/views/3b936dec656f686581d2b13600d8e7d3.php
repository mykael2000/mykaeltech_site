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
     <?php $__env->slot('title', null, []); ?> <?php echo e($project->title); ?> — Portfolio <?php $__env->endSlot(); ?>

    <section class="bg-glow relative overflow-hidden">
        <div class="page-shell page-shell--content page-hero" data-reveal>
            <a href="<?php echo e(route('portfolio')); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-300 hover:text-brand-200"><i data-lucide="arrow-left" class="h-4 w-4"></i>Back to portfolio</a>
            <div class="mt-8 flex items-start justify-between gap-6">
                <div>
                    <span class="mt-2 inline-block rounded-full bg-brand-500/15 px-3 py-1 text-xs font-semibold text-brand-300"><?php echo e($project->category); ?></span>
                    <h1 class="mt-3 text-4xl font-extrabold text-white sm:text-5xl"><?php echo e($project->title); ?></h1>
                    <p class="mt-4 text-lg text-slate-400 max-w-2xl"><?php echo e($project->short_description); ?></p>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->cover_photo): ?>
                    <div class="h-40 w-44 shrink-0 rounded-2xl bg-gradient-to-br from-brand-500/20 to-violet-500/20 overflow-hidden">
                        <img src="<?php echo e(Storage::url($project->cover_photo)); ?>" alt="<?php echo e($project->title); ?>" class="h-full w-full object-cover" loading="lazy">
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="mt-6 flex flex-wrap items-center gap-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->external_url): ?>
                    <a href="<?php echo e($project->external_url); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 rounded-xl bg-gradient-to-r from-brand-500 to-brand-600 px-6 py-3 text-sm font-semibold text-white transition hover:from-brand-400 hover:to-brand-500">
                        <i data-lucide="globe-2" class="h-4 w-4"></i> View live site
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->github_url): ?>
                    <a href="<?php echo e($project->github_url); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 rounded-xl border border-white/15 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        <i data-lucide="github" class="h-4 w-4"></i> Source code
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <section class="page-shell page-shell--content page-section space-y-16">
        <div>
            <h2 class="text-2xl font-bold text-white">The story behind this project</h2>
            <div class="mt-6 prose-invert-custom glass rounded-2xl p-8" data-reveal>
                <?php echo nl2br(e($project->description)); ?>

            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($project->technologies)): ?>
            <div data-reveal>
                <h2 class="text-2xl font-bold text-white">Technologies used</h2>
                <div class="mt-6 flex flex-wrap gap-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $project->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="rounded-xl border border-white/10 bg-ink-800/80 px-4 py-2.5 text-sm font-medium text-slate-300 transition hover:border-white/20 hover:bg-white/5">
                            <?php echo e($tech); ?>

                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="page-grid sm:grid-cols-3" data-reveal>
            <div class="page-card rounded-2xl border border-white/5 bg-ink-800/60 text-center">
                <div class="text-2xl font-extrabold text-white"><?php echo e($project->status_label ?? 'Live'); ?></div>
                <div class="mt-1 text-xs font-medium uppercase tracking-wider text-slate-400">Status</div>
            </div>
            <div class="page-card rounded-2xl border border-white/5 bg-ink-800/60 text-center">
                <div class="text-2xl font-extrabold text-white"><?php echo e($project->duration ?? '—'); ?></div>
                <div class="mt-1 text-xs font-medium uppercase tracking-wider text-slate-400">Duration</div>
            </div>
            <div class="page-card rounded-2xl border border-white/5 bg-ink-800/60 text-center">
                <div class="text-2xl font-extrabold text-white"><?php echo e($project->challenges ?? 'Complex'); ?></div>
                <div class="mt-1 text-xs font-medium uppercase tracking-wider text-slate-400">Challenge level</div>
            </div>
        </div>

        <div class="page-card rounded-2xl border border-brand-400/20 bg-brand-500/5 text-center">
            <h2 class="text-2xl font-bold text-white">Like what you see?</h2>
            <p class="mt-2 text-slate-400">We'd love to build something just as impressive for you.</p>
            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-3">
                <a href="<?php echo e(route('contact')); ?>" class="rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-8 py-3.5 font-semibold text-white transition hover:from-brand-400 hover:to-violet-500">
                    Discuss your project
                </a>
                <a href="<?php echo e(route('services')); ?>" class="rounded-xl border border-white/15 bg-white/5 px-8 py-3.5 font-semibold text-white transition hover:bg-white/10">
                    Explore services
                </a>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->isNotEmpty()): ?>
            <div>
                <h2 class="text-2xl font-bold text-white">More projects</h2>
                <div class="page-grid mt-8 sm:grid-cols-2 lg:grid-cols-3" data-reveal>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('portfolio.show', $item->slug)); ?>" class="card-hover glass page-card rounded-2xl hover-zoom">
                            <div class="h-36 flex items-center justify-center rounded-xl bg-gradient-to-br from-brand-500/10 to-violet-500/10 text-3xl">
                                <span class="pro-icon" aria-hidden="true"><i data-lucide="monitor" class="h-7 w-7"></i></span>
                            </div>
                            <span class="mt-3 text-xs font-semibold uppercase tracking-wider text-brand-300"><?php echo e($item->category); ?></span>
                            <h3 class="mt-1 font-bold text-white"><?php echo e($item->title); ?></h3>
                            <p class="mt-1.5 line-clamp-2 text-sm text-slate-400"><?php echo e(Str::limit($item->excerpt, 90)); ?></p>
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
<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/pages/project-detail.blade.php ENDPATH**/ ?>