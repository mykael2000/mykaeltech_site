<x-app-layout>
    <x-slot name="title">Member Login</x-slot>

    <section class="bg-glow flex min-h-[70vh] items-center">
        <div class="mx-auto w-full max-w-md px-4 sm:px-6" data-reveal>
            <div class="glass rounded-3xl p-8 sm:p-10">
                <h1 class="text-2xl font-extrabold text-white">Welcome back 👋</h1>
                <p class="mt-2 text-sm text-slate-400">Log in to access your dashboard, portfolio and CV generator.</p>

                <form method="POST" action="{{ route('login.attempt') }}" class="mt-8 space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="mb-1.5 block text-sm font-medium text-slate-300">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                        @error('email')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="password" class="mb-1.5 block text-sm font-medium text-slate-300">Password</label>
                        <input type="password" id="password" name="password" required
                               class="w-full rounded-xl border border-white/10 bg-ink-800 px-4 py-3 text-white placeholder:text-slate-500 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
                        @error('password')<p class="mt-1 text-sm text-rose-400">{{ $message }}</p>@enderror
                    </div>
                    <label class="flex items-center gap-2 text-sm text-slate-400">
                        <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-white/20 bg-ink-800 text-brand-500 focus:ring-brand-500/30">
                        Remember me
                    </label>
                    <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-brand-500 to-violet-600 px-6 py-3 font-semibold text-white shadow-lg shadow-brand-500/25 transition hover:from-brand-400 hover:to-violet-500">
                        Log in
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-slate-400">
                    New here? <a href="{{ route('join') }}" class="font-semibold text-brand-300 hover:text-brand-200">Join the community →</a>
                </p>
            </div>
        </div>
    </section>
</x-app-layout>
