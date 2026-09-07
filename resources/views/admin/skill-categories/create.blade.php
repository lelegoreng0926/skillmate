@extends('layouts.admin')

@section('title', 'Tambah Kategori Skill')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Tambah Kategori Skill</h3>
    </div>

    <form action="{{ route('skill-categories.store') }}" method="POST">

        @csrf

        <div class="card-body">

            <div class="mb-3">
                <label>Nama Kategori</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    required>

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">
                <label>Icon Font Awesome</label>

                <input
                    type="text"
                    name="icon"
                    class="form-control"
                    placeholder="Contoh : fas fa-code">

            </div>

            <div class="mb-3">
                <label>Deskripsi</label>

                <textarea
                    name="description"
                    rows="4"
                    class="form-control"></textarea>

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-primary">

                Simpan

            </button>

            <a href="{{ route('skill-categories.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection