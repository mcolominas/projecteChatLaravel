@section('head')
	@parent
	<link rel="stylesheet" href="{{ URL::asset('css/noticias.css') }}" />
    <script
              src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
              integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
              crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::asset('js/verNoticias.js') }}"></script>
@stop

@section('title')
    Projecte Vota - Noticias
@stop

@extends('layouts.master')

@section('content')
<div class="row text-left">
	<div class="col-md-offset-1 col-md-10" id="noticias">

	</div>
</div>

@stop