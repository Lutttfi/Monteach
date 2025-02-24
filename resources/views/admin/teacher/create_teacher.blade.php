@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Guru</h2>
    <form action="{{ route('admin.teacher.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Guru</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.teacher.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
