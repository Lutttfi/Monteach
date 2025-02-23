@extends('layouts.guru')

@section('content')
<div class="container" style="padding-top: 20px;">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-chalkboard-teacher"></i> Daftar Guru Piket</h4>
        </div>
        <div class="card-body">
            @if ($guruPiket->isEmpty())
                <div class="alert alert-warning text-center">
                    <i class="fas fa-exclamation-circle"></i> Belum ada data guru piket.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="text-center bg-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Hari Piket</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guruPiket as $index => $gp)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $gp->nama }}</td>
                                    <td class="text-center">{{ $gp->hari_piket }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
