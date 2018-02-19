@section('head')
	@parent
	<link rel="stylesheet" href="{{ URL::asset('css/chatroom.css') }}" />
	<script type="text/javascript" src="{{ URL::asset('js/chatroom.js') }}"></script>
@stop

@section('title')
    Projecte Vota - Chat
@stop

@extends('layouts.master')

@section('content')

          <div id="frame" class="text-left">
                <div id="sidepanel">
                    <div id="search">
                        <label for="buscarGrupos"><i class="fa fa-search" aria-hidden="true"></i></label>
                        <input type="text" id="buscarGrupos" placeholder="Buscar grupos..." />
                    </div>
                    <div id="contacts">
                        <ul>
	                        <li class="separator">
	                            <img src="{{ URL::asset('img/publicIcon.png') }}">
	                            <span>Salas publicas</span>
                            </li>
                            
	                        <li class="separator">
	                            <img src="{{ URL::asset('img/privateIcon.png') }}">
	                            <span>Salas privadas</span>
                            </li>
                            
                        </ul>
                    </div>
                    <div id="bottom-bar">
                        <button id="addcontact" data-toggle="modal" data-target="#nuevoGrupo"><i class="material-icons icon-google-1-5">group_add</i> <span>Nuevo Grupo</span></button>
                    </div>
                </div>
                <div class="content">
                    <div class="contact-profile">
                        <img src="{{ $imagen }}" alt="" />
                        <p>{{ $username }}</p>
                        <div class="setting">
                             <a href="#" data-toggle="modal" data-target="#linkInvitarModal" style="color:red;"><i class="fa fa-link fa-lg fa-fw" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="messages tab-content">
                    
                    </div>
                    <div class="message-input">
                        <div class="wrap">
                        <input type="text" placeholder="Escribe tu mensaje..." />
                        <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
<!-- Nuevo Grupo modal -->
<div class="modal fade" id="nuevoGrupo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Grupo</h4>
      </div> <!-- /.modal-header -->

      <div class="modal-body">
        
          <div class="form-group">
            <div class="input-group">
              <label for="fnombreGrupo" class="rojologo no-top input-group-addon"><i class="fa fa-pencil"></i></label>
              <input type="text" class="form-control" id="fnombreGrupo" name="nombreGrupo" placeholder="Nombre del grupo">
            </div>
          </div> <!-- /.form-group -->
          <div class="form-group">
            <div class="input-group">
              <label for="fimagenGrupo"><i class="rojologo no-top input-group-addon fa fa-file-image-o" style="display: inline;"></i> <span class="modal-title" style="font-weight: normal;">Imagen del Grupo</span></label>
              <input type="file" style="display: none" class="form-group" class="form-control" id="fimagenGrupo" name="nombreGrupo" placeholder="Nombre del grupo">
            </div>
          </div> <!-- /.form-group -->
      </div> <!-- /.modal-body -->

      <div class="modal-footer">
        <button class="rojologo form-control btn btn-primary">Crear nuevo grupo</button>
      </div> <!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<script>
    document.getElementById("fimagenGrupo").addEventListener("input", function(){
        var filename = $("#fimagenGrupo").val()
        var fileNameIndex = filename.lastIndexOf("/") + 1;
        if(fileNameIndex == 0)
            fileNameIndex = filename.lastIndexOf("\\") + 1;

        if(fileNameIndex > 0)
            filename = filename.substr(fileNameIndex);

        $("label[for='fimagenGrupo'] span").text(filename);
    })
    /*document.getElementById("buscarGrupos").addEventListener("input", function(){
        var contactos = $("#contacts li").each(function(index){
            alert(this.text.)
        });

    })*/
    $("label[for='linkInvitar']").click("input", function(){
        $("#linkInvitar").select();
        document.execCommand("Copy");
    })
    
</script>

@stop