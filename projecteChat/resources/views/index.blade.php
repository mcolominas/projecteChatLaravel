@section('title')
    Projecte Vota - Inicio
@stop

@extends('layouts.master')

@section('content')
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    inivial

@stop