@extends('layouts.admin')

@section('title', 'Kategori Skill')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h3 class="mb-0">Kategori Skill</h3>

        <a href="{{ route('skill-categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>

    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-hover">

            <thead class="table-light">

                <tr>
                    <th width="60">No</th>
                    <th width="80">Icon</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th width="220">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td class="text-center">
                            @if($category->icon)
                                <i class="{{ $category->icon }} fa-lg"></i>
                            @else
                                -
                            @endif
                        </td>

                        <td>{{ $category->name }}</td>

                        <td>{{ $category->description }}</td>

                        <td>

                            <a href="{{ route('skill-categories.show', $category->id) }}"
                               class="btn btn-info btn-sm">
                                Detail
                            </a>

                            <a href="{{ route('skill-categories.edit', $category->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('skill-categories.destroy', $category->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            Belum ada data kategori.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">
            {{ $categories->links() }}
        </div>

    </div>

</div>

@endsection