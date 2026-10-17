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
     <?php $__env->slot('title', null, []); ?> <?php echo e($post->title); ?> <?php $__env->endSlot(); ?>

    <article class="page-shell page-shell--content page-section">
        <a href="<?php echo e(route('learn')); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-300 hover:text-brand-200"><i data-lucide="arrow-left" class="h-4 w-4"></i>All posts</a>

        <span class="mt-6 inline-block rounded-full bg-violet-500/15 px-3 py-1 text-xs font-semibold text-violet-300"><?php echo e($post->type_label); ?></span>
        <h1 class="mt-4 text-4xl font-extrabold leading-tight text-white"><?php echo e($post->title); ?></h1>

        <div class="mt-4 flex flex-wrap items-center gap-3 text-sm text-slate-500">
            <span class="font-medium text-slate-300"><?php echo e($post->user?->name ?? 'MykaelTech'); ?></span>
            <time datetime="<?php echo e(optional($post->published_at)->toDateString()); ?>"><?php echo e(optional($post->published_at)?->format('M j, Y')); ?></time>
            <span><?php echo e($post->reading_time); ?> min read</span>
            <span><?php echo e($post->views); ?> views</span>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->excerpt): ?>
            <p class="mt-6 rounded-xl border border-white/10 bg-ink-800/60 p-5 text-slate-300"><?php echo e($post->excerpt); ?></p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="prose-invert-custom mt-8" data-reveal>
            <?php echo nl2br(e($post->content)); ?>

        </div>

        <div class="page-card rounded-2xl border border-brand-400/20 bg-brand-500/5 text-center">
            <h2 class="text-xl font-bold text-white">Learning something? So are 500+ others.</h2>
            <p class="mt-2 text-sm text-slate-400">Join the community and publish your own learning updates.</p>
                    <a href="<?php echo e(route('join')); ?>" class="mt-5 inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-6 py-3 font-semibold text-white transition hover:from-brand-400 hover:to-violet-500">Join Community <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fact) && $fact): ?>
            <div class="mt-8 glass rounded-2xl p-6">
                <div class="text-xs font-semibold uppercase tracking-wider text-brand-300"><i data-lucide="lightbulb" class="mr-2 inline-block h-4 w-4"></i>Random tech fact</div>
                <p class="mt-2 text-sm text-slate-300"><?php echo e($fact->fact); ?></p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->isNotEmpty()): ?>
            <h2 class="mt-16 text-2xl font-bold text-white">Keep reading</h2>
            <div class="mt-6 space-y-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('learn.show', $item->slug)); ?>" class="card-hover glass page-card block rounded-2xl">
                        <h3 class="font-bold text-white"><?php echo e($item->title); ?></h3>
                        <p class="mt-1 line-clamp-1 text-sm text-slate-400"><?php echo e(Str::limit($item->excerpt, 110)); ?></p>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </article>
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
<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/pages/learn-detail.blade.php ENDPATH**/ ?>