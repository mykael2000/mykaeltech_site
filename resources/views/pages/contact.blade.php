<x-app-layout>
    <x-slot name="title">Contact</x-slot>

    <section class="bg-glow">
        <div class="mx-auto max-w-7xl px-4 py-20 text-center sm:px-6 lg:px-8" data-reveal>
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl">Let's build something together</h1>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-400">
                Have a project, a question, or want to partner with the community? We reply within 24 hours.
            </p>
        </div>
    </section>

    <section class="mx-auto max-w-3xl px-4 pb-24 sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('contact.store') }}" class="glass rounded-3xl p-8 sm:p-10" data-reveal>
            @csrf
            {{-- honeypot: hidden from humans, catnip for bots --}}
            <div class="hidden" aria-hidden="true">
                <label for="website">Website</label>
                <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="name" class="mb-1.5 block text-sm font-medium text-slate-300">Name *</label>
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

            <div class="mt-6">
                <label for="subject" class="mb-1.5 block text-sm font-medium text-slate-300">Subject</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" maxlength="190"
                       class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                @error('subject')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
            </div>

            <div class="mt-6">
                <label for="message" class="mb-1.5 block text-sm font-medium text-slate-300">Message *</label>
                <textarea id="message" name="message" rows="6" required maxlength="5000"
                          class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">{{ old('message') }}</textarea>
                @error('message')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
            </div>

            <button type="submit" class="mt-8 w-full rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-6 py-3.5 font-semibold text-white shadow-xl shadow-brand-500/25 transition hover:from-brand-400 hover:to-violet-500 sm:w-auto">
                Send message →
            </button>
        </form>
    </section>
</x-app-layout>
