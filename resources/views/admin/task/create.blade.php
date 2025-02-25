@extends('layouts.app')

@section('content')
<div class="container mt-4" style="overflow: hidden;">
    <h5 class="my-4">Tambah Tugas</h5>
    <form action="{{ route('admin.task.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kelas" class="form-label text-dark">Kelas:</label>
            <input type="text" class="form-control" name="kelas" required>
        </div>
        
        <div class="mb-3">
            <label for="guru_id" class="form-label text-dark">Nama Guru Piket:</label>
            <select name="guru_id" id="guru_id" class="form-select" required>
                <option value="" disabled selected>Pilih Guru</option>
                @foreach ($guru as $g)
                    <option value="{{ $g->id }}">{{ $g->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{ route('admin.task.index') }}" class="btn btn-danger">Kembali</a>
    </form>
</div>
@endsection
