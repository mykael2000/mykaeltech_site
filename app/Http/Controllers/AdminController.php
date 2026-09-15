<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'members' => \App\Models\CommunityMember::count(),
                'messages' => \App\Models\ContactMessage::where('is_read', false)->count(),
                'posts' => \App\Models\Post::count(),
                'projects' => \App\Models\Project::count(),
                'subscribers' => \App\Models\NewsletterSubscriber::where('is_active', true)->count(),
                'events' => \App\Models\Event::upcoming()->count(),
            ],
            'recentMessages' => \App\Models\ContactMessage::latest()->take(5)->get(),
        ]);
    }

    public function index(string $resource): View
    {
        $config = $this->config($resource);
        $model = $config['model'];
        $query = $model::query();

        if (isset($config['order'])) {
            $query->orderBy($config['order']);
        }

        $items = $query->latest()->paginate(25);

        return view('admin.index', [
            'config' => $config, 'resource' => $resource, 'items' => $items,
        ]);
    }

    public function create(string $resource): View
    {
        $config = $this->config($resource);

        return view('admin.form', [
            'config' => $config, 'resource' => $resource,
            'item' => new ($config['model']),
        ]);
    }

    public function store(Request $request, string $resource): RedirectResponse
    {
        $config = $this->config($resource);
        $data = $this->validated($request, $config);

        if (str_contains($config['model'], 'Models\\User') && empty($data['password'])) {
            $data['password'] = Hash::make(Str::random(16));
        }

        $config['model']::create($data);

        return redirect()->route('admin.resource.index', $resource)->with('success', 'Created.');
    }

    public function edit(string $resource, int $id): View
    {
        $config = $this->config($resource);
        $item = $config['model']::findOrFail($id);

        return view('admin.form', [
            'config' => $config, 'resource' => $resource, 'item' => $item,
        ]);
    }

    public function update(Request $request, string $resource, int $id): RedirectResponse
    {
        $config = $this->config($resource);
        $item = $config['model']::findOrFail($id);
        $data = $this->validated($request, $config);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $item->update($data);

        return back()->with('success', 'Saved.');
    }

    public function destroy(string $resource, int $id): RedirectResponse
    {
        $config = $this->config($resource);
        $config['model']::findOrFail($id)->delete();

        return back()->with('success', 'Deleted.');
    }

    private function config(string $resource): array
    {
        return config('admin.resources.'.$resource)
            ?? abort(404, "Unknown resource: {$resource}");
    }

    private function validated(Request $request, array $config): array
    {
        $rules = [];
        foreach ($config['fields'] as $name => $field) {
            $rule = $field['rules'] ?? 'nullable';
            if ($field['type'] === 'password') {
                $rule = ($rule === 'nullable|min:8') ? 'nullable|min:8' : $rule;
            }
            if ($field['type'] === 'bool') {
                $rules[$name] = 'nullable|boolean';
            } elseif ($field['type'] === 'tags') {
                $rules[$name] = 'nullable'; // comma string from the form
            } else {
                $rules[$name] = $rule;
            }
        }

        $data = $request->validate($rules);

        foreach ($config['fields'] as $name => $field) {
            if ($field['type'] === 'bool') {
                $data[$name] = $request->boolean($name);
            } elseif ($field['type'] === 'tags') {
                $raw = $data[$name] ?? null;
                if (is_string($raw)) {
                    $data[$name] = array_values(array_filter(array_map('trim', explode(',', $raw))));
                } else {
                    $data[$name] = ! empty($raw)
                        ? array_values(array_filter(array_map('trim', (array) $raw)))
                        : null;
                }
            } elseif ($field['type'] === 'number' && ($data[$name] ?? '') === '') {
                $data[$name] = null;
            } elseif (($field['type'] === 'datetime' || $field['type'] === 'date') && empty($data[$name])) {
                $data[$name] = null;
            }
        }

        // auto-slug for models that need one
        if (array_key_exists('slug', $config['fields']) && empty($data['slug']) && ! empty($data['title'])) {
            $data['slug'] = Str::slug($data['title']).'-'.Str::lower(Str::random(4));
        }

        // drop blank password (means "keep current" on edit)
        if (array_key_exists('password', $data) && blank($data['password'])) {
            unset($data['password']);
        }

        return $data;
    }
}
