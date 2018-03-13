@section('head')
    @parent
@stop

@section('title')
    Projecte Vota - Inicio

@stop

@extends('layouts.master')

@section('content')
	<div class="text-left">
    <p>Bienvenidos a la página web de Cornellà de Llobregat, en esta pagina web podreis:</p>
    <ul>
    <li>Chatear con gente de vuestra zona.</li>
    <li>Poner vuestras reclamaciones sobre si alguna zona de Cornellà necessita un arreglo o si por otras razones.</li>
    <li>Un foro para poder chatear sobre los problemas de Cornellà o novedades.</li>
    <li>Hacer intercanvios entre vosotros.</li>
    </ul>

	</div>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-cog"></span> Abrir estetica</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Editar estilo de la pagina</h4>
          </div>

          <div class="row">
            <div class="col-md-4"> 
                <div><b>Color Menu</b> 
                    <input id="menu2" name="text" style="width: 80%; margin-bottom: 5px;">
                    <button id="clicar" type="button" class="btn btn-primary">APLICAR</button>
                </div> 
            </div>
            <div class="col-md-4"> 
                <div><b>Color Fondo </b> 
                    <input id="menu3" name="text" style="width: 80%; margin-bottom: 5px;">
                    <button id="clicar2" type="button" class="btn btn-primary">APLICAR</button>
                </div> 
            </div>
            <div class="col-md-4 "> 
                 <div><b>Tamaño Letra(px)</b>  
                    <input id="menu4" name="text" style="width: 80%; margin-bottom: 5px;">
                    <button id="clicar3" type="button" class="btn btn-primary" style="margin-bottom: 20px;">APLICAR</button>
                </div> 
            </div>
            <div class="col-md-4 "> 
                 <div><b>Color Letra</b>  
                    <input id="menu5" name="text" style="width: 80%; margin-bottom: 5px;">
                    <button id="clicar4" type="button" class="btn btn-primary" style="margin-bottom: 20px;">APLICAR</button>
                </div> 
            </div>
            <div class="col-md-4"> 
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><b>Estilo Letra</b>
                <span class="caret"></span></button>
                <ul id="menu6" class="dropdown-menu">
                  <li><a href="#" style="font-family: Arial;">Arial</a></li>
                  <li><a href="#" style="font-family: Times;">Times New Roman</a></li>
                  <li><a href="#" style="font-family: Comic;">Comic Sans</a></li>
                </ul>
              </div>
        </div>
        </div>

          <div class="modal-footer">
            <button id="eliminaCookie" type="button" class="navbar-left" class="btn btn-default" data-dismiss="modal">Valores por defecto</button>
            <button type="button" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>

      </div>
    </div>
@stop