<?php

namespace App\Http\Controllers;

use App\Models\CommunityMember;
use App\Models\CvDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CvController extends Controller
{
    public function show(string $username)
    {
        $member = CommunityMember::public()
            ->where('username', $username)
            ->with(['user', 'experiences', 'educations', 'certifications'])
            ->firstOrFail();

        return view('cv.show', ['member' => $member, 'printable' => false]);
    }

    public function download(Request $request, ?string $username = null): Response
    {
        // Owner downloads their own CV; optional username lets owners download any public CV too.
        if ($username && $request->user()?->communityMember?->username === $username) {
            $member = $request->user()->communityMember;
        } elseif ($username) {
            $member = CommunityMember::public()
                ->where('username', $username)
                ->with(['user', 'experiences', 'educations', 'certifications'])
                ->firstOrFail();
        } else {
            $member = Auth::user()->communityMember ?? abort(404);
        }

        CvDownload::create([
            'user_id' => $member->user_id,
            'file_path' => null,
            'generated_at' => now(),
        ]);

        $member->forceFill(['cv_last_generated_at' => now()])->save();

        $view = view('cv.show', ['member' => $member->load(['user', 'experiences', 'educations', 'certifications']), 'printable' => true])->render();

        if (class_exists(\Barryvdh\DomPDF\Facade\Pdf::class)) {
            return \Barryvdh\DomPDF\Facade\Pdf::loadHTML($view)
                ->setPaper('a4')
                ->download('CV-'.ucfirst($member->username).'.pdf');
        }

        // Fallback: printable page the browser saves as PDF
        return response($view)->header('Content-Type', 'text/html');
    }
}
