@extends('layouts.app')

@section('content')
<div class="container mt-4" style="overflow: hidden;">
    <h5 class="my-4">Edit Jabatan</h5>
    <div class="card">
        <div class="card-body" style="background-color: #4CAF50; border-radius: 8px;">
            <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
                @csrf

                @method('PUT')

                <div class="mb-3">
                    <label for="jabatan" class="form-label text-white">Jabatan :</label>
                    <input type="text" class="form-control" name="jabatan" value="{{ old('jabatan', $role->name) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.role.index') }}" class="btn btn-danger">Kembali</a>

            </form>
        </div>
    </div>
</div>
@endsection
