@section('head')
    @parent
@stop

@section('title')
    Projecte Vota - Inicio

@stop

@extends('layouts.master')

@section('content')
	<div id="letra" class="text-left">
    <p>Bienvenidos a la página web de Cornellà de Llobregat, en esta pagina web podreis:</p>
    <ul>
    <li>Chatear con gente de vuestra zona.</li>
    <li>Poner vuestras reclamaciones sobre si alguna zona de Cornellà necessita un arreglo o si por otras razones.</li>
    <li>Un foro para poder chatear sobre los problemas de Cornellà o novedades.</li>
    <li>Hacer intercanvios entre vosotros.</li>
    </ul>

	</div>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Abrir estetica</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Cambiar color</h4>
          </div>

          <div class="col-md-12 col-xs-12">
          <div class="col-md-4 col-xs-4"> 
                <div>Menu  
                    <input id="menu2" name="text">
                    <button id="clicar" type="button" class="btn btn-primary">APLICAR</button>
                </div> 
            </div>
            <div class="col-md-4 col-xs-4"> 
                <div>Fondo  
                    <input id="menu3" name="text">
                    <button id="clicar2" type="button" class="btn btn-primary">APLICAR</button>
                </div> 
            </div>
            <div class="col-md-4 col-xs-4"> 
                 <div>Tamaño Letra  
                    <input id="menu4" name="text">
                    <button id="clicar3" type="button" class="btn btn-primary">APLICAR</button>
                </div> 
            </div>
            </div>

          <div class="modal-footer">
            <button id="eliminaCookie" type="button" class="btn btn-default" data-dismiss="modal">Valores por defecto</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>

      </div>
    </div>
@stop