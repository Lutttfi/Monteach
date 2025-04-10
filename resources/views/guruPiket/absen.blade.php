@extends('layouts.guruPiket')

@section('content')
<div class="container mt-4">
    <h3 class="py-3">Form Absen - {{ $task->kelas }}</h3>

    <form action="{{ route('guruPiket.submitAbsen', $task->id) }}" method="POST">
        @csrf

        <!-- Pilih Guru -->
        <div class="mb-3">
            <label for="guru_pengajar_id" class="form-label">Nama Guru</label>
            <select name="guru_pengajar_id" class="form-control" required>
                <option value="">-- Pilih Guru --</option>
                @foreach ($gurus as $guru)
                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Pilih Mapel -->
        <div class="mb-3">
            <label for="mapel_id" class="form-label">Mata Pelajaran</label>
            <select name="mapel_id" class="form-control" required>
                <option value="">-- Pilih Mata Pelajaran --</option>
                @foreach ($mapels as $mapel)
                <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                @endforeach
            </select>
        </div>

        <!-- Pilih Siswa -->
        <div class="mb-3">
            <label for="siswa_id" class="form-label">Nama Siswa</label>
            <select name="siswa_id" class="form-control" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach ($siswas as $siswa)
                <option value="{{ $siswa->id }}">{{ $siswa->username }}</option>
                @endforeach
            </select>
        </div>

        <!-- Pilih Status Hadir/Tidak Hadir -->
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <select name="keterangan" id="keterangan" class="form-control" required>
                <option value="hadir">Hadir</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
                <option value="tanpa_keterangan">Tidak Ada Keterangan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Absen</button>
    </form>
</div>
@endsection