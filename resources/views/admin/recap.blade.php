@extends('layouts.app')

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

    <!-- Form Export Excel -->
    <form action="{{ route('admin.recap.export') }}" method="GET">
        <div class="row mb-3">
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">Export Excel</button>
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
                    {{-- <th>Tidak Diabsen oleh Guru Piket</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($rekaps as $rekap)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rekap->guru->nama }}</td>
                    <td>{{ $rekap->jumlah_hadir }}</td>
                    <td>{{ $rekap->jumlah_tidak_hadir }}</td>
                    {{-- <td>{{ $rekap->tidak_diabsen }}</td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Showing {{ $rekaps->firstItem() }} to {{ $rekaps->lastItem() }} of {{ $rekaps->total() }} results</span>
            </div>
            <div>
                {{ $rekaps->links('pagination::bootstrap-4') }} <!-- Menambahkan pagination style Bootstrap -->
            </div>
        </div>
    </div>
</div>
@endsection
