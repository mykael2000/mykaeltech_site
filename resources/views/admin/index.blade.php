@extends('admin.layout')

@section('title', $config['label'])

@section('content')
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-white">{{ $config['icon'] }} {{ $config['label'] }}</h1>
        <a href="{{ route('admin.resource.create', $resource) }}"
           class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">+ New</a>
    </div>

    <div class="mt-6 overflow-x-auto rounded-2xl border border-white/10 bg-white/5">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-white/10 text-xs uppercase tracking-wider text-slate-500">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    @foreach ($config['list'] as $col)
                        <th class="px-4 py-3">{{ str($col)->replace('_', ' ') }}</th>
                    @endforeach
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($items as $item)
                    <tr class="hover:bg-white/5">
                        <td class="px-4 py-3 text-slate-500">{{ $item->id }}</td>
                        @foreach ($config['list'] as $col)
                            <td class="px-4 py-3">
                                @php $value = $item->{$col}; @endphp
                                @if (is_bool($value))
                                    <span class="{{ $value ? 'text-emerald-400' : 'text-slate-600' }}">{{ $value ? '✓ yes' : '✗ no' }}</span>
                                @elseif ($value instanceof \Carbon\CarbonInterface)
                                    {{ $value->format('M j, Y H:i') }}
                                @elseif (is_array($value))
                                    {{ implode(', ', array_slice($value, 0, 4)).(count($value) > 4 ? '…' : '') }}
                                @else
                                    {{ Str::limit((string) $value, 60) }}
                                @endif
                            </td>
                        @endforeach
                        <td class="px-4 py-3 text-right whitespace-nowrap">
                            <a href="{{ route('admin.resource.edit', [$resource, $item->id]) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                            <form class="inline" method="POST" action="{{ route('admin.resource.destroy', [$resource, $item->id]) }}"
                                  onsubmit="return confirm('Delete this item?')">
                                @csrf
                                @method('DELETE')
                                <button class="ml-3 text-rose-400 hover:text-rose-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="{{ count($config['list']) + 2 }}" class="px-4 py-8 text-center text-slate-500">Nothing here yet — click “+ New”.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $items->links() }}</div>
@endsection
