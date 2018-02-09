@section('title')
    Projecte Vota - Ver denuncia
@stop

@extends('layouts.master')

@section('content')

	<div class="row text-left">
	<div class="col-md-offset-1 col-md-10">
	<div class="row text-center">
		<div class="col-md-12"><legend class="text-center header" id="">MIS DENUNCIAS</legend></div>
	</div>

	@foreach( $denuncias as $denuncia )

	<div class="row marginTop">
	<a href='{{ URL::asset("denuncia/show/$denuncia->id") }}'>
    	<div class="col-md-3"><img src='{{ URL::asset("$denuncia->imagen") }}' style="width: 100%;"></div>
    	<div class="col-md-9">{{ substr($denuncia->mensaje, 0 ,150) }}{{ strlen($denuncia->mensaje) > 150 ? "..." : ""}}</div>
    </a>
  	</div>

  	@endforeach

	</div>
	</div>
@stop