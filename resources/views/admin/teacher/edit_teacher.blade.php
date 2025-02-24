@extends('layouts.app')

@section('content')
<div class="container mt-4" style="overflow: hidden;">
    <h5 class="my-4">Edit Guru</h5>
    <div class="card">
        <div class="card-body" style="background-color: #4CAF50; border-radius: 8px;">
            <form action="{{ route('admin.teacher.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label text-white">Nama Guru</label>
                    <input type="text" class="form-control" name="nama" value="{{ $guru->nama }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.teacher.index') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
