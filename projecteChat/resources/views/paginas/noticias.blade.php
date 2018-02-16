@section('head')
	@parent
	<link rel="stylesheet" href="{{ URL::asset('css/noticias.css') }}" />
@stop

@section('title')
    Projecte Vota - Noticias
@stop

@extends('layouts.master')

@section('content')

<div class="row text-left">
	<div class="col-md-offset-1 col-md-10">
	<div class="row text-center">
		<div class="col-md-12"><legend class="text-center header" id="">
		@if (isset($tipo))
			Noticias
		@endif
		

		</legend></div>
	</div>

	@foreach( $noticias as $noticia )

	<div class="row marginTop">
    	<div class="col-md-3"><img src='{{ ($noticia->imagen == NULL) ? URL::asset("/img/imageEmpty.png") : URL::asset("$noticia->imagen") }}' class="img-responsive"></div>
        <div class="col-md-9">
        	<div class="row">
        		<div class="col-md-12">
        			<h3>{{ $noticia->titulo }}</h3>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			{{ $noticia->mensaje }}
        		</div>
        	</div>
        </div>
  	</div>

  	@endforeach

	</div>
	</div>

@stop