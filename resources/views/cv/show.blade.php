<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $member->user?->name }} — CV</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, Helvetica, sans-serif; color: #1e293b; background: #f1f5f9; font-size: 14px; line-height: 1.55; }
        .page { max-width: 800px; margin: 0 auto; background: #ffffff; }
        @media print { body { background: #fff; } .no-print { display: none !important; } .page { box-shadow: none; } }
        .hero { background: linear-gradient(135deg, #0f172a 0%, #4338ca 100%); color: #fff; padding: 44px 48px; }
        .hero h1 { font-size: 30px; letter-spacing: -0.5px; }
        .hero .headline { color: #a5b4fc; font-weight: 600; margin-top: 4px; font-size: 15px; }
        .hero .contact { margin-top: 14px; font-size: 12.5px; color: #cbd5e1; display: flex; flex-wrap: wrap; gap: 6px 18px; }
        .hero .contact a { color: #e0e7ff; text-decoration: none; }
        .body { padding: 36px 48px 48px; }
        .section { margin-bottom: 30px; }
        .section h2 { font-size: 13px; text-transform: uppercase; letter-spacing: 2px; color: #4f46e5; border-bottom: 2px solid #e0e7ff; padding-bottom: 6px; margin-bottom: 14px; }
        .item { margin-bottom: 16px; }
        .item-head { display: flex; justify-content: space-between; gap: 12px; }
        .item-title { font-weight: 700; font-size: 15px; }
        .item-sub { color: #4f46e5; font-weight: 600; font-size: 13px; }
        .item-meta { color: #64748b; font-size: 12px; white-space: nowrap; }
        .item p { color: #475569; margin-top: 3px; font-size: 13.5px; }
        .skills { display: flex; flex-wrap: wrap; gap: 8px; }
        .skill { background: #eef2ff; color: #4338ca; border-radius: 999px; padding: 4px 12px; font-size: 12px; font-weight: 600; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 0 24px; }
        .toolbar { max-width: 800px; margin: 20px auto; display: flex; gap: 12px; justify-content: space-between; align-items: center; }
        .toolbar a, .toolbar button { display: inline-block; background: #4f46e5; color: #fff; border: 0; padding: 10px 22px; border-radius: 10px; font-weight: 600; font-size: 14px; cursor: pointer; text-decoration: none; }
        .toolbar .ghost { background: transparent; color: #4f46e5; border: 1px solid #c7d2fe; }
        .badge { background: rgba(255,255,255,.15); border-radius: 999px; padding: 3px 12px; font-size: 11px; font-weight: 600; }
    </style>
</head>
<body>
    <div class="page">
        <div class="hero">
            <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                <div>
                    <h1>{{ $member->user?->name }}</h1>
                    <div class="headline">{{ $member->headline }}</div>
                </div>
                <span class="badge">MykaelTech Community CV</span>
            </div>
            <div class="contact">
                @if ($member->user?->email)<span>✉ {{ $member->user->email }}</span>@endif
                @if ($member->phone)<span>☎ {{ $member->phone }}</span>@endif
                @if ($member->location)<span>📍 {{ $member->location }}</span>@endif
                @if ($member->company)<span>🏢 {{ $member->company }}</span>@endif
            </div>
        </div>

        <div class="body">
            @if ($member->bio)
                <div class="section">
                    <h2>Profile</h2>
                    <p>{{ $member->bio }}</p>
                </div>
            @endif

            @if ($member->experiences->isNotEmpty())
                <div class="section">
                    <h2>Experience</h2>
                    @foreach ($member->experiences as $exp)
                        <div class="item">
                            <div class="item-head">
                                <div>
                                    <div class="item-title">{{ $exp->position }}</div>
                                    <div class="item-sub">{{ $exp->company }}@if($exp->is_current) — Present @endif</div>
                                </div>
                                <div class="item-meta">
                                    @if ($exp->start_date){{ optional($exp->start_date)->format('M Y') }}@endif
                                    @if ($exp->start_date && ($exp->end_date || $exp->is_current)) — @endif
                                    @if ($exp->is_current)Present@elseif($exp->end_date){{ optional($exp->end_date)->format('M Y') }}@endif
                                </div>
                            </div>
                            @if ($exp->description)<p>{{ $exp->description }}</p>@endif
                        </div>
                    @endforeach
                </div>
            @endif
            @if ($member->educations->isNotEmpty())
                <div class="section">
                    <h2>Education</h2>
                    @foreach ($member->educations as $edu)
                        <div class="item">
                            <div class="item-head">
                                <div>
                                    <div class="item-title">{{ $edu->degree }}@if($edu->field) — {{ $edu->field }}@endif</div>
                                    <div class="item-sub">{{ $edu->institution }}</div>
                                </div>
                                <div class="item-meta">
                                    @if ($edu->start_year){{ $edu->start_year }}@endif@if($edu->start_year && $edu->end_year) — @endif@if($edu->end_year){{ $edu->end_year }}@endif
                                </div>
                            </div>
                            @if ($edu->description)<p>{{ $edu->description }}</p>@endif
                        </div>
                    @endforeach
                </div>
            @endif

            @if ($member->certifications->isNotEmpty())
                <div class="section">
                    <h2>Certifications</h2>
                    @foreach ($member->certifications as $cert)
                        <div class="item">
                            <div class="item-head">
                                <div>
                                    <div class="item-title">{{ $cert->name }}</div>
                                    @if ($cert->issuer)<div class="item-sub">{{ $cert->issuer }}</div>@endif
                                </div>
                                <div class="item-meta">@if($cert->issue_date){{ optional($cert->issue_date)->format('M Y') }}@endif</div>
                            </div>
                            @if ($cert->credential_url)<p><a href="{{ $cert->credential_url }}" style="color:#4f46e5;">Verify credential ↗</a></p>@endif
                        </div>
                    @endforeach
                </div>
            @endif

            @if ($member->skills)
                <div class="section">
                    <h2>Skills</h2>
                    <div class="skills">
                        @foreach ($member->skills as $skill)
                            <span class="skill">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($member->linkedin_url || $member->github_url || $member->twitter_url || $member->website_url)
                <div class="section">
                    <h2>Links</h2>
                    <p>
                        @if ($member->linkedin_url)<a href="{{ $member->linkedin_url }}" style="color:#4f46e5;">LinkedIn</a> &nbsp;@endif
                        @if ($member->github_url)<a href="{{ $member->github_url }}" style="color:#4f46e5;">GitHub</a> &nbsp;@endif
                        @if ($member->twitter_url)<a href="{{ $member->twitter_url }}" style="color:#4f46e5;">X / Twitter</a> &nbsp;@endif
                        @if ($member->website_url)<a href="{{ $member->website_url }}" style="color:#4f46e5;">Website</a>@endif
                    </p>
                </div>
            @endif

        </div>
    </div>

    <div class="toolbar no-print">
        <a class="ghost" href="{{ url('/') }}">← mykaeltech</a>
        <div style="display:flex; gap:10px;">
            @auth
                @if (auth()->user()->communityMember?->username === $member->username)
                    <a href="{{ route('dashboard.cv') }}">Edit my CV</a>
                @endif
            @endauth
            <button onclick="window.print()">⬇ Download / Print PDF</button>
        </div>
    </div>
</body>
</html>
