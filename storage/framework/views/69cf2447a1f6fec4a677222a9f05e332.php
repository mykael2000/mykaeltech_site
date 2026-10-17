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
     <?php $__env->slot('title', null, []); ?> Member Login <?php $__env->endSlot(); ?>

    <section class="bg-glow flex min-h-[70vh] items-center">
        <div class="mx-auto w-full max-w-md px-4 sm:px-6" data-reveal>
            <div class="glass rounded-3xl p-8 sm:p-10">
                <h1 class="text-2xl font-extrabold text-white">Welcome back 👋</h1>
                <p class="mt-2 text-sm text-slate-400">Log in to access your dashboard, portfolio and CV generator.</p>

                <form method="POST" action="<?php echo e(route('login.attempt')); ?>" class="mt-8 space-y-5">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="email" class="mb-1.5 block text-sm font-medium text-slate-300">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-rose-400"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div>
                        <label for="password" class="mb-1.5 block text-sm font-medium text-slate-300">Password</label>
                        <input type="password" id="password" name="password" required
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-rose-400"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <label class="flex items-center gap-2 text-sm text-slate-400">
                        <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-white/20 bg-ink-800 text-brand-500 focus:ring-brand-500/30">
                        Remember me
                    </label>
                    <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-6 py-3 font-semibold text-white shadow-lg shadow-brand-500/25 transition hover:from-brand-400 hover:to-violet-500">
                        Log in
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-slate-400">
                    New here? <a href="<?php echo e(route('join')); ?>" class="font-semibold text-brand-300 hover:text-brand-200">Join the community →</a>
                </p>
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
<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/auth/login.blade.php ENDPATH**/ ?>