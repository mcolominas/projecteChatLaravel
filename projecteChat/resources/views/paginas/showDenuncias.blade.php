@section('title')
    Projecte Vota - Ver mis denuncias
@stop

@extends('layouts.master')

@section('content')

	<div class="row text-left">
	<div class="col-md-offset-1 col-md-10">
	<div class="row text-center">
		<div class="col-md-12"><legend class="text-center header" id="">MIS DENUNCIAS</legend></div>
	</div>

	@foreach( $denuncias as $denuncia )

	<div class="row">
    	<div class="col-md-3">{{$denuncia->imagen}}</div>
    	<div class="col-md-9">{{$denuncia->mensaje}}</div>
  	</div>

  	@endforeach

	</div>
	</div>

@stop