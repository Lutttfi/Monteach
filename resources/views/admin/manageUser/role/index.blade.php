@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="py-3">Jabatan</h3>
    <a href="{{ route('admin.role.create') }}" class="btn btn-secondary mb-3">Tambah Jabatan</a>
    @if(session('success'))
    <div id="alert-success" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered text-center" style="border-radius: 10px; overflow: hidden;">
            <thead style="background-color: #009D12; color: white;">
                <tr>
                    <th style="width:10%; border-top-left-radius: 10px;">No</th>
                    <th class="width:60%; text-center">Jabatan</th>
                    <th class="width:10%; text-center" style="border-top-right-radius: 10px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->name }}</td>
                    <td class="align-middle">
                        <a href="{{ route('admin.role.edit', $role->id) }} " class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.role.destroy', $role->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }} results</span>
            </div>
            <div>
                {{ $roles->links('pagination::bootstrap-4') }} <!-- Menambahkan pagination style Bootstrap -->
            </div>
        </div>
    </div>
</div>
@endsection
