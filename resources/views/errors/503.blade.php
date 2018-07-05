<!--
* jonnyalexbh
* @Description: view error 503
-->

@extends('layouts.app-errors')

@section('title', 'error 503')

@section('css')
@endsection

@section('content')
  <div class="col-lg-8 col-lg-offset-2 text-center">
    <div class="logo">
      <i class="fa fa-exclamation-triangle fa-5x"></i>
      <h1 class="title">Página en mantenimiento</h1>
    </div>
    <p class="lead text-muted">Disculpe la molestia, en breve estaremos de regreso.</p>
    <p class="text-muted">Trabajamos para brindarle un mejor servicio por el momento realizamos acciones de mantenimiento.</p>
    <div class="logo-mp">
      <img src="{{ asset('images/maintenance.png') }}" class="img-responsive center-block" alt="maintenance" />
    </div>
  </div>
@endsection

@section('js')
@endsection
