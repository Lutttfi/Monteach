@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Guru</h2>
    <form action="{{ route('teacher.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Guru</label>
            <input type="text" class="form-control" name="nama" value="{{ $guru->nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
