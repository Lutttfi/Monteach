@extends('layouts.app')

@section('content')
<div class="container mt-4" style="overflow: hidden;">
    <h5 class="my-4">Tambah Jabatan</h5>
    <div class="card">
        <div class="card-body" style="background-color: #4CAF50; border-radius: 8px;">
            <form action="{{ route('admin.role.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="jabatan" class="form-label text-white">Jabatan :</label>
                    <input type="text" class="form-control" name="jabatan" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ route('admin.role.index') }}" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
