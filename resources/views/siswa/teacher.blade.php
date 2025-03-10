@extends('layouts.guru')

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
                @foreach ($teachers as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $t->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Showing {{ $teachers->firstItem() }} to {{ $teachers->lastItem() }} of {{ $teachers->total() }}
                    results</span>
            </div>
            <div>
                {{ $teachers->links('pagination::bootstrap-4') }} <!-- Menambahkan pagination style Bootstrap -->
            </div>
        </div>
    </div>
</div>
@endsection
