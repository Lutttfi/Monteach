@extends('layouts.app')

@section('content')
    <div class="container mt-4" style="overflow: hidden;padding-bottom:20px;">
        <h5 class="my-4">Tambah Pengguna</h5>
        <form action="{{ route('admin.manageUser.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label text-dark">Username :</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>

                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label text-dark">Jabatan :</label>
                <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" required>
                    <option value="" disabled selected>Pilih Jabatan</option>
                    @foreach ($roles as $r)
                        <option value="{{ $r->id }}" {{ old('jabatan') == $r->id ? 'selected' : '' }}>
                            {{ $r->name }}
                        </option>
                    @endforeach
                </select> 

                @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror                
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-dark">Password :</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>            

            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ route('admin.manageUser.index') }}" class="btn btn-danger">Kembali</a>
        </form>
    </div>
@endsection
