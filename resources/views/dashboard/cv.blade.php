<x-app-layout>
    <x-slot name="title">CV Builder</x-slot>

    <section class="bg-glow">
        <div class="mx-auto max-w-4xl px-4 py-14 sm:px-6 lg:px-8">
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center" data-reveal>
                <div>
                    <h1 class="text-3xl font-extrabold text-white">CV builder</h1>
                    <p class="mt-1 text-slate-400">Fill it once — your CV lives at a shareable link and downloads as PDF.</p>
                </div>
                <a href="{{ route('dashboard.cv.download') }}" class="rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-500/25 transition hover:from-brand-400 hover:to-violet-500">
                    ⬇ Download my CV
                </a>
            </div>

            {{-- Experience --}}
            <div class="glass mt-10 rounded-3xl p-8" data-reveal>
                <h2 class="text-xl font-bold text-white">💼 Work experience</h2>
                <div class="mt-4 space-y-3">
                    @forelse ($member->experiences as $exp)
                        <div class="flex items-start justify-between gap-4 rounded-xl border border-white/10 bg-ink-800/60 p-4">
                            <div>
                                <p class="font-semibold text-white">{{ $exp->position }} · {{ $exp->company }}</p>
                                <p class="mt-0.5 text-xs text-slate-500">
                                    {{ optional($exp->start_date)->format('M Y') ?? '?' }} –
                                    {{ $exp->is_current ? 'Present' : (optional($exp->end_date)->format('M Y') ?? '?') }}
                                </p>
                                @if ($exp->description)<p class="mt-2 text-sm text-slate-400">{{ Str::limit($exp->description, 180) }}</p>@endif
                            </div>
                            <form method="POST" action="{{ route('dashboard.cv.experience.delete', $exp) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm text-slate-500 transition hover:text-rose-400">Delete</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">No experience yet — add your first below.</p>
                    @endforelse
                </div>

                <form method="POST" action="{{ route('dashboard.cv.experience') }}" class="mt-6 grid gap-4 sm:grid-cols-2">
                    @csrf
                    <input type="text" name="company" placeholder="Company *" required maxlength="120"
                           class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none">
                    <input type="text" name="position" placeholder="Position *" required maxlength="120"
                           class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none">
                    <input type="date" name="start_date" placeholder="Start"
                           class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white focus:border-brand-400 focus:outline-none">
                    <input type="date" name="end_date"
                           class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white focus:border-brand-400 focus:outline-none">
                    <textarea name="description" rows="2" placeholder="What did you build / achieve?" maxlength="2000"
                              class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none sm:col-span-2"></textarea>
                    <label class="flex items-center gap-2 text-sm text-slate-400 sm:col-span-2">
                        <input type="checkbox" name="is_current" value="1" class="h-4 w-4 rounded border-white/20 bg-ink-800 text-brand-500">
                        I currently work here
                    </label>
                    <button class="rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-brand-500 sm:w-fit">+ Add experience</button>
                </form>
            </div>
            {{-- Education --}}
            <div class="glass mt-6 rounded-3xl p-8" data-reveal>
                <h2 class="text-xl font-bold text-white">🎓 Education</h2>
                <div class="mt-4 space-y-3">
                    @forelse ($member->educations as $edu)
                        <div class="flex items-start justify-between gap-4 rounded-xl border border-white/10 bg-ink-800/60 p-4">
                            <div>
                                <p class="font-semibold text-white">{{ $edu->degree ?? 'Study' }} @if($edu->field)· {{ $edu->field }} @endif</p>
                                <p class="mt-0.5 text-xs text-slate-500">{{ $edu->institution }} · {{ $edu->start_year ?? '?' }}–{{ $edu->end_year ?? '?' }}</p>
                                @if ($edu->description)<p class="mt-2 text-sm text-slate-400">{{ Str::limit($edu->description, 160) }}</p>@endif
                            </div>
                            <form method="POST" action="{{ route('dashboard.cv.education.delete', $edu) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm text-slate-500 transition hover:text-rose-400">Delete</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">No education entries yet.</p>
                    @endforelse
                </div>

                <form method="POST" action="{{ route('dashboard.cv.education') }}" class="mt-6 grid gap-4 sm:grid-cols-2">
                    @csrf
                    <input type="text" name="institution" placeholder="Institution *" required maxlength="160"
                           class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none">
                    <input type="text" name="degree" placeholder="Degree / diploma" maxlength="160"
                           class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none">
                    <input type="text" name="field" placeholder="Field of study" maxlength="160"
                           class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none">
                    <div class="grid grid-cols-2 gap-3">
                        <input type="number" name="start_year" placeholder="From (year)" min="1950" max="2100"
                               class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none">
                        <input type="number" name="end_year" placeholder="To (year)" min="1950" max="2100"
                               class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none">
                    </div>
                    <button class="rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-brand-500 sm:w-fit">+ Add education</button>
                </form>
            </div>
            {{-- Certifications --}}
            <div class="glass mt-6 rounded-3xl p-8" data-reveal>
                <h2 class="text-xl font-bold text-white">🏅 Certifications</h2>
                <div class="mt-4 space-y-3">
                    @forelse ($member->certifications as $cert)
                        <div class="flex items-start justify-between gap-4 rounded-xl border border-white/10 bg-ink-800/60 p-4">
                            <div>
                                <p class="font-semibold text-white">{{ $cert->name }}</p>
                                <p class="mt-0.5 text-xs text-slate-500">
                                    {{ $cert->issuer }} @if($cert->issue_date)· {{ optional($cert->issue_date)->format('M Y') }}@endif
                                </p>
                                @if ($cert->credential_url)<a href="{{ $cert->credential_url }}" target="_blank" rel="noopener" class="mt-1 inline-block text-xs font-semibold text-brand-300 hover:underline">Verify credential ↗</a>@endif
                            </div>
                            <form method="POST" action="{{ route('dashboard.cv.certification.delete', $cert) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm text-slate-500 transition hover:text-rose-400">Delete</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">No certifications yet.</p>
                    @endforelse
                </div>

                <form method="POST" action="{{ route('dashboard.cv.certification') }}" class="mt-6 grid gap-4 sm:grid-cols-2">
                    @csrf
                    <input type="text" name="name" placeholder="Certification name *" required maxlength="160"
                           class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none">
                    <input type="text" name="issuer" placeholder="Issuer" maxlength="160"
                           class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none">
                    <input type="date" name="issue_date"
                           class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white focus:border-brand-400 focus:outline-none">
                    <input type="url" name="credential_url" placeholder="Credential URL"
                           class="rounded-xl border border-white/10 bg-ink-800 px-4 py-2.5 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none">
                    <button class="rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-brand-500 sm:w-fit">+ Add certification</button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
