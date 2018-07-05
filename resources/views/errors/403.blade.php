<!--
* jonnyalexbh
* @Description: view error 403
-->

@extends('layouts.app-errors')

@section('title', 'error 403')

@section('css')
@endsection

@section('content')
  <div class="col-lg-8 col-lg-offset-2 text-center">
    <div class="logo">
      <i class="fa fa-exclamation-triangle fa-5x"></i>
      <h1 class="title">Error 403</h1>
    </div>
    <p class="lead text-muted">¡Lo sentimos, Acceso denegado!</p>
    <p class="text-muted">Usted no tiene permiso para acceder a esta opción.</p>
    <p class="lead text-muted"><a href="{{ route('login') }}">Ir a la página principal</a></p>
    <div class="logo-mp">
      <img src="{{ asset('images/maintenance.png') }}" class="img-responsive center-block" alt="maintenance" />
    </div>
  </div>
@endsection

@section('js')
@endsection
