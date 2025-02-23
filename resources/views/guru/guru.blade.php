@extends('layouts.guru')

@section('content')
<div class="container" style="padding-top: 20px;">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Daftar Guru</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guru as $index => $g)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $g->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
