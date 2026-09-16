<?php

/** 
 * MykaelTech — Build. Learn. Belong.
 *
 * A Laravel-powered technology community platform combining professional
 * services, portfolio showcase, learning updates, community events,
 * and a CV generator — all under one roof.
 *
 * @author  MykaelTech Team
 * @version 1.0.0
 * @link    https://mykaeltech.dev
 */

return [
    'name' => 'MykaelTech',
    'tagline' => 'Build. Learn. Belong.',
    'brand' => [
        'name' => 'MykaelTech', 'slug' => 'mykaeltech',
        'color' => '#0891b2', 'gradient' => 'from-brand-500 to-violet-600',
    ],
    'contact' => [
        'email' => 'hello@mykaeltech.dev', 'phone' => '+1 (555) 000-0000',
        'address' => 'San Francisco, CA',
    ],
    'social' => [
        'twitter' => 'https://twitter.com/mykaeltech',
        'github'  => 'https://github.com/mykaeltech',
        'linkedin'=> 'https://linkedin.com/company/mykaeltech',
        'youtube' => 'https://youtube.com/@mykaeltech',
    ],
    'seo' => [
        'default_image' => 'https://mykaeltech.dev/og-image.jpg',
        'twitter_handle' => '@mykaeltech',
        'analytics_id' => env('GOOGLE_ANALYTICS_ID', ''),
    ],
    'admin' => [
        'name' => 'MykaelTech Admin', 'dark_mode' => true,
        'nav' => [
            'items' => [
                'Dashboard' => ['route' => 'admin.index', 'icon' => 'heroicon-o-home', 'active' => fn() => request()->routeIs('admin.*')],
                'Services'  => ['route' => '/admin/services', 'icon' => 'heroicon-o-cube', 'active' => fn() => request()->routeIs('services*')],
                'Projects'  => ['route' => '/admin/projects', 'icon' => 'heroicon-o-folder', 'active' => fn() => request()->routeIs('projects*')],
                'Posts'     => ['route' => '/admin/posts', 'icon' => 'heroicon-o-pencil', 'active' => fn() => request()->routeIs('posts*')],
                'Events'    => ['route' => '/admin/events', 'icon' => 'heroicon-o-calendar', 'active' => fn() => request()->routeIs('events*')],
                'Settings'  => ['route' => 'admin.settings', 'icon' => 'heroicon-o-cog-6-tooth', 'active' => fn() => request()->routeIs('admin.settings*')],
            ],
        ],
    ],
    'footer' => [
        'copyright' => '© ' . now()->year . ' MykaelTech',
        'credits'   => 'Built with Laravel • Tailwind CSS',
    ],
    'dashboard' => [
        'widgets' => [
            'recent_posts' => ['title' => 'Recent Posts', 'model' => App\Models\Post::class, 'limit' => 5],
            'recent_events' => ['title' => 'Upcoming Events', 'model' => App\Models\Event::class, 'limit' => 5],
            'stats' => [
                'title' => 'Quick Stats',
                'providers' => [
                    ['label' => 'Services', 'count' => fn() => App\Models\Service::count()],
                    ['label' => 'Projects', 'count' => fn() => App\Models\Project::count()],
                    ['label' => 'Members',  'count' => fn() => \App\Models\CommunityMember::count()],
                    ['label' => 'Posts',     'count' => fn() => App\Models\Post::count()],
                ],
            ],
        ],
    ],
];