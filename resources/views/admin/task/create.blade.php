@extends('layouts.app')

@section('content')
    <div class="container mt-4" style="overflow: hidden;padding-bottom: 20px;">
        <h5 class="my-4">Tambah Tugas</h5>
        <form action="{{ route('admin.task.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kelas" class="form-label text-dark">Kelas :</label>
                <input type="text" class="form-control" name="kelas" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_tugas" class="form-label text-dark">Tanggal Tugas:</label>
                <input type="date" class="form-control" name="tanggal_tugas" value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" required>
            </div>

            <div class="mb-3">
            <label for="guru_id">Pilih Guru</label>
            <select name="guru_id" id="guru_id" class="form-control" required>
    <option value="">-- Pilih Guru --</option>
    @foreach ($gurus as $guru)
        <option value="{{ $guru->id }}">{{ $guru->username }}</option>
    @endforeach
</select>

            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ route('admin.task.index') }}" class="btn btn-danger">Kembali</a>
        </form>
    </div>
@endsection
