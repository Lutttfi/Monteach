@extends('layouts.app')

@section('content')
<div class="container mt-4" style="overflow: hidden; padding-bottom: 20px;">
    <h5 class="my-4">Tambah Guru Piket</h5>
    <div class="card">
        <div class="card-body" style="background-color: #4CAF50; border-radius: 8px;">
            <form action="{{ route('admin.picketTeacher.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label text-white">Nama Guru Piket :</label>
                    <select name="guru_id" id="guru_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Guru</option>
                        @foreach ($guru as $g)
                        <option value="{{ $g->id }}">{{ $g->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ route('admin.picketTeacher.index') }}" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
