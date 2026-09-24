<x-app-layout>
    <x-slot name="title">Learn — Updates, Facts & Tutorials</x-slot>

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
                    <a href="{{ route('learn') }}"
                       class="rounded-full px-4 py-2 text-sm font-semibold transition {{ ! $currentType ? 'bg-brand-500 text-white' : 'glass text-slate-300 hover:text-white' }}">
                        All
                    </a>
                    @foreach ($types as $key => $label)
                        <a href="{{ route('learn', ['type' => $key]) }}"
                           class="rounded-full px-4 py-2 text-sm font-semibold transition {{ $currentType === $key ? 'bg-brand-500 text-white' : 'glass text-slate-300 hover:text-white' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>

                <div class="page-grid mt-10 sm:grid-cols-2">
                    @forelse ($posts as $post)
                        <a href="{{ route('learn.show', $post->slug) }}" class="card-hover group glass flex flex-col rounded-2xl page-card">
                            <span class="w-fit rounded-full bg-violet-500/15 px-2.5 py-1 text-xs font-semibold text-violet-300">{{ $post->type_label }}</span>
                            <h2 class="mt-4 text-lg font-bold text-white group-hover:text-brand-300">{{ $post->title }}</h2>
                            <p class="mt-2 flex-1 text-sm leading-relaxed text-slate-400">{{ Str::limit($post->excerpt, 130) }}</p>
                            <div class="mt-4 flex items-center gap-3 text-xs text-slate-500">
                                <span>{{ $post->user?->name ?? 'MykaelTech' }}</span> ·
                                <time datetime="{{ optional($post->published_at)->toDateString() }}">{{ optional($post->published_at)->format('M j, Y') }}</time> ·
                                <span>{{ $post->views }} views</span>
                            </div>
                        </a>
                    @empty
                        <p class="text-slate-400">No posts yet.</p>
                    @endforelse
                </div>

                <div class="mt-10">{{ $posts->links() }}</div>
            </div>

            <aside data-reveal>
                <h2 class="text-xl font-bold text-white"><i data-lucide="lightbulb" class="mr-2 inline-block h-5 w-5 text-brand-300"></i>Latest tech facts</h2>
                <div class="mt-6 space-y-4">
                    @forelse ($facts as $fact)
                        <div class="glass rounded-2xl p-5">
                            <p class="text-sm leading-relaxed text-slate-300">{{ $fact->fact }}</p>
                            @if ($fact->source_url)
                                <a href="{{ $fact->source_url }}" target="_blank" rel="noopener" class="mt-2 inline-flex items-center gap-1.5 text-xs font-semibold text-brand-300 hover:underline">Source <i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i></a>
                            @endif
                        </div>
                    @empty
                        <p class="text-slate-400">Facts coming soon.</p>
                    @endforelse
                </div>
            </aside>
        </div>
    </section>
</x-app-layout>
