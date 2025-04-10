@extends('layouts.siswa')

@section('content')
<div class="container mt-4">
    <h3 class="py-3">Konfirmasi Kehadiran Guru</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($absens as $key => $absen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $absen->guru->nama ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $absen->kelas }}</td>
                        <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $absen->keterangan == 'hadir' ? 'success' : 'danger' }}">
                                {{ ucfirst($absen->keterangan) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('siswa.konfirmasi', $absen->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Konfirmasi</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data absen yang perlu dikonfirmasi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
