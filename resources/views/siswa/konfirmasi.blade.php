@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="py-3">Konfirmasi Kehadiran Guru</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
    <table class="table">
    <thead>
        <tr>
            <th>Nama Guru</th>
            <th>Kelas</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absens as $absen)
            <tr>
                <td>{{ $absen->guru->nama }}</td>
                <td>{{ $absen->kelas }}</td>
                <td>{{ $absen->tanggal }}</td>
                <td>
                    <form action="{{ route('siswa.konfirmasi', $absen->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>
</div>
@endsection
