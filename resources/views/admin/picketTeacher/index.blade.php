@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Guru Piket</h2>

    <!-- Tombol Tambah Guru Piket -->
    <a href="{{ route('admin.picketTeacher.create') }}" class="btn btn-primary mb-3">Tambah Guru Piket</a>

    <!-- Notifikasi Berhasil -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Guru Piket -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($guruPiket as $index => $guru)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $guru->nama }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('admin.picketTeacher.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.picketTeacher.destroy', $guru->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
