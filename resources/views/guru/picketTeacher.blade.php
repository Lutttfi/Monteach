@extends('layouts.guru')

@section('content')
<div class="container mt-4" style="padding-bottom: 0.5px;">
    <h3 class="py-3">Daftar Guru Piket</h3>

    <!-- Tombol Tambah Guru Piket -->



    <!-- Tabel Guru Piket -->
    <table class="table table-bordered">
        <thead style="background-color:  #009D12; color: white;">
            <tr>
                <th style="width:10%; border-top-left-radius: 10px;">No</th>
                <th style="width: 43%;">Nama</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($guruPiket as $piket)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $piket->guru->nama }}</td>
    </tr>
    @endforeach
</tbody>

    </table>
</div>
@endsection
