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
        <div class="col-sm-2">
        </div>
        <div class="well col-sm-8 text-center"> 
          @yield('content')
        </div>
        <div class="col-sm-2">
        </div>
      </div>
    </div>

    @include('layouts.pieDePagina')
  </body>
</html>