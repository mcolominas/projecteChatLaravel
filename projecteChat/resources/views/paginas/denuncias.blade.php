@section('head')
	@parent
	<link rel="stylesheet" src="{{ URL::asset('css/denuncia.css') }}"></link>
@stop

@section('title')
    Projecte Vota - Inicio
@stop

@extends('layouts.master')

@section('content')

 <form class="form-horizontal" method="post">
        <fieldset>
            <legend class="text-center header" id="denunciar">DENUNCIAR</legend>
            <div class="form-group">
          <label class="col-md-4 control-label" for="fimagenGrupo">
            <span class="modal-title">Imagen</span>
          </label>
          <div class="col-md-4">
            <label class="input-text" style="font-weight: normal;" for="fimagenGrupo"><p>Clica para insertar una imagen</p></label>
            <input id="fimagenGrupo" style="display: none;" name="filebutton" type="file">
          </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textarea">Mensaje</label>
          <div class="col-md-4">                     
            <textarea class="form-control" id="textarea" name="textarea" placeholder="Escriu el teu problema..."></textarea>
          </div>
        </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2994.8677135458884!2d2.0679089505497026!3d41.35522897916542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sca!2ses!4v1516904707294" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        <div class="form-group">
          <button id="singlebutton" name="singlebutton" class="btn btn-warning"><i class="glyphicon glyphicon-send"></i> Enviar</button>
        </div>
        </fieldset>
    </form>

<script>
    document.getElementById("fimagenGrupo").addEventListener("input", function(){
        var filename = $("#fimagenGrupo").val()
        var fileNameIndex = filename.lastIndexOf("/") + 1;
        if(fileNameIndex == 0)
            fileNameIndex = filename.lastIndexOf("\\") + 1;

        if(fileNameIndex > 0)
            filename = filename.substr(fileNameIndex);

        $("label[for='fimagenGrupo'] p").text(filename);
    })
</script>

@stop