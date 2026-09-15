<?php
// Generate app-layout.blade.php component
// Step 1: Write the DOCTYPE through the opening body tag
$part1 = '<!DOCTYPE html>
<html lang="{{ str_replace(\'_', \'-\', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@isset($title){{ $title }} — MykaelTech @else MykaelTech — Build. Learn. Belong. @endisset</title>
    <meta name="description" content="@isset($metaDescription){{ $metaDescription }} @else MykaelTech is a technology community: services, portfolio showcases, learning updates, tech facts and a CV builder for members. @endisset">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="MykaelTech">
    <meta property="og:title" content="@isset($title){{ $title }} @else MykaelTech — Build. Learn. Belong. @endisset">
    <meta property="og:description" content="@isset($metaDescription){{ $metaDescription }} @else Join a growing community of builders. Showcase your portfolio, publish learning updates, and generate a polished CV. @endisset">
    <meta property="og:url" content="{{ url()->current() }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,{!! rawurlencode(\'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><path d="M24 2.5 42.5 13v22L24 45.5 5.5 35V13L24 2.5Z" stroke="#22d3ee" stroke-width="3" fill="rgba(14,165,233,0.15)"/><path d="M14 32V17.5l5.5 8 4.5-8 4.5 8 5.5-8V32" stroke="#22d3ee" stroke-width="3.2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>\') !!}">

    @vite([\'resources/css/app.css\', \'resources/js/app.js\'])
</head>
<body class="min-h-screen bg-ink-950 antialiased" x-data="{ mobileOpen: false, toast: { show: false, type: \'success\', message: \'\' }, searchOpen: false }">
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:z-[100] focus:bg-brand-600 focus:px-4 focus:py-2 focus:text-white">Skip to content</a>

    <header class="sticky top-0 z-50 border-b border-white/5 bg-ink-950/80 backdrop-blur-lg">
        <nav class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8" aria-label="Main">
            <a href="{{ route(\'home\') }}" class="flex items-center" aria-label="MykaelTech home">
                <x-logo />
            </a>
';

file_put_contents('resources/views/components/app-layout.blade.php', $part1);
echo "Part 1 written: " . strlen($part1) . " bytes\n";