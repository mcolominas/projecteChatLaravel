@section('head')
	@parent
	<link rel="stylesheet" href="{{ URL::asset('css/noticias.css') }}" />
@stop

@section('title')
    Projecte Vota - Noticias
@stop

@extends('layouts.master')

@section('content')

<div class="dropdown text-left">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{ isset($categoriaActual) ? $categoriaActual: "Sin categoria"  }}
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    @if(isset($categoriaActual))
        <li><a href='{{url("/noticias")}}'>Sin categoria</a></li>
    @endif
    
        @foreach( $categorias as $categoria )            
            <li><a href='{{url("/noticias/categoria/$categoria->nombre")}}'>{{$categoria->nombre}}</a></li>
            
        @endforeach
    </ul>
  </div>

<div class="row text-left">
	<div class="col-md-offset-1 col-md-10">

    	@foreach( $noticiasImportantes as $noticia )

        <div class="row marginTop">
            <div class="col-md-3"><img src='{{ ($noticia->imagen == NULL) ? URL::asset("/img/imageEmpty.png") : URL::asset("$noticia->imagen") }}' class="img-responsive"></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <h3>{{ $noticia->titulo }}</h3>
                        <img src="{{ URL::asset('img/gold_star.png') }}" class="importante" alt="importante">
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