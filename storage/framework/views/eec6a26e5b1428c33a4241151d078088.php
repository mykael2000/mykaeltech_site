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
     <?php $__env->slot('title', null, []); ?> 404 — Page not found <?php $__env->endSlot(); ?>

    <section class="bg-glow">
        <div class="page-shell page-hero text-center" data-reveal>
            <p class="text-8xl font-black text-transparent" style="background:linear-gradient(90deg,#22d3ee,#a78bfa);-webkit-background-clip:text;background-clip:text;">404</p>
            <h1 class="mt-4 text-3xl font-extrabold text-white sm:text-4xl">This page drifted off the grid.</h1>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-400">The link you followed doesn't exist — but plenty does.</p>

            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="<?php echo e(route('home')); ?>" class="btn btn-primary shine !px-6 !py-3">Back home <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                <a href="<?php echo e(route('community')); ?>" class="btn !border !border-white/10 !bg-white/5 !px-6 !py-3 text-white hover:!bg-white/10">Join the community</a>
            </div>
        </div>

        <div class="page-shell pb-14">
            <div class="mx-auto grid max-w-3xl gap-4 sm:grid-cols-3">
                <a href="<?php echo e(route('services')); ?>" class="glass card-hover rounded-2xl p-5 text-left">
                    <i data-lucide="layers-3" class="h-5 w-5 text-brand-400"></i>
                    <p class="mt-3 font-semibold text-white">Services</p>
                    <p class="mt-1 text-sm text-slate-400">See what we build.</p>
                </a>
                <a href="<?php echo e(route('portfolio')); ?>" class="glass card-hover rounded-2xl p-5 text-left">
                    <i data-lucide="rocket" class="h-5 w-5 text-brand-400"></i>
                    <p class="mt-3 font-semibold text-white">Portfolio</p>
                    <p class="mt-1 text-sm text-slate-400">Browse our work.</p>
                </a>
                <a href="<?php echo e(route('learn')); ?>" class="glass card-hover rounded-2xl p-5 text-left">
                    <i data-lucide="book-open" class="h-5 w-5 text-brand-400"></i>
                    <p class="mt-3 font-semibold text-white">Learn</p>
                    <p class="mt-1 text-sm text-slate-400">Read community posts.</p>
                </a>
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

<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/errors/404.blade.php ENDPATH**/ ?>