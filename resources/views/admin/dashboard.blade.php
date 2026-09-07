@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content_header')
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
        <div><p class="mb-1 text-primary font-weight-bold" style="font-size:11px;letter-spacing:.12em;">ADMIN WORKSPACE</p><h1 class="m-0">Selamat datang kembali</h1><p class="text-muted mb-0 mt-2">Pantau perkembangan komunitas SkillMate dari satu tempat.</p></div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 bg-transparent p-0">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
@stop

@section('content')

{{-- Metric Cards --}}
<div class="row">

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box" style="background:linear-gradient(135deg,#2765df,#1f50bd);color:#fff;">
            <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>Total Pembelajar</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box" style="background:linear-gradient(135deg,#20a979,#168766);color:#fff;">
            <div class="inner">
                <h3>{{ $totalSkills }}</h3>
                <p>Skill Tersedia</p>
            </div>
            <div class="icon"><i class="fas fa-code"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box" style="background:linear-gradient(135deg,#3e9ee9,#2779c7);color:#fff;">
            <div class="inner">
                <h3>{{ $totalCategories }}</h3>
                <p>Kategori Skill</p>
            </div>
            <div class="icon"><i class="fas fa-layer-group"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box" style="background:linear-gradient(135deg,#f4a63d,#df7d18);color:#fff;">
            <div class="inner">
                <h3>{{ $totalRequests }}</h3>
                <p>Learning Request</p>
            </div>
            <div class="icon"><i class="fas fa-handshake"></i></div>
        </div>
    </div>

</div>

<div class="row">

    {{-- Recent Users --}}
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title mb-0">
                    <i class="fas fa-user-plus mr-1 text-primary"></i> Pembelajar terbaru
                </h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Bergabung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at?->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">Belum ada user.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Learning Requests --}}
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title mb-0">
                    <i class="fas fa-comments mr-1 text-primary"></i> Learning request terbaru
                </h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Pengirim</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestRequests as $request)
                                <tr>
                                    <td>{{ $request->skill->name ?? '-' }}</td>
                                    <td>{{ $request->sender->name ?? '-' }}</td>
                                    <td><span class="badge badge-secondary">{{ $request->status }}</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">Belum ada learning request.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
