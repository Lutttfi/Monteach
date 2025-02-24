@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4" style="padding: 20px 0 0 17px;">Daftar Guru Piket</h2>
    
    <a href="{{ route('admin.picketTeacher.create') }}" class="btn btn-success" style="margin-left: 17px;">
        <span class="iconify" data-icon="tabler:plus" data-width="20"></span> Tambah Guru Piket
    </a>
    @if(session('success'))
        <div class="alert alert-success" style="margin: 10px;"></div>
    @endif

        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead style="background-color: green; color:white;">
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 40%;">Nama Guru</th>
                        <th style="width: 30%;">Hari Piket</th>
                        <th style="width: 25%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guruPiket as $key => $item)
                        <tr>
                            <td class="text-center"></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">
                                <a href="" class="btn btn-warning btn-sm">
                                    <span class="iconify" data-icon="tabler:edit" data-width="18"></span> Edit
                                </a>
                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                        <span class="iconify" data-icon="tabler:trash" data-width="18"></span> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data guru piket</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
