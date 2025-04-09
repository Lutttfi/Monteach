@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3 class="py-3">Pengguna</h3>
        <a href="{{ route('admin.manageUser.create') }}" class="btn btn-secondary mb-3">Tambah Pengguna</a>
        @if (session('success'))
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
                        <th class="text-center" style="width:30%;">Username</th>
                        <th class="text-center " style="width:30%;">Jabatan</th>
                        <th class="text-center" style="width:20%; border-top-right-radius: 10px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td class="align-middle">
                                <!-- Tombol biasa untuk layar besar -->
                                <div class="d-none d-sm-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.manageUser.edit', $user->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.manageUser.destroy', $user->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </div>

                                <!-- Dropdown titik tiga untuk layar kecil -->
                                <div class="dropdown d-sm-none">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        ⋮
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.manageUser.edit', $user->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.manageUser.destroy', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">Hapus</button>
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
                    <span>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }}
                        results</span>
                </div>
                <div>
                    {{ $users->links('pagination::bootstrap-4') }} <!-- Menambahkan pagination style Bootstrap -->
                </div>
            </div>
        </div>
    </div>
@endsection
