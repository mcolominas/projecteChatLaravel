@section('title')
    Projecte Vota - Ver mis denuncias
@stop

@extends('layouts.master')

@section('content')

	<div class="row text-left">
	<div class="col-md-offset-1 col-md-10">
	<div class="row text-center">
		<div class="col-md-12"><legend class="text-center header" id="">DENUNCIA</legend></div>
	</div>

	<div class="row marginTop">
		<div class="col-md-3"><img src='{{ URL::asset("$denuncia->imagen") }}' style="width: 100%;"></div>
    	<div class="col-md-9">{{ $denuncia->mensaje }}</div>
    
    </div>

    <div class="row marginTop">
    	<div class="col-md-6">{{ $denuncia->coordenadas }}</div>
  	</div>

	</div>
	</div>

	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="row text-center">
				<form>
					<div class="form-group">
					  <div class="col-md-4">                     
					    <textarea class="form-control" id="textarea" name="textarea" placeholder="Escribe la contestacion..."></textarea>
					  </div>
					</div>

					<!-- Button -->
					<div class="form-group">
					  <div class="col-md-4">
					    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
					  </div>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop