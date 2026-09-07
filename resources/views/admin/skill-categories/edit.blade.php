@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')

<div class="card">

    <div class="card-header">

        <h3>Edit Kategori Skill</h3>

    </div>

    <form
        action="{{ route('skill-categories.update',$skillCategory->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="mb-3">

                <label>Nama</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name',$skillCategory->name) }}"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Icon</label>

                <input
                    type="text"
                    name="icon"
                    value="{{ old('icon',$skillCategory->icon) }}"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Deskripsi</label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="4">{{ old('description',$skillCategory->description) }}</textarea>

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-success">

                Update

            </button>

            <a href="{{ route('skill-categories.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection