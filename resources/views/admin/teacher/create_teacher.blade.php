@extends('layouts.app')

@section('content')
<div class="container mt-4" style="overflow: hidden;padding-bottom: 20px;">
    <h5 class="my-4">Tambah Guru</h5>
    <div class="card">
        <div class="card-body" style="background-color: #4CAF50; border-radius: 8px;">
            <form action="{{ route('admin.teacher.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label text-white">Nama Guru :</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ route('admin.teacher.index') }}" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
