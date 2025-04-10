@extends('layouts.guruPiket')

@section('content')
    <div class="container mt-4" style="padding-bottom: 0.5px;">
        <h3 class="py-3">Daftar Guru Piket</h3>

        <!-- Tabel Guru Piket -->
        <table class="table table-bordered table-guru-piket">
            <thead style="background-color:  #009D12; color: white; text-align: center;">
                <tr>
                    <th style="width:10%; border-top-left-radius: 10px;">No</th>
                    <th style="width: 43%;">Nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guruPiket as $piket)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $piket->username }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Showing {{ $guruPiket->firstItem() }} to {{ $guruPiket->lastItem() }} of {{ $guruPiket->total() }}
                    results</span>
            </div>
            <div>
                {{ $guruPiket->links('pagination::bootstrap-4') }} <!-- Menambahkan pagination style Bootstrap -->
            </div>
        </div>
    </div>
@endsection
