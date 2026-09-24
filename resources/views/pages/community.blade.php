<x-app-layout>
    <x-slot name="title">Community</x-slot>

    <section class="bg-glow">
        <div class="page-shell page-hero text-center" data-reveal>
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl">The MykaelTech Community</h1>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-400">
                <span class="font-semibold text-brand-300" data-counter="{{ $membersCount }}">{{ $membersCount }}</span> members and growing.
                Learn together, build together, grow together.
            </p>
            <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
                @auth
                    <a href="{{ route('dashboard.profile') }}" class="rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-8 py-3.5 font-semibold text-white transition hover:from-brand-400 hover:to-violet-500">Complete your profile</a>
                @else
                    <a href="{{ route('join') }}" class="rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-8 py-3.5 font-semibold text-white shadow-xl shadow-brand-500/30 transition hover:from-brand-400 hover:to-violet-500">Join Community — free</a>
                    <a href="{{ route('login') }}" class="rounded-xl border border-white/15 bg-white/5 px-8 py-3.5 font-semibold text-white transition hover:bg-white/10">Member login</a>
                @endauth
            </div>
        </div>
    </section>

    <section class="page-shell page-section">
        {{-- Events --}}
        <h2 class="text-3xl font-bold text-white" data-reveal>Upcoming events</h2>
        <div class="page-grid mt-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($events as $event)
                <div class="card-hover glass page-card rounded-2xl" data-reveal>
                    <div class="flex items-center gap-2 text-sm text-brand-300">
                        <i data-lucide="calendar-days" class="h-4 w-4"></i>{{ optional($event->starts_at)->format('D, M j Y · g:i A') }}
                        @if ($event->location)
                            <span class="text-slate-600">·</span> <i data-lucide="map-pin" class="h-4 w-4"></i>{{ $event->location }}
                        @endif
                    </div>
                    <h3 class="mt-3 text-lg font-bold text-white">{{ $event->title }}</h3>
                    <p class="mt-2 line-clamp-3 text-sm text-slate-400">{{ Str::limit($event->description, 140) }}</p>
                    @if ($event->registration_url)
                        <a href="{{ $event->registration_url }}" target="_blank" rel="noopener" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-500">Register <i data-lucide="arrow-up-right" class="h-4 w-4"></i></a>
                    @endif
                </div>
            @empty
                <p class="text-slate-400">No events scheduled — subscribe to the newsletter to hear first.</p>
            @endforelse
        </div>

        {{-- Members directory --}}
        <h2 class="mt-20 text-3xl font-bold text-white" data-reveal>Meet the members</h2>
        <div class="page-grid mt-8 sm:grid-cols-2 lg:grid-cols-4">
            @forelse ($members as $member)
                <div class="card-hover glass page-card rounded-2xl text-center" data-reveal>
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br from-brand-500 to-violet-600 text-xl font-bold text-white">
                        {{ strtoupper(substr($member->user?->name ?? 'M', 0, 1)) }}
                    </div>
                    <h3 class="mt-4 font-bold text-white">{{ $member->user?->name }}</h3>
                    <p class="mt-1 text-xs text-slate-400">{{ $member->headline }}</p>
                    @if ($member->skills)
                        <div class="mt-3 flex flex-wrap justify-center gap-1">
                            @foreach (array_slice($member->skills, 0, 3) as $skill)
                                <span class="rounded-md bg-white/5 px-2 py-0.5 text-xs text-slate-300">{{ $skill }}</span>
                            @endforeach
                        </div>
                    @endif
                    @if ($member->cv_last_generated_at)
                        <a href="{{ route('cv.show', $member->username) }}" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-300 hover:text-brand-200">View CV <i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i></a>
                    @endif
                </div>
            @empty
                <p class="text-slate-400">Be the first member — join now!</p>
            @endforelse
        </div>

        {{-- Past events --}}
        @if ($pastEvents->isNotEmpty())
            <h2 class="mt-20 text-2xl font-bold text-white" data-reveal>Recently hosted</h2>
            <div class="page-grid mt-6 md:grid-cols-3">
                @foreach ($pastEvents as $event)
                    <div class="glass rounded-2xl p-5 opacity-80">
                        <div class="text-xs text-slate-500">{{ optional($event->starts_at)->format('M j, Y') }}</div>
                        <h3 class="mt-1 font-bold text-white">{{ $event->title }}</h3>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</x-app-layout>
