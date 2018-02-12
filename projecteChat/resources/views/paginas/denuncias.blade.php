@section('head')
	@parent
  <link rel="stylesheet" href="{{ URL::asset('css/denuncias.css') }}" />
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDumTwXUkXcIKfgTOcx7uQbEeQDzgGUEI8"></script>
  <script type="text/javascript" src="{{ URL::asset('js/gmaps.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/denuncias.js') }}"></script>
@stop

@section('title')
    Projecte Vota - Inicio
@stop

@extends('layouts.master')

@section('content')

<form enctype="multipart/form-data" class="form-horizontal" method="post">
{{ method_field('PUT') }}
{{ csrf_field() }}
  <fieldset>
      <legend class="text-center header" id="denunciar">DENUNCIAR</legend>
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
      <div class="form-group">
    <label class="col-md-4 control-label" for="fimagenGrupo">
      <span class="modal-title">Imagen</span>
    </label>
    <div class="col-md-4">
      <div class="row">
      <label class="input-text" style="font-weight: normal;" for="fimagenGrupo"><p>Clica para insertar una imagen</p>
      <img id="imgSeleccionada" style="max-width: 100%;"/></label>
      <input id="fimagenGrupo" style="display: none;" name="imgDenuncia" type="file" accept="image/*">
      </div>
    </div>
  </div>

  @if (isset($mensaje) && array_key_exists("mensaje", $mensaje))
      <div class="alert alert-danger help-block" role="alert">
          <strong>{{ $mensaje["mensaje"] }}</strong>
      </div>
  @endif
  <!-- Textarea -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="textarea">Mensaje</label>
    <div class="col-md-4">                     
      <textarea class="form-control" id="textarea" name="mensaje" placeholder="Escriu el teu problema..." required></textarea>
    </div>
  </div>

  @if (isset($mensaje) && array_key_exists("mapa", $mensaje))
      <div class="alert alert-danger help-block" role="alert">
          <strong>{{ $mensaje["mapa"] }}</strong>
      </div>
  @endif
  <div class="row">
    <div class="col-md-8 col-md-offset-2" id="map"></div>

    <input type="hidden" name="coords">
  </div>
  <div class="form-group">
    <button id="singlebutton" name="singlebutton" class="btn btn-warning"><i class="glyphicon glyphicon-send"></i> Enviar</button>
  </div>
  </fieldset>
</form>

@stop