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

  <div class="form-group">
    <label class="col-md-4 control-label" for="textarea">Titulo</label>
    <div class="col-md-4">                     
      <input class="form-control" id="input" type="input" name="titulo" required></input>
    </div>
  </div>

  <!-- Textarea -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="textarea">Mensaje</label>
    <div class="col-md-4">                     
      <textarea class="form-control" id="textarea" name="mensaje" placeholder="Descripcio de la noticia..." required></textarea>
    </div>
  </div>

  @if (isset($mensaje) && array_key_exists("mapa", $mensaje))
      <div class="alert alert-danger help-block" role="alert">
          <strong>{{ $mensaje["mapa"] }}</strong>
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
      <input id="fimagenGrupo" style="display: none;" name="imgNoticia" type="file" accept="image/*">
      </div>
    </div>
   </div>

  <div class="form-group">
    <button id="singlebutton" name="singlebutton" class="btn btn-warning"><i class="glyphicon glyphicon-send"></i> Enviar</button>
  </div>
  </fieldset>
</form>


@stop