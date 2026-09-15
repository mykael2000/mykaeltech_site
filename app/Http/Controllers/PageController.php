<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TechFact;
use App\Models\Testimonial;
use App\Models\CommunityMember;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'services' => Service::active()->take(6)->get(),
            'projects' => Project::active()->where('is_featured', true)->take(6)->get(),
            'posts' => Post::published()->latest('published_at')->take(3)->get(),
            'facts' => TechFact::published()->inRandomOrder()->take(5)->get(),
            'testimonials' => Testimonial::active()->take(6)->get(),
            'events' => Event::upcoming()->take(3)->get(),
            'membersCount' => CommunityMember::public()->count(),
        ]);
    }

    public function services(): View
    {
        return view('pages.services', [
            'services' => Service::active()->get(),
        ]);
    }

    public function serviceDetail(string $slug): View
    {
        $service = Service::active()->where('slug', $slug)->firstOrFail();

        return view('pages.service-detail', [
            'service' => $service,
            'relatedProjects' => Project::active()->inRandomOrder()->take(3)->get(),
        ]);
    }

    public function portfolio(Request $request): View
    {
        $category = $request->query('category');

        $projects = Project::active()
            ->when($category, fn ($q) => $q->where('category', $category))
            ->get();

        return view('pages.portfolio', [
            'projects' => $projects,
            'categories' => Project::active()->distinct()->pluck('category')->filter()->values(),
            'currentCategory' => $category,
        ]);
    }

    public function projectDetail(string $slug): View
    {
        $project = Project::active()->where('slug', $slug)->firstOrFail();

        return view('pages.project-detail', [
            'project' => $project,
            'related' => Project::active()->where('id', '!=', $project->id)->inRandomOrder()->take(3)->get(),
        ]);
    }

    public function learn(Request $request): View
    {
        $type = $request->query('type');

        $posts = Post::published()
            ->when($type, fn ($q) => $q->where('type', $type))
            ->paginate(9);

        return view('pages.learn', [
            'posts' => $posts,
            'facts' => TechFact::published()->latest('published_at')->take(12)->get(),
            'currentType' => $type,
            'types' => [
                'learning_update' => 'Learning Updates',
                'tech_fact' => 'Tech Facts',
                'tutorial' => 'Tutorials',
                'news' => 'News',
            ],
        ]);
    }

    public function learnDetail(string $slug): View
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();

        $post->increment('views');

        return view('pages.learn-detail', [
            'post' => $post,
            'related' => Post::published()
                ->where('id', '!=', $post->id)
                ->where('type', $post->type)
                ->take(3)->get(),
            'fact' => TechFact::published()->inRandomOrder()->first(),
        ]);
    }

    public function community(): View
    {
        return view('pages.community', [
            'events' => Event::upcoming()->take(6)->get(),
            'members' => CommunityMember::public()->with('user')->take(12)->get(),
            'membersCount' => CommunityMember::public()->count(),
            'pastEvents' => Event::published()->where('starts_at', '<', now())->latest('starts_at')->take(3)->get(),
        ]);
    }

    public function team(): View
    {
        return view('pages.team', [
            'team' => TeamMember::active()->get(),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function search(Request $request): View
    {
        $query = $request->query('q');
        $results = [];

        if ($query && strlen($query) >= 2) {
            $search = strtolower($query);

            $services = Service::active()
                ->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                })
                ->get()
                ->map(fn ($s) => ['type' => 'service', 'title' => $s->title, 'url' => route('services.show', $s->slug), 'excerpt' => $s->excerpt]);

            $projects = Project::active()
                ->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                })
                ->get()
                ->map(fn ($p) => ['type' => 'project', 'title' => $p->title, 'url' => route('portfolio.show', $p->slug), 'excerpt' => $p->excerpt ?? $p->short_description]);

            $posts = Post::published()
                ->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                })
                ->get()
                ->map(fn ($p) => ['type' => 'post', 'title' => $p->title, 'url' => route('learn.show', $p->slug), 'excerpt' => $p->excerpt]);

            $events = Event::upcoming()
                ->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                })
                ->get()
                ->map(fn ($e) => ['type' => 'event', 'title' => $e->title, 'url' => '#', 'excerpt' => $e->description]);

            $results = $services->merge($projects)->merge($posts)->merge($events);
        }

        return view('pages.search', [
            'query' => $query,
            'results' => $results,
            'count' => $results->count(),
        ]);
    }
}
