@extends('layouts.app')

@section('title', 'Ajukan Learning Request — Skillmate')

@section('content')
<div class="sm-page">
    <a href="{{ route('partners.show', $partner) }}" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:text-primary-700 mb-6 transition">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke Profil Partner
    </a>

    <div class="sm-page-header">
        <h1 class="sm-page-title">Ajukan Learning Request</h1>
        <p class="sm-page-subtitle">Kirim permintaan belajar ke <strong>{{ $partner->name }}</strong>.</p>
    </div>

    @if($errors->any())
        <div class="sm-alert-danger">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="sm-card max-w-2xl">
        <div class="sm-card-header">
            <div class="flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center rounded-2xl bg-primary-50 text-lg text-primary">✦</span>
                <div><h2 class="sm-card-title">Rancang sesi belajarmu</h2><p class="mt-0.5 text-sm text-muted">Detail yang jelas membuat partner lebih mudah merespons.</p></div>
            </div>
        </div>
        <div class="sm-card-body">
            <form action="{{ route('learning-requests.store', $partner) }}" method="POST" class="space-y-5">
                @csrf

                <div class="sm-form-section">
                    <label for="skill_id" class="sm-label">Skill yang ingin dipelajari</label>
                    <select name="skill_id" id="skill_id" class="sm-select" required>
                        <option value="">-- Pilih Skill --</option>
                        @foreach($availableSkills as $userSkill)
                            <option value="{{ $userSkill->skill_id }}" @selected(old('skill_id') == $userSkill->skill_id)>
                                {{ $userSkill->skill->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="sm-form-note">Pilih skill yang ingin kamu pelajari dari {{ $partner->name }}.</p>
                </div>

                <div class="sm-form-section">
                    <label for="message" class="sm-label">Pesan</label>
                    <textarea name="message" id="message" rows="4" class="sm-textarea" required placeholder="Jelaskan tujuan belajar dan jadwal yang kamu usulkan...">{{ old('message') }}</textarea>
                </div>

                <div class="sm-form-section">
                    <div class="mb-4"><p class="sm-label mb-1">Waktu & tempat</p><p class="text-xs text-muted">Opsional, tapi membantu partner menilai kecocokan jadwal.</p></div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="meeting_date" class="sm-label">Tanggal pertemuan (opsional)</label>
                        <input type="date" name="meeting_date" id="meeting_date" class="sm-input" value="{{ old('meeting_date') }}">
                    </div>
                    <div>
                        <label for="meeting_time" class="sm-label">Waktu pertemuan (opsional)</label>
                        <input type="time" name="meeting_time" id="meeting_time" class="sm-input" value="{{ old('meeting_time') }}">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="meeting_link" class="sm-label">Link pertemuan (opsional)</label>
                    <input type="url" name="meeting_link" id="meeting_link" class="sm-input" value="{{ old('meeting_link') }}" placeholder="https://meet.google.com/...">
                </div>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="sm-btn-primary">
                        Kirim Learning Request
                    </button>
                    <a href="{{ route('partners.show', $partner) }}" class="sm-btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
