<?php

// Redirect legacy paths from the previous static-PHP site to their new routes.
use Illuminate\Support\Facades\Route;

Route::redirect('/index.php', '/', 301);
Route::redirect('/services.php', '/services', 301);
Route::redirect('/portfolio.php', '/portfolio', 301);
Route::redirect('/team.php', '/team', 301);
Route::redirect('/contact.php', '/contact', 301);
Route::redirect('/login.php', '/login', 301);
Route::redirect('/register.php', '/join', 301);
Route::redirect('/dashboard.php', '/dashboard', 301);
