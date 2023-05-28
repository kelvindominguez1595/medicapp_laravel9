@extends('layouts.template')
@section('content')
    <div class="mt-5 row container">
        <div class="col-4">
            <h1 class="fs-1">Bienvenido</h1>
        </div>
        <div class="col-8">
            <img src="{{ asset('image/enter.svg') }}" class="img img-fluid" alt="">
        </div>
    </div>
@endsection
