@extends('layouts.app')

@section('title', 'Learning Request — Skillmate')

@section('content')
<div class="sm-page">
    <section class="sm-workspace-hero mb-7"><div class="relative z-10"><p class="sm-eyebrow">KONEKSI BELAJAR</p><h1 class="mt-2 text-3xl font-extrabold tracking-tight">Learning request</h1><p class="mt-2 max-w-xl text-sm leading-6 text-blue-100/80">Pantau ajakan belajar yang kamu kirim maupun terima dari komunitas.</p></div></section>

    @if(session('success'))
        <div class="sm-alert-success">{{ session('success') }}</div>
    @endif

    @if(session('info'))
        <div class="sm-alert-info">{{ session('info') }}</div>
    @endif

    <div class="sm-card"><div class="sm-card-header flex items-center justify-between"><div><h2 class="sm-card-title">Aktivitas terbaru</h2><p class="mt-1 text-sm text-muted">Semua percakapan dan koneksi belajarmu.</p></div><span class="sm-badge-primary">{{ $requests->count() }} request</span></div>
        <div class="sm-card-body p-0">
            @forelse($requests as $request)
                <div class="sm-list-item px-5 py-5 sm:px-6 transition hover:bg-primary-50/40">
                    <div class="min-w-0">
                        <div class="flex flex-wrap items-center gap-2 mb-1">
                            <span class="font-semibold text-slate-900">{{ $request->skill->name ?? '-' }}</span>
                            <span class="sm-badge-primary">{{ $request->status }}</span>
                            @if($request->sender_id === auth()->id())
                                <span class="sm-badge-neutral">Dikirim</span>
                            @else
                                <span class="sm-badge-info">Diterima</span>
                            @endif
                        </div>
                        <p class="text-sm text-muted">
                            @if($request->sender_id === auth()->id())
                                Kepada: {{ $request->receiver->name ?? '-' }}
                            @else
                                Dari: {{ $request->sender->name ?? '-' }}
                            @endif
                        </p>
                        @if($request->message)
                            <p class="text-sm text-slate-600 mt-1 line-clamp-2">{{ $request->message }}</p>
                        @endif
                    </div>
                    <div class="text-xs text-muted shrink-0">
                        <span class="block font-semibold text-slate-600">{{ $request->created_at?->format('d M Y') }}</span>
                    </div>
                </div>
            @empty
                <div class="sm-empty">
                    <p class="sm-empty-title">Belum ada learning request</p>
                    <p class="sm-empty-text">Temukan partner skill dan ajukan permintaan belajar.</p>
                    <a href="{{ route('partners.index') }}" class="sm-btn-primary mt-4">Temukan Partner</a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
