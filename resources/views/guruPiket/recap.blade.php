@extends('layouts.guruPiket')

@section('content')
<div class="container mt-4">
    <h3 class="py-3">Rekap Kehadiran Guru</h3>

    <!-- Form Pilih Bulan -->
    <form action="{{ route('admin.recap') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="bulan" class="form-control">
                    <option value="">-- Pilih Bulan --</option>
                    @foreach ($bulanList as $b)
                        <option value="{{ $b }}" {{ request('bulan') == $b ? 'selected' : '' }}>
                            {{ $b }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="tahun" class="form-control">
                    <option value="">-- Pilih Tahun --</option>
                    @foreach ($tahunList as $t)
                        <option value="{{ $t }}" {{ request('tahun') == $t ? 'selected' : '' }}>
                            {{ $t }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Tabel Rekap -->
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead style="background-color: #009D12; color: white;">
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Jumlah Hadir</th>
                    <th>Jumlah Tidak Hadir</th>
                    <th>Tidak Diabsen oleh Guru Piket</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekaps as $rekap)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rekap->guru->nama }}</td>
                    <td>{{ $rekap->jumlah_hadir }}</td>
                    <td>{{ $rekap->jumlah_tidak_hadir }}</td>
                    <td>{{ $rekap->tidak_diabsen }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
