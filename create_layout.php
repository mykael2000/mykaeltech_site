<?php
$html = <<<PART1
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@isset(\$title){{ \$title }} — MykaelTech @else MykaelTech — Build. Learn. Belong. @endisset</title>
    <meta name="description" content="@isset(\$metaDescription){{ \$metaDescription }} @else MykaelTech is a technology community: services, portfolio showcases, learning updates, tech facts and a CV builder for members. @endisset">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="MykaelTech">
    <meta property="og:title" content="@isset(\$title){{ \$title }} @else MykaelTech — Build. Learn. Belong. @endisset">
    <meta property="og:description" content="@isset(\$metaDescription){{ \$metaDescription }} @else Join a growing community of builders. @endisset">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,{!! rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><path d="M24 2.5 42.5 13v22L24 45.5 5.5 35V13L24 2.5Z" stroke="#22d3ee" stroke-width="3" fill="rgba(14,165,233,0.15)"/><path d="M14 32V17.5l5.5 8 4.5-8 4.5 8 5.5-8V32" stroke="#22d3ee" stroke-width="3.2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>') !!}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-ink-950 antialiased" x-data="{mobileOpen:false}">
<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:z-[100] focus:bg-brand-600 focus:px-4 focus:py-2 focus:text-white">Skip to content</a>
<header class="sticky top-0 z-50 border-b border-white/5 bg-ink-950/80 backdrop-blur-lg">
<nav class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8" aria-label="Main">
<a href="{{route('home')}}" class="flex items-center" aria-label="MykaelTech home"><x-logo/></a>
<div class="hidden items-center gap-1 md:flex">
@foreach(['services'=>'Services','portfolio'=>'Portfolio','learn'=>'Learn','community'=>'Community','team'=>'Team','contact'=>'Contact'] as \$r=>\$l)
<a href="{{route(\$r)}}" class="rounded-lg px-3 py-2 text-sm font-medium transition {{request()->routeIs(\$r.'*')?'bg-white/10 text-white':'text-slate-300 hover:bg-white/5 hover:text-white'}}">{{ \$l }}</a>
@endforeach
</div>
<div class="hidden items-center gap-3 md:flex">
@auth
<a href="{{route('dashboard')}}" class="text-sm font-medium text-slate-300 transition hover:text-white">Dashboard</a>
<form method="POST" action="{{route('logout')}}">@csrf<button type="submit" class="text-sm font-medium text-slate-400 transition hover:text-white">Log out</button></form>
<a href="{{route('dashboard.cv.download')}}" class="rounded-lg bg-gradient-to-r from-brand-500 to-brand-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-brand-500/25 transition hover:from-brand-400 hover:to-brand-500">Download CV</a>
@else
<a href="{{route('login')}}" class="text-sm font-medium text-slate-300 transition hover:text-white">Log in</a>
<a href="{{route('join')}}" class="rounded-lg bg-gradient-to-r from-brand-500 to-brand-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-brand-500/25 transition hover:from-brand-400 hover:to-brand-500">Join free</a>
@endauth
</div>
<button type="button" class="rounded-lg p-2 text-slate-300 transition md:hidden hover:bg-white/5 hover:text-white" @click="mobileOpen=!mobileOpen" aria-label="Toggle menu">
<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
<template x-if="!mobileOpen"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></template>
<template x-if="mobileOpen"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></template>
</svg>
</button>
</nav>
<div x-cloak x-show="mobileOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4" class="md:hidden border-t border-white/5 bg-ink-900/95 backdrop-blur-lg">
<div class="mx-auto max-w-7xl px-4 py-4 space-y-1">
@foreach(['services'=>'Services','portfolio'=>'Portfolio','learn'=>'Learn','community'=>'Community','team'=>'Team','contact'=>'Contact'] as \$r=>\$l)
<a href="{{route(\$r)}}" class="block rounded-lg px-3 py-2.5 text-sm font-medium transition {{request()->routeIs(\$r.'*')?'bg-white/10 text-white':'text-slate-300 hover:bg-white/5 hover:text-white'}}">{{ \$l }}</a>
@endforeach
PART1;
file_put_contents('resources/views/components/app-layout.blade.php', $html);