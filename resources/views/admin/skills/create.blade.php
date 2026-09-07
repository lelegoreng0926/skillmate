@extends('layouts.admin')

@section('title', 'Tambah Skill')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h1 class="m-0">Tambah Skill</h1>
            <p class="text-muted">
                Tambahkan skill baru ke SkillMate.
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
                <i class="fas fa-plus mr-1"></i>
                Form Tambah Skill
            </h3>
        </div>


        <form action="{{ route('skills.store') }}" method="POST">

            @csrf

            <div class="card-body">

                {{-- Nama Skill --}}
                <div class="form-group">

                    <label for="name">
                        Nama Skill
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Laravel"
                    >

                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- Kategori --}}
                <div class="form-group">

                    <label for="category_id">
                        Kategori Skill
                    </label>

                    <select
                        name="category_id"
                        id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror"
                    >

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                    @error('category_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

            </div>


            <div class="card-footer">

                <button type="submit" class="btn btn-primary">

                    <i class="fas fa-save"></i>
                    Simpan Skill

                </button>

                <a href="{{ route('skills.index') }}"
                   class="btn btn-secondary">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection