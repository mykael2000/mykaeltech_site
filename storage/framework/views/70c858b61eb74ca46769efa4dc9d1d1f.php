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
     <?php $__env->slot('title', null, []); ?> Learn — Updates, Facts & Tutorials <?php $__env->endSlot(); ?>

    <section class="bg-glow">
        <div class="page-shell page-hero text-center" data-reveal>
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl">Learn in public</h1>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-400">
                Learning updates from members, curated tech facts, tutorials and platform news — the heartbeat of the community.
            </p>
        </div>
    </section>

    <section class="page-shell page-section">
        <div class="grid gap-12 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <div class="page-filter-row" data-reveal>
                    <a href="<?php echo e(route('learn')); ?>"
                       class="rounded-full px-4 py-2 text-sm font-semibold transition <?php echo e(! $currentType ? 'bg-brand-500 text-white' : 'glass text-slate-300 hover:text-white'); ?>">
                        All
                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('learn', ['type' => $key])); ?>"
                           class="rounded-full px-4 py-2 text-sm font-semibold transition <?php echo e($currentType === $key ? 'bg-brand-500 text-white' : 'glass text-slate-300 hover:text-white'); ?>">
                            <?php echo e($label); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="page-grid mt-10 sm:grid-cols-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('learn.show', $post->slug)); ?>" class="card-hover group glass flex flex-col rounded-2xl page-card">
                            <span class="w-fit rounded-full bg-violet-500/15 px-2.5 py-1 text-xs font-semibold text-violet-300"><?php echo e($post->type_label); ?></span>
                            <h2 class="mt-4 text-lg font-bold text-white group-hover:text-brand-300"><?php echo e($post->title); ?></h2>
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

                <div class="mt-10"><?php echo e($posts->links()); ?></div>
            </div>

            <aside data-reveal>
                <h2 class="text-xl font-bold text-white"><i data-lucide="lightbulb" class="mr-2 inline-block h-5 w-5 text-brand-300"></i>Latest tech facts</h2>
                <div class="mt-6 space-y-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $facts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="glass rounded-2xl p-5">
                            <p class="text-sm leading-relaxed text-slate-300"><?php echo e($fact->fact); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fact->source_url): ?>
                                <a href="<?php echo e($fact->source_url); ?>" target="_blank" rel="noopener" class="mt-2 inline-flex items-center gap-1.5 text-xs font-semibold text-brand-300 hover:underline">Source <i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i></a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-slate-400">Facts coming soon.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </aside>
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
<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/pages/learn.blade.php ENDPATH**/ ?>