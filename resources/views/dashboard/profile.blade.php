<x-app-layout>
    <x-slot name="title">Profile Settings</x-slot>

    <section class="bg-glow">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-white" data-reveal>Profile settings</h1>
            <p class="mt-1 text-slate-400">Everything here shows on your public CV page.</p>

            <form method="POST" action="{{ route('dashboard.profile.update') }}" class="glass mt-8 rounded-3xl p-8" data-reveal>
                @csrf
                @method('PUT')

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="username" class="mb-1.5 block text-sm font-medium text-slate-300">Username * <span class="text-slate-500">(your CV URL)</span></label>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-slate-500">/cv/</span>
                            <input type="text" id="username" name="username" value="{{ old('username', $member->username) }}" required maxlength="60"
                                   class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                        </div>
                        @error('username')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="headline" class="mb-1.5 block text-sm font-medium text-slate-300">Headline</label>
                        <input type="text" id="headline" name="headline" value="{{ old('headline', $member->headline) }}" maxlength="160"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                </div>

                <div class="mt-5">
                    <label for="bio" class="mb-1.5 block text-sm font-medium text-slate-300">Bio</label>
                    <textarea id="bio" name="bio" rows="4" maxlength="2000"
                              class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">{{ old('bio', $member->bio) }}</textarea>
                </div>
                <div class="mt-5 grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="company" class="mb-1.5 block text-sm font-medium text-slate-300">Company</label>
                        <input type="text" id="company" name="company" value="{{ old('company', $member->company) }}" maxlength="120"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                    <div>
                        <label for="location" class="mb-1.5 block text-sm font-medium text-slate-300">Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location', $member->location) }}" maxlength="120"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                    <div>
                        <label for="phone" class="mb-1.5 block text-sm font-medium text-slate-300">Phone (shown on CV)</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $member->phone) }}" maxlength="50"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                    <div>
                        <label for="skills" class="mb-1.5 block text-sm font-medium text-slate-300">Skills <span class="text-slate-500">(comma separated)</span></label>
                        <input type="text" id="skills" name="skills" value="{{ old('skills', is_array($member->skills) ? implode(', ', $member->skills) : '') }}" maxlength="500"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                </div>

                <div class="mt-5 grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="linkedin_url" class="mb-1.5 block text-sm font-medium text-slate-300">LinkedIn URL</label>
                        <input type="url" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $member->linkedin_url) }}"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                    <div>
                        <label for="github_url" class="mb-1.5 block text-sm font-medium text-slate-300">GitHub URL</label>
                        <input type="url" id="github_url" name="github_url" value="{{ old('github_url', $member->github_url) }}"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                    <div>
                        <label for="twitter_url" class="mb-1.5 block text-sm font-medium text-slate-300">X / Twitter URL</label>
                        <input type="url" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $member->twitter_url) }}"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                    <div>
                        <label for="website_url" class="mb-1.5 block text-sm font-medium text-slate-300">Portfolio / website URL</label>
                        <input type="url" id="website_url" name="website_url" value="{{ old('website_url', $member->website_url) }}"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                </div>

                <label class="mt-6 flex items-center gap-2 text-sm text-slate-300">
                    <input type="hidden" name="is_public" value="0">
                    <input type="checkbox" name="is_public" value="1" @checked(old('is_public', $member->is_public)) class="h-4 w-4 rounded border-white/20 bg-ink-800 text-brand-500 focus:ring-brand-500/30">
                    Make my profile & CV public at /cv/{{ $member->username }}
                </label>

                <button type="submit" class="mt-8 rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-8 py-3 font-semibold text-white shadow-lg shadow-brand-500/25 transition hover:from-brand-400 hover:to-violet-500">
                    Save changes
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
