@extends('layouts.app')

@section('title', $partner->name . ' — Partner')

@section('content')
<div class="sm-page">
    <a href="{{ route('partners.index') }}" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:text-primary-700 mb-6 transition">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke Partner
    </a>

    @if(session('success'))
        <div class="sm-alert-success">{{ session('success') }}</div>
    @endif

    @if(session('info'))
        <div class="sm-alert-info">{{ session('info') }}</div>
    @endif

    @php
        $initials = collect(explode(' ', $partner->name))->filter()->take(2)->map(fn ($w) => strtoupper(substr($w, 0, 1)))->implode('');
    @endphp

    <div class="sm-card overflow-visible">
        <div class="h-28 rounded-t-2xl bg-gradient-to-r from-[#102a56] to-primary"></div>
        <div class="sm-card-body pt-0">
            <div class="flex flex-col sm:flex-row gap-6 mb-6 pb-6 border-b border-slate-100">
                <span class="sm-avatar-lg mx-auto -mt-9 border-4 border-white bg-primary-100 sm:mx-0">{{ $initials }}</span>
                <div class="flex-1 text-center sm:text-left">
                    <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 mb-2">
                        <h1 class="text-2xl font-bold text-slate-900">{{ $partner->name }}</h1>
                        @if($isMatch)
                            <span class="sm-badge-match">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                Skill Match
                            </span>
                        @endif
                    </div>

                    @if($partner->profile)
                        <p class="text-sm text-muted">{{ $partner->profile->school }} — {{ $partner->profile->major }}</p>
                        @if($partner->profile->bio)
                            <p class="text-sm text-slate-600 mt-3">{{ $partner->profile->bio }}</p>
                        @endif
                        <div class="flex flex-wrap justify-center sm:justify-start gap-4 mt-3 text-sm text-muted">
                            @if($partner->profile->instagram)
                                <span>Instagram: {{ $partner->profile->instagram }}</span>
                            @endif
                            @if($partner->profile->github)
                                <span>GitHub: {{ $partner->profile->github }}</span>
                            @endif
                        </div>
                    @else
                        <p class="text-sm text-muted mt-2">Profil belum dilengkapi.</p>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
                <div class="rounded-2xl bg-success-light/50 p-5">
                    <h2 class="text-sm font-semibold text-green-800 uppercase tracking-wide mb-3">Skill yang bisa diajarkan</h2>
                    @if($offeringSkills->isNotEmpty())
                        <ul class="space-y-2">
                            @foreach($offeringSkills as $userSkill)
                                <li class="flex items-center gap-2">
                                    <span class="sm-badge-success">{{ $userSkill->skill->name }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-muted">Belum ada skill offering.</p>
                    @endif
                </div>

                <div class="rounded-2xl bg-info-light/50 p-5">
                    <h2 class="text-sm font-semibold text-sky-800 uppercase tracking-wide mb-3">Skill yang ingin dipelajari</h2>
                    @if($learningSkills->isNotEmpty())
                        <ul class="space-y-2">
                            @foreach($learningSkills as $userSkill)
                                <li class="flex items-center gap-2">
                                    <span class="sm-badge-info">{{ $userSkill->skill->name }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-muted">Belum ada skill learning.</p>
                    @endif
                </div>
            </div>

            @if(Route::has('learning-requests.create'))
                <a href="{{ route('learning-requests.create', $partner) }}" class="sm-btn-primary w-full sm:w-auto">
                    Ajukan learning request <span>→</span>
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
