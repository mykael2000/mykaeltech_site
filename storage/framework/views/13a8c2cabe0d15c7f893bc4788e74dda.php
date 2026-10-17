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
     <?php $__env->slot('title', null, []); ?> Search <?php $__env->endSlot(); ?>

    <section class="bg-glow relative overflow-hidden">
        <div class="page-shell page-shell--narrow page-hero" data-reveal>
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl">Search</h1>
            <p class="mt-4 text-lg text-slate-400">
                Find services, projects, learning posts, tech facts, and events across MykaelTech.
            </p>

            <form method="GET" action="<?php echo e(route('search')); ?>" class="mt-10 flex gap-3">
                <div class="flex-1">
                    <div class="relative">
                        <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m2.823-2.823-3.536 3.536m-10.707 10.707C8.73 17.465 7.5 19.065 7.5 21h12c0-1.935-1.23-3.535-2.593-4.265L21 21"/>
                        </svg>
                        <input type="text" name="q" value="<?php echo e(old('q', $query)); ?>" placeholder="Search services, projects, posts..."
                               class="w-full rounded-xl border border-white/10 bg-ink-800 pl-12 pr-4 py-4 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30"
                               autofocus>
                    </div>
                </div>
                <button type="submit" class="rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-6 py-4 font-semibold text-white transition hover:from-brand-400 hover:to-violet-500 shadow-lg shadow-brand-500/25">
                    Search
                </button>
            </form>
        </div>
    </section>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($query): ?>
        <section class="page-shell page-section">
            <div class="flex items-baseline justify-between" data-reveal>
                <p class="text-lg font-semibold text-white">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($count > 0): ?>
                        <span class="text-brand-300"><?php echo e($count); ?></span> result<?php echo e($count === 1 ? '' : 's'); ?> for "<span class="underline underline-offset-2 decoration-brand-500/40"><?php echo e($query); ?></span>"
                    <?php else: ?>
                        No results for "<span class="underline underline-offset-2 decoration-brand-500/40"><?php echo e($query); ?></span>"
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($count > 0): ?>
                    <a href="<?php echo e(route('search')); ?>" class="text-sm font-semibold text-brand-300 hover:text-brand-200">Clear</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($count > 0): ?>
                <div class="mt-10 space-y-8">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['service' => 'Services', 'project' => 'Projects', 'post' => 'Learning Posts', 'event' => 'Events']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $items = $results->where('type', $type); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($items->isNotEmpty()): ?>
                            <div>
                                <h2 class="text-xl font-bold text-white" data-reveal><?php echo e($label); ?></h2>
                                <div class="page-grid mt-6 sm:grid-cols-2 lg:grid-cols-3">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e($item['url']); ?>" class="card-hover group glass page-card block rounded-2xl" data-reveal>
                                            <span class="rounded-full bg-brand-500/15 px-2.5 py-1 text-xs font-semibold text-brand-300"><?php echo e($label); ?></span>
                                            <h3 class="mt-3 text-lg font-bold text-white group-hover:text-brand-300"><?php echo e($item['title']); ?></h3>
                                            <p class="mt-2 text-sm text-slate-400 line-clamp-2"><?php echo e(Str::limit($item['excerpt'], 120)); ?></p>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php else: ?>
                <div class="mt-16 text-center" data-reveal>
                    <div class="pro-icon mx-auto mb-6 h-14 w-14" aria-hidden="true"><i data-lucide="search-x" class="h-7 w-7"></i></div>
                    <h2 class="text-2xl font-bold text-white">Nothing found for "<?php echo e($query); ?>"</h2>
                    <p class="mt-3 text-slate-400">Try different keywords, or browse the site directly.</p>
                    <div class="mt-8 flex flex-wrap justify-center gap-3">
                        <a href="<?php echo e(route('services')); ?>" class="rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white transition hover:bg-white/10">Services</a>
                        <a href="<?php echo e(route('portfolio')); ?>" class="rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white transition hover:bg-white/10">Portfolio</a>
                        <a href="<?php echo e(route('learn')); ?>" class="rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white transition hover:bg-white/10">Learn</a>
                        <a href="<?php echo e(route('community')); ?>" class="rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-white transition hover:bg-white/10">Community</a>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/pages/search.blade.php ENDPATH**/ ?>