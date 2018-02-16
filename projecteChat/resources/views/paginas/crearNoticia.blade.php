@section('head')
	@parent
	 <script type="text/javascript" src="{{ URL::asset('js/noticias.js') }}"></script>
@stop

@section('title')
    Projecte Vota - Crear noticias
@stop

@extends('layouts.master')

@section('content')

<form enctype="multipart/form-data" class="form-horizontal" method="post">
{{ method_field('PUT') }}
{{ csrf_field() }}
  <fieldset>
      <legend class="text-center header" id="denunciar">CREAR NOTICIAS</legend>
      @if (isset($mensaje) && array_key_exists("success", $mensaje))
          <div class="alert alert-success help-block" role="alert">
              <strong>{{ $mensaje["success"] }}</strong>
          </div>
      @endif
      @if (isset($mensaje) && array_key_exists("user", $mensaje))
          <div class="alert alert-danger help-block" role="alert">
              <strong>{{ $mensaje["user"] }}</strong>
          </div>
      @endif
      @if (isset($mensaje) && array_key_exists("image", $mensaje))
          <div class="alert alert-danger help-block" role="alert">
              <strong>{{ $mensaje["image"] }}</strong>
          </div>
      @endif
   

  @if (isset($mensaje) && array_key_exists("mensaje", $mensaje))
      <div class="alert alert-danger help-block" role="alert">
          <strong>{{ $mensaje["mensaje"] }}</strong>
      </div>
  @endif

  @if (isset($mensaje) && array_key_exists("mapa", $mensaje))
      <div class="alert alert-danger help-block" role="alert">
          <strong>{{ $mensaje["mapa"] }}</strong>
      </div>
  @endif

@stop