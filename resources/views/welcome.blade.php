@extends('layouts.template')
@section('content')

<head>
    <title>Navbar con color de fondo en Laravel </title>
    <link href="{{ asset('css/fondo.css') }}" rel="stylesheet">
</head>

<h2>¡BIENVENIDOS A TU APPMEDIC! </h2> 
<div class="col-sm-12 d-flex justify-content-center" style="position:relative">
<img src="{{ asset('image/logoAPPMEDIC.png') }}" class="img img-fluid" alt="" class="navbar-logo" style="width: 250px; height: 250px;">            
</div>

<div class="container-fluid">
    <div class="row">
            <div class="col-sm-12 d-flex justify-content-center" style="position:relative">
                <h4 style="position: absolute; top: 10;">MISIÓN</h4>
                <p style="margin-top: 30px;">
                    Brindar una atención médico-hospitalaria a nuestros pacientes y usuarios, 
                    <br> con los más altos estándares de calidad integral, <br>
                    buscando siempre exceder sus expectativas y fomentando <br>
                    el desarrollo de una cultura organizacional excelente.
                </p>
        </div>
    </div>
</div>

<div class="container-fluid"> 
    <div class="row">
            <div class="col-sm-12 d-flex justify-content-center" style="position: relative">
                <h4 style="position: absolute; top: 10;">VISIÓN</h4>
                <p style="margin-top: 30px;">
                    Crear y sostener un sistema de salud privada, <br>
                    que ofrezca un espacio de crecimiento y desarrollo profesional <br>
                    enfocado en la excelencia y calidez en la asistencia al paciente <br>
                    y su familia.
                </p>
        </div>
    </div>
</div>
@endsection


