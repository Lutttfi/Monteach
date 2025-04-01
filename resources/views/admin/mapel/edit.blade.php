@extends('layouts.app')

@section('content')
<div class="container mt-4" style="overflow: hidden; padding-bottom: 20px;">
    <h5 class="my-4">Edit Mata Pelajaran</h5>
    <div class="card">
        <div class="card-body p-4" style="background-color: #4CAF50; border-radius: 8px;">
            <form action="{{ route('admin.mapel.update', $mapel->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_mapel" class="form-label text-white">Nama Mata Pelajaran:</label>
                    <input type="text" class="form-control w-100" name="nama_mapel" value="{{ $mapel->nama_mapel }}" required>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.mapel.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
