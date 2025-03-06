@extends('layouts.siswa')

@section('content')
<div class="container mt-4">
    <h3 class="py-3 text-center">Jadwal Pelajaran</h3>

    <!-- Gambar Jadwal Pelajaran -->
    <div class="text-center mb-4">
    <a href="{{ url('storage/jadwal_pelajaran.pdf') }}" target="_blank">

            <img src="{{ asset('storage/images/jadwal.png') }}" alt="Jadwal Pelajaran" class="img-fluid shadow rounded" style="width: 90%;">
        </a>
    </div>
</div>
@endsection
