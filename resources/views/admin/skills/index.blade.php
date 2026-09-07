@extends('layouts.admin')

@section('title', 'Daftar Skill')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h1 class="m-0">Daftar Skill</h1>
            <p class="text-muted">
                Kelola skill yang tersedia di SkillMate.
            </p>
        </div>

        <a href="{{ route('skills.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Skill
        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>

    @endif


    <div class="card">

        <div class="card-header">

            <h3 class="card-title">
                <i class="fas fa-code mr-1"></i>
                Semua Skill
            </h3>

        </div>


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>
                            <th width="60">No</th>
                            <th>Nama Skill</th>
                            <th>Kategori</th>
                            <th width="220">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($skills as $skill)

                            <tr>

                                <td>
                                    {{ $skills->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $skill->name }}
                                    </strong>
                                </td>

                                <td>

                                    @if($skill->category)

                                        <span class="badge badge-primary">
                                            {{ $skill->category->name }}
                                        </span>

                                    @else

                                        <span class="badge badge-secondary">
                                            Tanpa kategori
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('skills.show', $skill->id) }}"
                                       class="btn btn-info btn-sm">

                                        <i class="fas fa-eye"></i>
                                        Detail

                                    </a>


                                    <a href="{{ route('skills.edit', $skill->id) }}"
                                       class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>
                                        Edit

                                    </a>


                                    <form action="{{ route('skills.destroy', $skill->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus skill ini?')">

                                            <i class="fas fa-trash"></i>
                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center py-4">

                                    <i class="fas fa-inbox fa-2x text-muted"></i>

                                    <br><br>

                                    Belum ada skill.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <div class="mt-3">

                {{ $skills->links() }}

            </div>

        </div>

    </div>

</div>

@endsection