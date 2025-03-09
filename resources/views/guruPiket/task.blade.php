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
                        <a href="{{ route('guruPiket.absen', $task->id) }}" class="btn btn-success btn-sm">Absen</a>
                        @else
                        <button class="btn btn-secondary btn-sm" disabled>Sudah Dikerjakan</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection