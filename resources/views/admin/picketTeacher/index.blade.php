@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="py-3">Daftar Guru Piket</h2>

    <!-- Tombol Tambah Guru Piket -->
    <a href="{{ route('admin.picketTeacher.create') }}" class="btn btn-secondary mb-3">Tambah Guru Piket</a>

    <!-- Notifikasi Berhasil -->
    @if(session('success'))
    <div id="alert-success" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    @endif

    <!-- Tabel Guru Piket -->
    <table class="table table-bordered">
        <thead style="background-color:  #009D12; color: white;">
            <tr>
                <th style="width:1px; border-top-left-radius: 10px;">No</th>
                <th style="width: 50%;">Nama Guru</th>
                <th style="width: 30px; border-top-right-radius: 10px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($guruPiket as $piket)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $piket->guru->nama }}</td> <!-- Menampilkan Nama Guru -->
        <td class="text-center">
            <a href="{{ route('admin.picketTeacher.edit', $piket->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('admin.picketTeacher.destroy', $piket->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

    </table>
</div>
@endsection
