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
     <?php $__env->slot('title', null, []); ?> Join the Community <?php $__env->endSlot(); ?>

    <section class="bg-glow flex min-h-[70vh] items-center py-16">
        <div class="mx-auto w-full max-w-xl px-4 sm:px-6" data-reveal>
            <div class="glass rounded-3xl p-8 sm:p-10">
                <h1 class="text-2xl font-extrabold text-white">Join MykaelTech — free 🚀</h1>
                <p class="mt-2 text-sm text-slate-400">
                    Get a member profile, a shareable portfolio page, learning updates and your own
                    <span class="font-semibold text-brand-300">auto-generated CV</span>.
                </p>

                <form method="POST" action="<?php echo e(route('join.store')); ?>" class="mt-8 space-y-5">
                    <?php echo csrf_field(); ?>
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name" class="mb-1.5 block text-sm font-medium text-slate-300">Full name *</label>
                            <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required maxlength="120"
                                   class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-rose-400"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div>
                            <label for="email" class="mb-1.5 block text-sm font-medium text-slate-300">Email *</label>
                            <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required maxlength="190"
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
                    </div>
                    <div>
                        <label for="password" class="mb-1.5 block text-sm font-medium text-slate-300">Password * <span class="text-slate-500">(min 8 characters)</span></label>
                        <input type="password" id="password" name="password" required minlength="8"
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
                    <div>
                        <label for="password_confirmation" class="mb-1.5 block text-sm font-medium text-slate-300">Confirm password *</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                    <div>
                        <label for="headline" class="mb-1.5 block text-sm font-medium text-slate-300">Headline</label>
                        <input type="text" id="headline" name="headline" value="<?php echo e(old('headline', 'New community member')); ?>" maxlength="160"
                               placeholder="e.g. Aspiring full-stack developer"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                    <div>
                        <label for="skills" class="mb-1.5 block text-sm font-medium text-slate-300">Skills <span class="text-slate-500">(comma separated)</span></label>
                        <input type="text" id="skills" name="skills" value="<?php echo e(old('skills')); ?>" maxlength="500"
                               placeholder="e.g. PHP, JavaScript, Figma"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                    <label class="flex items-start gap-2 text-sm text-slate-400">
                        <input type="checkbox" name="subscribe" value="1" checked class="mt-0.5 h-4 w-4 rounded border-white/20 bg-ink-800 text-brand-500 focus:ring-brand-500/30">
                        Send me learning updates and community events.
                    </label>
                    <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-6 py-3 font-semibold text-white shadow-lg shadow-brand-500/25 transition hover:from-brand-400 hover:to-violet-500">
                        Create my account →
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-slate-400">
                    Already a member? <a href="<?php echo e(route('login')); ?>" class="font-semibold text-brand-300 hover:text-brand-200">Log in →</a>
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
<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/auth/join.blade.php ENDPATH**/ ?>