@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Guru Piket</h2>
    <form action="" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Guru</label>
            <input type="text" name="nama" class="form-control" value="{{ $guruPiket->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Hari Piket</label>
            <input type="text" name="hari_piket" class="form-control" value="{{ $guruPiket->hari_piket }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
