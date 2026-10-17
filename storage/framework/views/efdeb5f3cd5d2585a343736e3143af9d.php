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
     <?php $__env->slot('title', null, []); ?> Our Team <?php $__env->endSlot(); ?>

    <section class="bg-glow relative overflow-hidden">
        <div class="absolute inset-0 -z-10">
            <div class="absolute left-1/2 top-10 h-72 w-[800px] -translate-x-1/2 rounded-full bg-brand-600/20 blur-3xl"></div>
        </div>
        <div class="page-shell page-hero text-center" data-reveal>
            <span class="inline-flex items-center gap-2 rounded-full border border-brand-400/30 bg-brand-500/10 px-4 py-1.5 text-sm font-medium text-brand-300">
                <span class="h-1.5 w-1.5 rounded-full bg-brand-400"></span>
                The people behind the platform
            </span>
            <h1 class="mt-6 text-4xl font-extrabold text-white sm:text-5xl">
                Meet the MykaelTech team
            </h1>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-400">
                Builders, designers, mentors and strategists — a small but determined crew
                turning ideas into products and learners into professionals.
            </p>
        </div>
    </section>

    <section class="page-shell page-section">
        <div class="page-grid sm:grid-cols-2 lg:grid-cols-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card-hover glass page-card rounded-2xl text-center" data-reveal>
                    <div class="mx-auto flex h-28 w-28 items-center justify-center rounded-full ring-2 ring-brand-400/30">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->photo_path): ?>
                            <img src="<?php echo e(Storage::url($member->photo_path)); ?>" alt="<?php echo e($member->name); ?>"
                                 class="h-28 w-28 rounded-full object-cover">
                        <?php else: ?>
                            <div class="flex h-full w-full items-center justify-center rounded-full bg-gradient-to-br from-brand-500 via-violet-500 to-violet-600 text-3xl font-bold text-white shadow-lg">
                                <?php echo e(strtoupper(substr($member->name, 0, 1))); ?>

                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <h2 class="mt-5 text-xl font-bold text-white"><?php echo e($member->name); ?></h2>
                    <p class="mt-1 text-sm font-semibold text-brand-300"><?php echo e($member->role); ?></p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->bio): ?>
                        <p class="mt-3 text-sm leading-relaxed text-slate-400"><?php echo e(Str::limit($member->bio, 200)); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="mt-5 flex justify-center gap-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->linkedin_url): ?>
                            <a href="<?php echo e($member->linkedin_url); ?>" target="_blank" rel="noopener"
                               aria-label="<?php echo e($member->name); ?> on LinkedIn"
                               class="inline-flex items-center gap-1 rounded-lg bg-white/5 px-3 py-1.5 text-sm text-slate-400 transition hover:bg-white/10 hover:text-brand-300">
                                in
                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->github_url): ?>
                            <a href="<?php echo e($member->github_url); ?>" target="_blank" rel="noopener"
                               aria-label="<?php echo e($member->name); ?> on GitHub"
                               class="inline-flex items-center gap-1 rounded-lg bg-white/5 px-3 py-1.5 text-sm text-slate-400 transition hover:bg-white/10 hover:text-brand-300">
                                GH
                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->twitter_url): ?>
                            <a href="<?php echo e($member->twitter_url); ?>" target="_blank" rel="noopener"
                               aria-label="<?php echo e($member->name); ?> on X"
                               class="inline-flex items-center gap-1 rounded-lg bg-white/5 px-3 py-1.5 text-sm text-slate-400 transition hover:bg-white/10 hover:text-brand-300">
                                X
                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full page-card glass rounded-2xl text-center">
                    <div class="pro-icon mx-auto h-14 w-14" aria-hidden="true"><i data-lucide="users" class="h-7 w-7"></i></div>
                    <h3 class="mt-4 text-lg font-bold text-white">Team page coming soon</h3>
                    <p class="mt-2 text-sm text-slate-400">Our team profiles are being prepared. Check back shortly.</p>
                </div>
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
<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/pages/team.blade.php ENDPATH**/ ?>