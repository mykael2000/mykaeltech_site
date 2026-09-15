<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\CommunityMember;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $member = Auth::user()->communityMember()->with(['experiences', 'educations', 'certifications'])->first();

        return view('dashboard.index', [
            'member' => $member,
            'cvReady' => $member && $member->experiences->isNotEmpty(),
        ]);
    }

    public function editProfile(): View
    {
        return view('dashboard.profile', [
            'member' => Auth::user()->communityMember,
        ]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $member = Auth::user()->communityMember;

        $validated = $request->validate([
            'username' => ['required', 'alpha_dash', 'max:60', 'unique:community_members,username,'.$member->id],
            'headline' => ['nullable', 'string', 'max:160'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'company' => ['nullable', 'string', 'max:120'],
            'location' => ['nullable', 'string', 'max:120'],
            'phone' => ['nullable', 'string', 'max:50'],
            'skills' => ['nullable', 'string', 'max:500'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'is_public' => ['nullable', 'boolean'],
        ]);

        $validated['skills'] = ! empty($validated['skills'])
            ? array_values(array_filter(array_map('trim', explode(',', $validated['skills']))))
            : null;
        $validated['is_public'] = $request->boolean('is_public');

        $member->update($validated);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function editCv(): View
    {
        $member = Auth::user()->communityMember()->with(['experiences', 'educations', 'certifications'])->firstOrFail();

        return view('dashboard.cv', ['member' => $member]);
    }

    public function storeExperience(Request $request): RedirectResponse
    {
        $member = Auth::user()->communityMember;

        $validated = $request->validate([
            'company' => ['required', 'string', 'max:120'],
            'position' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:2000'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'is_current' => ['nullable', 'boolean'],
        ]);

        $validated['is_current'] = $request->boolean('is_current');
        if ($validated['is_current']) {
            $validated['end_date'] = null;
        }

        $member->experiences()->create($validated);

        return back()->with('success', 'Experience added.');
    }

    public function storeEducation(Request $request): RedirectResponse
    {
        $member = Auth::user()->communityMember;

        $validated = $request->validate([
            'institution' => ['required', 'string', 'max:160'],
            'degree' => ['nullable', 'string', 'max:160'],
            'field' => ['nullable', 'string', 'max:160'],
            'start_year' => ['nullable', 'digits:4', 'integer', 'min:1950', 'max:2100'],
            'end_year' => ['nullable', 'digits:4', 'integer', 'min:1950', 'max:2100'],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        $member->educations()->create($validated);

        return back()->with('success', 'Education added.');
    }

    public function storeCertification(Request $request): RedirectResponse
    {
        $member = Auth::user()->communityMember;

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'issuer' => ['nullable', 'string', 'max:160'],
            'issue_date' => ['nullable', 'date'],
            'credential_url' => ['nullable', 'url', 'max:255'],
        ]);

        $member->certifications()->create($validated);

        return back()->with('success', 'Certification added.');
    }

    public function destroyExperience(Experience $experience): RedirectResponse
    {
        $this->authorizeOwned($experience->community_member_id);

        $experience->delete();

        return back()->with('success', 'Experience removed.');
    }

    public function destroyEducation(Education $education): RedirectResponse
    {
        $this->authorizeOwned($education->community_member_id);

        $education->delete();

        return back()->with('success', 'Education removed.');
    }

    public function destroyCertification(Certification $certification): RedirectResponse
    {
        $this->authorizeOwned($certification->community_member_id);

        $certification->delete();

        return back()->with('success', 'Certification removed.');
    }

    private function authorizeOwned(?int $memberId): void
    {
        abort_unless($memberId && $memberId === Auth::user()->communityMember?->id, 403);
    }
}
