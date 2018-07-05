<!--
* jonnyalexbh
* @Description: view error 404
-->

@extends('layouts.app-errors')

@section('title', 'error 404')

@section('css')
@endsection

@section('content')
  <div class="col-lg-8 col-lg-offset-2 text-center">
    <div class="logo">
      <i class="fa fa-exclamation-triangle fa-5x"></i>
      <h1 class="title">Error 404</h1>
    </div>
    <p class="lead text-muted">¡Lo sentimos, pero la página que busca no existe!</p>
    <p class="text-muted">por favor verifique la dirección introducida e inténtelo de nuevo.</p>
    <p class="lead text-muted"><a href="{{ route('login') }}">Ir a la página principal</a></p>
    <div class="logo-mp">
      <img src="{{ asset('images/maintenance.png') }}" class="img-responsive center-block" alt="maintenance" />
    </div>
  </div>
@endsection

@section('js')
@endsection
