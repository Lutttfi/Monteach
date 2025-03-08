@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="py-3">Daftar Tugas</h3>
    <a href="{{ route('admin.task.create') }}" class="btn btn-secondary mb-3">Tambah Tugas</a>
    @if(session('success'))
    <div id="alert-success" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead style="background-color: #009D12; color: white;">
                <tr>
                    <th style="width:10px;">No</th>
                    <th style="width:90px;">Nama</th>
                    <th style="width:40px;">Status</th>
                    <th style="width:40px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $index => $task)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ optional($task->guru)->username }}</td>
                    <td>{{ ucfirst($task->status) }}</td>
                    <td class="align-middle">
                        <a href="{{ route('admin.task.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.task.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
