@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Guru Piket</h2>
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Guru</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Hari Piket</label>
            <input type="text" name="hari_piket" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        {{-- <a href="{{ route('admin.picketTeacher.index') }}" class="btn btn-secondary">Batal</a> --}}
    </form>
</div>
@endsection
