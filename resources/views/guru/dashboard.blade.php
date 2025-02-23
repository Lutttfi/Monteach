@extends('layouts.guru')

@section('content')
<div class="container">
    <h2>Dashboard Guru</h2>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>
</div>
@endsection
