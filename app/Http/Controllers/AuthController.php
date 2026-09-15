<?php

namespace App\Http\Controllers;

use App\Models\CommunityMember;
use App\Models\NewsletterSubscriber;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->withErrors(['email' => 'These credentials do not match our records.'])
            ->onlyInput('email');
    }

    public function showRegister(): View
    {
        return view('auth.join');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'headline' => ['nullable', 'string', 'max:160'],
            'skills' => ['nullable', 'string', 'max:500'],
            'subscribe' => ['nullable', 'boolean'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        CommunityMember::create([
            'user_id' => $user->id,
            'username' => $this->uniqueUsername($validated['name']),
            'headline' => $validated['headline'] ?? 'New community member',
            'skills' => isset($validated['skills'])
                ? array_values(array_filter(array_map('trim', explode(',', $validated['skills']))))
                : null,
        ]);

        if (! empty($validated['subscribe'])) {
            NewsletterSubscriber::firstOrCreate(['email' => $validated['email']]);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Welcome to the MykaelTech community! Complete your profile to unlock your CV generator.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    private function uniqueUsername(string $name): string
    {
        $base = Str::slug($name) ?: 'member';
        $username = $base;
        $i = 1;

        while (CommunityMember::where('username', $username)->exists()) {
            $username = $base.'-'.(++$i);
        }

        return $username;
    }
}
