<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'subject' => ['nullable', 'string', 'max:190'],
            'message' => ['required', 'string', 'max:5000'],
            // simple honeypot: bots fill hidden fields
            'website' => ['prohibited', 'size:0'],
        ], [
            'website.prohibited' => 'Spam detected.',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Thank you! Your message has been received. We usually reply within 24 hours.');
    }
}
