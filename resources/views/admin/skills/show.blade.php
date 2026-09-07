@extends('layouts.admin')

@section('title', 'Detail Skill')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h1 class="m-0">Detail Skill</h1>
            <p class="text-muted">
                Informasi lengkap skill.
            </p>
        </div>

        <a href="{{ route('skills.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>

    </div>


    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-code mr-1"></i>
                {{ $skill->name }}
            </h3>
        </div>


        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <strong>Nama Skill</strong>

                    <p>
                        {{ $skill->name }}
                    </p>

                </div>


                <div class="col-md-6">

                    <strong>Kategori</strong>

                    <p>

                        @if($skill->category)

                            <span class="badge badge-primary">
                                {{ $skill->category->name }}
                            </span>

                        @else

                            <span class="badge badge-secondary">
                                Tanpa kategori
                            </span>

                        @endif

                    </p>

                </div>

            </div>


            <hr>


            <div class="row">

                <div class="col-md-6">

                    <strong>Dibuat</strong>

                    <p>
                        {{ $skill->created_at->format('d M Y H:i') }}
                    </p>

                </div>


                <div class="col-md-6">

                    <strong>Terakhir diperbarui</strong>

                    <p>
                        {{ $skill->updated_at->format('d M Y H:i') }}
                    </p>

                </div>

            </div>

        </div>


        <div class="card-footer">

            <a href="{{ route('skills.edit', $skill->id) }}"
               class="btn btn-warning">

                <i class="fas fa-edit"></i>
                Edit Skill

            </a>

            <form action="{{ route('skills.destroy', $skill->id) }}"
                  method="POST"
                  class="d-inline">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn btn-danger"
                        onclick="return confirm('Yakin ingin menghapus skill ini?')">

                    <i class="fas fa-trash"></i>
                    Hapus

                </button>

            </form>

        </div>

    </div>

</div>

@endsection