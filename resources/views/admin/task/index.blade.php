@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 style="padding: 15px 0 15px 0;">Data Guru</h3>
    <a href="" class="btn btn-success mb-3">Tambah Guru</a>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="bg-success text-white">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                        <form action="" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection