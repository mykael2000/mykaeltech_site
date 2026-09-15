@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold text-white">Overview</h1>
    <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($stats as $key => $value)
            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                <div class="text-3xl font-extrabold text-white">{{ number_format($value) }}</div>
                <div class="mt-1 text-sm capitalize text-slate-400">{{ str($key)->replace('_', ' ') }}</div>
            </div>
        @endforeach
    </div>

    <h2 class="mt-10 text-lg font-bold text-white">Latest messages</h2>
    <div class="mt-4 space-y-2">
        @forelse ($recentMessages as $msg)
            <div class="rounded-xl border border-white/10 bg-white/5 p-4 text-sm">
                <div class="flex items-center justify-between">
                    <span class="font-semibold text-white">{{ $msg->name }} — <span class="text-slate-400">{{ $msg->email }}</span></span>
                    @if (! $msg->is_read)<span class="rounded-full bg-indigo-500/20 px-2 py-0.5 text-xs text-indigo-300">new</span>@endif
                </div>
                <p class="mt-1 line-clamp-1 text-slate-400">{{ $msg->subject }} — {{ $msg->message }}</p>
            </div>
        @empty
            <p class="text-sm text-slate-500">No messages yet.</p>
        @endforelse
    </div>
@endsection
