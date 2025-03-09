@extends('layouts.app')

@section('content')
    <div class="container mt-4" style="overflow: hidden;padding-bottom: 20px;">
        <h5 class="my-4">Edit Tugas</h5>
        <form action="{{ route('admin.task.update', $task->id) }}" method="POST">
            @csrf
            
            @method('PUT')

            <div class="mb-3">
                <label for="kelas" class="form-label text-dark">Kelas :</label>
                <input type="text" class="form-control" name="kelas" value="{{ old('kelas', $task->kelas) ?? $task->kelas }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_tugas" class="form-label text-dark">Tanggal Tugas:</label>
                <input type="date" class="form-control" name="tanggal_tugas" value="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}" required>
            </div>

            <div class="mb-3">
            <label for="guru_id">Pilih Guru</label>
            <select name="guru_id" id="guru_id" class="form-control" required>
                <option value="">-- Pilih Guru --</option>
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}" {{ isset($task) && $task->guru_id == $guru->id ? 'selected' : '' }}>
                        {{ $guru->username }}
                    </option>
                @endforeach
            </select>

            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.task.index') }}" class="btn btn-danger">Kembali</a>
        </form>
    </div>
@endsection
