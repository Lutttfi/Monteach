@extends('layouts.guruPiket')

@section('content')
<div class="container mt-4">
    <h3 class="py-3">Daftar Tugas Hari Ini</h3>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead style="background-color: #009D12; color: white;">
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $index => $task)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $task->kelas }}</td>
                    <td>{{ $task->tanggal_tugas }}</td>
                    <td>{{ ucfirst($task->status) }}</td>
                    <td>
                        @if ($task->status == 'pending')
                        <a href="{{ route('guruPiket.absen', $task->id) }}"
                            class="btn btn-primary"
                            onclick="return confirm('Ingin mengabsen sekarang?')">Absen</a>
                        @elseif ($task->status == 'in_progress')
                        <button class="btn btn-warning" disabled>Dalam Proses</button>
                        @elseif ($task->status == 'completed')
                        <button class="btn btn-success" disabled>Sudah Selesai</button>
                        @elseif ($task->status == 'tidak_absen')
                        <button class="btn btn-danger" disabled>Tidak Absen</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Showing {{ $tasks->firstItem() }} to {{ $tasks->lastItem() }} of {{ $tasks->total() }}
                    results</span>
            </div>
            <div>
                {{ $tasks->links('pagination::bootstrap-4') }} <!-- Menambahkan pagination style Bootstrap -->
            </div>
        </div>
    </div>
</div>
@endsection