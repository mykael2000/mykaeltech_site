<x-app-layout>
    <x-slot name="title">{{ $post->title }}</x-slot>

    <article class="page-shell page-shell--content page-section">
        <a href="{{ route('learn') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-300 hover:text-brand-200"><i data-lucide="arrow-left" class="h-4 w-4"></i>All posts</a>

        <span class="mt-6 inline-block rounded-full bg-violet-500/15 px-3 py-1 text-xs font-semibold text-violet-300">{{ $post->type_label }}</span>
        <h1 class="mt-4 text-4xl font-extrabold leading-tight text-white">{{ $post->title }}</h1>

        <div class="mt-4 flex flex-wrap items-center gap-3 text-sm text-slate-500">
            <span class="font-medium text-slate-300">{{ $post->user?->name ?? 'MykaelTech' }}</span>
            <time datetime="{{ optional($post->published_at)->toDateString() }}">{{ optional($post->published_at)?->format('M j, Y') }}</time>
            <span>{{ $post->reading_time }} min read</span>
            <span>{{ $post->views }} views</span>
        </div>

        @if ($post->excerpt)
            <p class="mt-6 rounded-xl border border-white/10 bg-ink-800/60 p-5 text-slate-300">{{ $post->excerpt }}</p>
        @endif

        <div class="prose-invert-custom mt-8" data-reveal>
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="page-card rounded-2xl border border-brand-400/20 bg-brand-500/5 text-center">
            <h2 class="text-xl font-bold text-white">Learning something? So are 500+ others.</h2>
            <p class="mt-2 text-sm text-slate-400">Join the community and publish your own learning updates.</p>
                    <a href="{{ route('join') }}" class="mt-5 inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-6 py-3 font-semibold text-white transition hover:from-brand-400 hover:to-violet-500">Join Community <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
        </div>

        @if (isset($fact) && $fact)
            <div class="mt-8 glass rounded-2xl p-6">
                <div class="text-xs font-semibold uppercase tracking-wider text-brand-300"><i data-lucide="lightbulb" class="mr-2 inline-block h-4 w-4"></i>Random tech fact</div>
                <p class="mt-2 text-sm text-slate-300">{{ $fact->fact }}</p>
            </div>
        @endif

        @if ($related->isNotEmpty())
            <h2 class="mt-16 text-2xl font-bold text-white">Keep reading</h2>
            <div class="mt-6 space-y-4">
                @foreach ($related as $item)
                    <a href="{{ route('learn.show', $item->slug) }}" class="card-hover glass page-card block rounded-2xl">
                        <h3 class="font-bold text-white">{{ $item->title }}</h3>
                        <p class="mt-1 line-clamp-1 text-sm text-slate-400">{{ Str::limit($item->excerpt, 110) }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </article>
</x-app-layout>
