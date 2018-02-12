<!doctype html>
<html lang="es">
  <head>
    @section('head')
      @include('layouts.headGeneral')
    @show

    <title>@yield('title', 'Projecte Chat')</title>
  </head>
  <body>

    @include('layouts.cabecera')

    @section('menu')
      @include('layouts.menu')
    @show
    
    <div class="container-fluid">    
      <div class="row content">
        <div class="col-md-2 hidden-xs hidden-sm banner">
          <a href="https://www.google.es/" target="_black">
            <img src="{{ URL::asset('img/banner/Banner.jpg') }}" />
          </a>
        </div>
        <div class="well col-sm-12 col-md-8 text-center"> 
          @include('layouts.breadCrumbs')
          @yield('content')
        </div>
        <div class="col-md-2 hidden-xs hidden-sm banner">
          <a href="https://www.dasani.com/" target="_black">
            <img src="{{ URL::asset('img/banner/Banner2.jpg') }}" />
          </a>
        </div>
      </div>
    </div>

    @include('layouts.pieDePagina')
  </body>
</html>