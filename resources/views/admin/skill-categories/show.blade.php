@extends('layouts.admin')

@section('title', 'Detail Kategori')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Detail Kategori Skill</h3>
    </div>

    <div class="card-body">

        <h4>{{ $skillCategory->name }}</h4>

        <p>

            <i class="{{ $skillCategory->icon }}"></i>

            {{ $skillCategory->icon }}

        </p>

        <p>

            {{ $skillCategory->description }}

        </p>

    </div>

    <div class="card-footer">

        <a href="{{ route('skill-categories.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>

@endsection