@section('head')
	@parent
	<link rel="stylesheet" href="{{ URL::asset('css/denuncias.css') }}" />
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDumTwXUkXcIKfgTOcx7uQbEeQDzgGUEI8"></script>
  	<script type="text/javascript" src="{{ URL::asset('js/gmaps.min.js') }}"></script>
  	<script type="text/javascript" src="{{ URL::asset('js/showDenuncias.js') }}"></script>
@stop

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
		<div class="col-md-3"><img src='{{ ($denuncia->imagen == NULL) ? URL::asset("/img/imageEmpty.png") : URL::asset("$denuncia->imagen") }}' style="width: 100%;"></div>
    	<div class="col-md-9">{{ $denuncia->mensaje }}</div>
    
    </div>

    <div class="row marginTop">
    	<div class="col-md-12"><div id="map">{{ $denuncia->coordenadas }}</div></div>
  	</div>

	</div>
	</div>

	@foreach( $mensajesDenuncias as $mensajesDenuncia )
		<div class="row marginTop">
			<div class="col-md-offset-1 col-md-10">
				<span>{{ $mensajesDenuncia->mensaje }}</span>
			</div>
  		</div>
	@endforeach

	<div class="row marginTop">
		<div class="col-md-offset-1 col-md-10">
			<div class="row text-center">
				<form method="POST">
					{{ method_field('PUT') }}
					{{ csrf_field() }}
					<div class="form-group">
					  <div class="col-md-offset-3 col-md-6">                     
					    <textarea class="form-control" id="textarea" name="respuesta" placeholder="Escribe la respuesta..."></textarea>
					  </div>
					</div>

					<!-- Button -->
					<div class="form-group">
					  <div class="col-md-offset-5 col-md-2">
					    <button id="singlebutton" name="singlebutton" class="marginTop col-md-12 btn btn-primary">Enviar</button>
					  </div>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop