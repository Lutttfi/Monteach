@extends('layouts.app')

@section('content')
    <div class="container mt-4" style="overflow: hidden;">
        <h5 class="my-4">Tambah Pengguna</h5>
        <form action="{{ route('admin.manageUser.update', $user->id ?? '') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="username" class="form-label text-dark">Username :</label>
                <input type="text" class="form-control" name="username" value="{{ old('username', $user->username ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label text-dark">Jabatan :</label>
                <select name="jabatan" class="form-control" required>
                    <option value="" disabled selected>Pilih Jabatan</option>
                    @foreach ($roles as $r)
                        <option value="{{ $r->id }}"
                            {{ old('jabatan', $user->role_id ?? '') == $r->id ? 'selected' : '' }}>
                            {{ $r->name }}
                        </option>
                    @endforeach
                </select>                
            </div>

            {{-- <div class="mb-3">
                <label for="password" class="form-label text-dark">Password :</label>
                <input type="password" class="form-control" name="password" value="{{ old('password', $user->password ?? '') }}" required>
            </div>             --}}

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.manageUser.index') }}" class="btn btn-danger">Kembali</a>
        </form>
    </div>
@endsection
