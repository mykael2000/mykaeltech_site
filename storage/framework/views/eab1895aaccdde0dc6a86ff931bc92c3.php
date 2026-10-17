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
     <?php $__env->slot('title', null, []); ?> Portfolio <?php $__env->endSlot(); ?>

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
            <a href="<?php echo e(route('portfolio')); ?>"
               class="rounded-full px-4 py-2 text-sm font-semibold transition <?php echo e(! $currentCategory ? 'bg-brand-500 text-white' : 'glass text-slate-300 hover:text-white'); ?>">
                All
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('portfolio', ['category' => $category])); ?>"
                   class="rounded-full px-4 py-2 text-sm font-semibold transition <?php echo e($currentCategory === $category ? 'bg-brand-500 text-white' : 'glass text-slate-300 hover:text-white'); ?>">
                    <?php echo e($category); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="page-grid mt-12 md:grid-cols-2 lg:grid-cols-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="card-hover group glass overflow-hidden rounded-2xl" data-reveal>
                    <a href="<?php echo e(route('portfolio.show', $project->slug)); ?>" class="block">
                        <div class="pro-icon h-44 w-full rounded-2xl bg-gradient-to-br from-brand-600/30 via-ink-800 to-violet-600/30" aria-hidden="true">
                            <i data-lucide="<?php echo e($project->category === 'Mobile' ? 'smartphone' : ($project->category === 'Web' ? 'monitor' : 'bar-chart-3')); ?>" class="h-10 w-10"></i>
                        </div>
                        <div class="page-card">
                            <span class="rounded-full bg-brand-500/15 px-3 py-1 text-xs font-semibold text-brand-300"><?php echo e($project->category); ?></span>
                            <h2 class="mt-3 text-lg font-bold text-white group-hover:text-brand-300"><?php echo e($project->title); ?></h2>
                            <p class="mt-2 line-clamp-2 text-sm text-slate-400"><?php echo e(Str::limit($project->excerpt, 120)); ?></p>
                            <div class="mt-4 flex flex-wrap gap-1.5">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = array_slice($project->technologies ?? [], 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="rounded-md bg-white/5 px-2 py-1 text-xs text-slate-300"><?php echo e($tech); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </a>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-slate-400">No projects in this category yet.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/pages/portfolio.blade.php ENDPATH**/ ?>