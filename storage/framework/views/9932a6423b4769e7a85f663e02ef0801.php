<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['wordmark' => true, 'class' => 'h-9 w-auto']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['wordmark' => true, 'class' => 'h-9 w-auto']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<span <?php echo e($attributes->merge(['class' => 'inline-flex items-center gap-2.5 select-none'])); ?>>
    
    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="<?php echo e($wordmark ? 'h-10 w-10' : 'h-full w-auto'); ?>" aria-hidden="true">
        <defs>
            <linearGradient id="mt-grad" x1="4" y1="4" x2="44" y2="44" gradientUnits="userSpaceOnUse">
                <stop stop-color="#22D3EE"/>
                <stop offset="0.55" stop-color="#0EA5E9"/>
                <stop offset="1" stop-color="#8B5CF6"/>
            </linearGradient>
        </defs>
        <path d="M24 2.5 42.5 13v22L24 45.5 5.5 35V13L24 2.5Z" stroke="url(#mt-grad)" stroke-width="3" fill="rgba(14,165,233,0.08)"/>
        <path d="M14 32V17.5l5.5 8 4.5-8 4.5 8 5.5-8V32" stroke="url(#mt-grad)" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
        <circle cx="24" cy="8.6" r="2" fill="#22D3EE"/>
        <circle cx="39.5" cy="17.6" r="1.7" fill="#8B5CF6"/>
        <circle cx="8.5" cy="17.6" r="1.7" fill="#0EA5E9"/>
    </svg>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wordmark): ?>
        <span class="text-xl font-bold tracking-tight text-white">
            Mykael<span class="bg-gradient-to-r from-cyan-400 to-violet-400 bg-clip-text text-transparent">Tech</span>
        </span>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</span>
<?php /**PATH C:\xampp\htdocs\mykaeltech_site\resources\views/components/logo.blade.php ENDPATH**/ ?>