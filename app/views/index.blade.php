@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        @if (null!==(Auth::user()))
        <h1>Bienvenido {{ Auth::user()->username; }}</h1>
        <a class="btn-danger btn-lg" href="{{ route('logout') }}">Cerrar sesión.</a>
        @else
        <a class="btn-success btn-lg" href="{{ route('login') }}">Iniciar sesión.</a>
        @endif
    </div>
</div>
@stop