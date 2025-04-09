@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3 class="py-3">Daftar Tugas</h3>
        <a href="{{ route('admin.task.create') }}" class="btn btn-secondary mb-3">Tambah Tugas</a>

        @if (session('success'))
            <div id="alert-success" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead style="background-color: #009D12; color: white;">
                    <tr>
                        <th style="width:10%; border-top-left-radius: 10px;">No</th>
                        <th style="width:30%;">Nama</th>
                        <th style="width:30%;">Status</th>
                        <th style="width:20%; border-top-right-radius: 10px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $index => $task)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ optional($task->guru)->username }}</td>
                            <td>{{ ucfirst($task->status) }}</td>
                            <td class="align-middle">
                                {{-- Desktop view --}}
                                <div class="d-none d-md-block">
                                    <a href="{{ route('admin.task.edit', $task->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.task.destroy', $task->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </div>

                                {{-- Mobile view --}}
                                <div class="dropdown d-block d-md-none">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                        &#x22EE;
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.task.edit', $task->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.task.destroy', $task->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"
                                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
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
                    {{ $tasks->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
