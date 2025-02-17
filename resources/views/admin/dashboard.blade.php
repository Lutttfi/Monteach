@extends('layouts.app')

@section('content')
<button class="btn btn-secondary mt-3 mb-3">Tambah Guru Piket</button>
<table class="table table-bordered">
    <thead class="text-white" style="background-color: green;">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Guru</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $gurus = [
                'H. Mohammad Raub, S.Pd., M.Pd.I',
                'Susi Haris Kusumawati, S.Pd., M.Pd.',
                'Rahmat Djunaidi, S.Pd.',
                'Elfaini Salam, S.Pd.',
                'Dra. Sri Hendah Mrin Lestari, M.Si.',
                'Edi Sutrisno, S.Pd.',
                'Finalia Meiriana, S.Pd.',
                'Elly Andriani, MK., S.T.'
                'Lutfi'
            ];
        @endphp
        @foreach($gurus as $index => $guru)
        <tr>
            <td class="text-center">{{ $index + 1 }}</td>
            <td>{{ $guru }}</td>
            <td class="text-center">
                <button class="btn btn-primary btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<style>
    
</style>
@endsection
