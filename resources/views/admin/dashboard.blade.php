@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="py-3 text-center">Jadwal Pelajaran</h3>

    <!-- Gambar Jadwal Pelajaran -->
    <div class="text-center mb-4">
    <a href="{{ url('storage/jadwal_pelajaran.pdf') }}" target="_blank">

            <img src="{{ asset('foto/mapelbg.png') }}" alt="Jadwal Pelajaran" class="img-fluid shadow rounded" style="width: 90%;">
        </a>
    </div>

    <h3 class="py-3 text-center">Jadwal Guru Piket</h3>
    <div class="row" style="padding-bottom: 20px">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-white text-center" style="background-color: #007BFF;">
                    <h5>Jadwal Piket - {{ $hariIni }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>Nama Guru</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jadwalHariIni as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->guru->username }}</td>
                                    <td>{{ $jadwal->kelas }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada jadwal</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-md-0 mt-4"> 
            <div class="card shadow">
                <div class="card-header text-white text-center" style="background-color: #28A745;">
                    <h5>Jadwal Piket - {{ $besok }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-success text-center">
                                <tr>
                                    <th>Nama Guru</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jadwalBesok as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->guru->username }}</td>
                                    <td>{{ $jadwal->kelas }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada jadwal</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
