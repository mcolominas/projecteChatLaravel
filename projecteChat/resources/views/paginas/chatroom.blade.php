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
                            <li class="contact">
                                <div class="wrap">
                                    <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
                                    <div class="meta">
                                        <p class="name">Louis Litt</p>
                                        <p class="preview">You just got LITT up, Mike.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="contact active">
                                <div class="wrap">
                                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                    <div class="meta">
                                        <p class="name">Harvey Specter</p>
                                        <p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="contact">
                                <div class="wrap">
                                    <img src="http://emilcarlsson.se/assets/rachelzane.png" alt="" />
                                    <div class="meta">
                                        <p class="name">Rachel Zane</p>
                                        <p class="preview">I was thinking that we could have chicken tonight, sounds good?</p>
                                    </div>
                                </div>
                            </li>
	                        <li class="separator">
	                            <img src="{{ URL::asset('img/privateIcon.png') }}">
	                            <span>Salas privadas</span>
                            </li>
                            <li class="contact">
                                <div class="wrap">
                                    <img src="http://emilcarlsson.se/assets/donnapaulsen.png" alt="" />
                                    <div class="meta">
                                        <p class="name">Donna Paulsen</p>
                                        <p class="preview">Mike, I know everything! I'm Donna..</p>
                                    </div>
                                </div>
                            </li>
                            <li class="contact">
                                <div class="wrap">
                                    <img src="http://emilcarlsson.se/assets/jessicapearson.png" alt="" />
                                    <div class="meta">
                                        <p class="name">Jessica Pearson</p>
                                        <p class="preview">Have you finished the draft on the Hinsenburg deal?</p>
                                    </div>
                                </div>
                            </li>
                            <li class="contact">
                                <div class="wrap">
                                    <img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="" />
                                    <div class="meta">
                                        <p class="name">Harold Gunderson</p>
                                        <p class="preview">Thanks Mike! :)</p>
                                    </div>
                                </div>
                            </li>
                            <li class="contact">
                                <div class="wrap">
                                    <img src="http://emilcarlsson.se/assets/danielhardman.png" alt="" />
                                    <div class="meta">
                                        <p class="name">Daniel Hardman</p>
                                        <p class="preview">We'll meet again, Mike. Tell Jessica I said 'Hi'.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="contact">
                                <div class="wrap">
                                    <img src="http://emilcarlsson.se/assets/katrinabennett.png" alt="" />
                                    <div class="meta">
                                        <p class="name">Katrina Bennett</p>
                                        <p class="preview">I've sent you the files for the Garrett trial.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="contact">
                                <div class="wrap">
                                    <img src="http://emilcarlsson.se/assets/charlesforstman.png" alt="" />
                                    <div class="meta">
                                        <p class="name">Charles Forstman</p>
                                        <p class="preview">Mike, this isn't over.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="contact">
                                <div class="wrap">
                                    <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                    <div class="meta">
                                        <p class="name">Jonathan Sidwell</p>
                                        <p class="preview"><span>You:</span> That's bullshit. This deal is solid.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="bottom-bar">
                        <button id="addcontact" data-toggle="modal" data-target="#nuevoGrupo"><i class="material-icons icon-google-1-5">group_add</i> <span>Nuevo Grupo</span></button>
                    </div>
                </div>
                <div class="content">
                    <div class="contact-profile">
                        <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                        <p>Harvey Specter</p>
                        <div class="setting">
                             <a href="#" data-toggle="modal" data-target="#linkInvitarModal" style="color:red;"><i class="fa fa-link fa-lg fa-fw" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="messages">
                        <ul>
                            <li class="sent">
                                <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                                <p><span class="separator">Pepito, 19:56</span>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                            </li>
                            <li class="replies">
                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                <p><span class="separator">Daniel, 20:03</span>When you're backed against the wall, break the god damn thing down.</p>
                            </li>
                            <li class="replies">
                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                <p><span class="separator">Daniel, 20:04</span>Excuses don't win championships.</p>
                            </li>
                            <li class="sent">
                                <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                                <p><span class="separator">Pepito, 20:10</span>Oh yeah, did Michael Jordan tell you that?</p>
                            </li>
                            <li class="replies">
                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                <p><span class="separator">Daniel, 20:12</span>No, I told him that.</p>
                            </li>
                            <li class="replies">
                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                <p><span class="separator">Daniel, 20:13</span>What are your choices when someone puts a gun to your head?</p>
                            </li>
                            <li class="sent">
                                <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                                <p><span class="separator">Pepito, 20:31</span>What are you talking about? You do what they say or they shoot you.</p>
                            </li>
                            <li class="replies">
                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                <p><span class="separator">Daniel, 20:35</span>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                            </li>
                        </ul>
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