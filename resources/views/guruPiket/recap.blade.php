@extends('layouts.guruPiket')

@section('content')
<div class="container mt-4">
    <h3 class="py-3">Rekap Kehadiran Guru</h3>

    <!-- Form Pilih Bulan -->
    <form action="{{ route('guruPiket.recap') }}" method="GET" class="mb-3">
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
                <button type="submit" class="btn btn-primary w-100">Filter</button>
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
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @if ($rekaps->count() > 0)
                @foreach ($rekaps as $rekap)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rekap->guru->nama }}</td>
                    <td>{{ $rekap->jumlah_hadir }}</td>
                    <td>{{ $rekap->jumlah_tidak_hadir }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $rekap->id }}">
                            Lihat Detail
                        </button>

                        <!-- Modal Detail -->
                        <!-- Modal Detail -->
                        <div class="modal fade" id="modalDetail{{ $rekap->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $rekap->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $rekap->id }}">
                                            Detail Ketidakhadiran - {{ $rekap->guru->nama }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                            @if ($rekap->absenTidakHadir->count() > 0)
                                            <table class="table table-bordered text-center">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Tanggal</th>
                                                        <th>Mata Pelajaran</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($rekap->absenTidakHadir as $absen)
                                                    <tr>
                                                        <td>{{ ($absen->tanggal) }}</td>
                                                        <td>{{ $absen->mapel->nama_mapel ?? '-' }}</td>
                                                        <td>{{ $absen->keterangan ?? '-' }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <p class="text-center">Tidak ada data ketidakhadiran.</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data kehadiran untuk bulan & tahun yang dipilih.</td>
                </tr>
                @endif
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Showing {{ $rekaps->firstItem() }} to {{ $rekaps->lastItem() }} of {{ $rekaps->total() }} results</span>
            </div>
            <div>
                {{ $rekaps->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection