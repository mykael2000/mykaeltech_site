<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>

    <section class="bg-glow">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center" data-reveal>
                <div>
                    <h1 class="text-3xl font-extrabold text-white">Hey, {{ auth()->user()->name }} 👋</h1>
                    <p class="mt-1 text-slate-400">Your community hub — profile, portfolio and CV in one place.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('dashboard.cv') }}" class="rounded-xl border border-white/15 bg-white/5 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-white/10">Edit CV</a>
                    <a href="{{ route('dashboard.cv.download') }}" class="rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-brand-500/25 transition hover:from-brand-400 hover:to-violet-500">Download CV (PDF)</a>
                </div>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <div class="glass rounded-2xl p-6" data-reveal>
                    <div class="text-sm font-medium text-slate-400">Public profile</div>
                    <p class="mt-2 text-2xl font-bold text-white">{{ $member && $member->is_public ? 'Live' : 'Private' }}</p>
                    @if ($member)
                        <a href="{{ route('cv.show', $member->username) }}" target="_blank" class="mt-3 inline-block text-sm font-semibold text-brand-300 hover:text-brand-200">View public page ↗</a>
                    @endif
                </div>
                <div class="glass rounded-2xl p-6" data-reveal>
                    <div class="text-sm font-medium text-slate-400">CV readiness</div>
                    <p class="mt-2 text-2xl font-bold text-white">{{ $cvReady ? 'Ready 🎉' : 'Needs experience' }}</p>
                    <p class="mt-2 text-sm text-slate-400">{{ $cvReady ? 'Your CV has at least one experience entry.' : 'Add one work experience entry to complete it.' }}</p>
                </div>
                <div class="glass rounded-2xl p-6" data-reveal>
                    <div class="text-sm font-medium text-slate-400">CV link</div>
                    @if ($member)
                        <code class="mt-2 block truncate rounded-lg bg-ink-800 px-3 py-2 text-sm text-brand-200">{{ url('/cv/'.$member->username) }}</code>
                    @else
                        <p class="mt-2 text-sm text-slate-400">Profile is being provisioned…</p>
                    @endif
                </div>
            </div>

            @if (! $cvReady)
                <div class="mt-8 rounded-2xl border border-brand-400/25 bg-brand-500/5 p-6 sm:flex sm:items-center sm:justify-between" data-reveal>
                    <div>
                        <h2 class="font-bold text-white">🚀 One step to a polished CV</h2>
                        <p class="mt-1 text-sm text-slate-400">Add your first work experience and download a shareable PDF in seconds.</p>
                    </div>
                    <a href="{{ route('dashboard.cv') }}" class="mt-4 inline-block rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-brand-500 sm:mt-0">Add experience</a>
                </div>
            @endif

            <div class="mt-8 grid gap-6 md:grid-cols-3" data-reveal>
                <a href="{{ route('dashboard.profile') }}" class="card-hover glass rounded-2xl p-6">
                    <div class="text-2xl">🪪</div>
                    <h3 class="mt-3 font-bold text-white">Update profile</h3>
                    <p class="mt-1 text-sm text-slate-400">Headline, bio, skills, socials, visibility.</p>
                </a>
                <a href="{{ route('dashboard.cv') }}" class="card-hover glass rounded-2xl p-6">
                    <div class="text-2xl">📄</div>
                    <h3 class="mt-3 font-bold text-white">CV builder</h3>
                    <p class="mt-1 text-sm text-slate-400">Experience, education, certifications.</p>
                </a>
                <a href="{{ route('learn') }}" class="card-hover glass rounded-2xl p-6">
                    <div class="text-2xl">📚</div>
                    <h3 class="mt-3 font-bold text-white">Learning hub</h3>
                    <p class="mt-1 text-sm text-slate-400">Latest updates, facts and tutorials.</p>
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
