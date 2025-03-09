@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="py-3">Form Absen - {{ $task->kelas }}</h3>

    <form action="{{ route('guruPiket.submitAbsen', $task->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="guru_pengajar_id" class="form-label">Nama Guru</label>
            <select name="guru_pengajar_id" class="form-control" required>
                <option value="">-- Pilih Guru --</option>
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="siswa_id" class="form-label">Nama Siswa</label>
            <select name="siswa_id" class="form-control" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <select name="keterangan" class="form-control" required>
                <option value="hadir">Hadir</option>
                <option value="tidak_hadir">Tidak Hadir</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Absen</button>
        <a href="{{ route('guruPiket.task') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
