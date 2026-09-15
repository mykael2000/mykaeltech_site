<x-app-layout>
    <x-slot name="title">Join the Community</x-slot>

    <section class="bg-glow flex min-h-[70vh] items-center py-16">
        <div class="mx-auto w-full max-w-xl px-4 sm:px-6" data-reveal>
            <div class="glass rounded-3xl p-8 sm:p-10">
                <h1 class="text-2xl font-extrabold text-white">Join MykaelTech — free 🚀</h1>
                <p class="mt-2 text-sm text-slate-400">
                    Get a member profile, a shareable portfolio page, learning updates and your own
                    <span class="font-semibold text-brand-300">auto-generated CV</span>.
                </p>

                <form method="POST" action="{{ route('join.store') }}" class="mt-8 space-y-5">
                    @csrf
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name" class="mb-1.5 block text-sm font-medium text-slate-300">Full name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="120"
                                   class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                            @error('name')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="email" class="mb-1.5 block text-sm font-medium text-slate-300">Email *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required maxlength="190"
                                   class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                            @error('email')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div>
                        <label for="password" class="mb-1.5 block text-sm font-medium text-slate-300">Password * <span class="text-slate-500">(min 8 characters)</span></label>
                        <input type="password" id="password" name="password" required minlength="8"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                        @error('password')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="mb-1.5 block text-sm font-medium text-slate-300">Confirm password *</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                    <div>
                        <label for="headline" class="mb-1.5 block text-sm font-medium text-slate-300">Headline</label>
                        <input type="text" id="headline" name="headline" value="{{ old('headline', 'New community member') }}" maxlength="160"
                               placeholder="e.g. Aspiring full-stack developer"
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                    </div>
                    <div>
                        <label for="skills" class="mb-1.5 block text-sm font-medium text-slate-300">Skills <span class="text-slate-500">(comma separated)</span></label>
                        <input type="text" id="skills" name="skills" value="{{ old('skills') }}" maxlength="500"
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
                    Already a member? <a href="{{ route('login') }}" class="font-semibold text-brand-300 hover:text-brand-200">Log in →</a>
                </p>
            </div>
        </div>
    </section>
</x-app-layout>
