@extends('layouts.guruPiket')

@section('content')
<div class="container mt-4">
    <h3 class="py-3">Daftar Guru</h3>
    <div class="table-responsive">
        <table class="table table-bordered text-center" style="border-radius: 10px; overflow: hidden;">
            <thead style="background-color: #009D12; color: white;">
                <tr>
                    <th style="width:10%; border-top-left-radius: 10px;">No</th>
                    <th style="width: 43%;">Nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $g)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $g->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Showing {{ $guru->firstItem() }} to {{ $guru->lastItem() }} of {{ $guru->total() }}
                    results</span>
            </div>
            <div>
                {{ $guru->links('pagination::bootstrap-4') }} <!-- Menambahkan pagination style Bootstrap -->
            </div>
        </div>
    </div>
</div>
@endsection
