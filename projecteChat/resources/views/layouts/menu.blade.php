<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      {{-- Lado izquierdo --}}
      <ul class="nav navbar-nav">
      	{{-- Usuario No Logeado --}}
      	@guest
        	<li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{url('/')}}">Home</a></li>
        {{-- Usuario Logeado --}}
        @else
	        <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{url('/')}}">Chat Room</a></li>
	        <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{url('/')}}">Formulario Denuncia</a></li>
	    @endguest
      </ul>

      {{-- Lado derecho --}}
      <ul class="nav navbar-nav navbar-right">
      		{{-- Usuario No Logeado --}}
      		@guest
		        <li><a href="#" data-toggle="modal" data-target="#modalLogin"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
		        <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{url('/')}}"><span class="glyphicon glyphicon-user"></span> Registro</a></li>
       		{{-- Usuario Logeado --}}
       		@else
				<li class="{{ Request::is('/') ? 'active' : ''}}">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-user"></span>
						<strong>{{ Auth::user()->username }}</strong>
						<span class="glyphicon glyphicon-chevron-down"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<div class="navbar-login">
								<div class="row">
									<div class="col-lg-4">
										<p class="text-center">
											<span class="glyphicon glyphicon-user icon-size"></span>
										</p>
									</div>
									<div class="col-lg-8">
										<p class="text-left small">{{ Auth::user()->email }}</p>
										<p class="text-left">
											<a href="{{url('/')}}" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
										</p>
									</div>
								</div>
							</div>
						</li>
						<li class="divider"></li>
						<li>
							<div class="navbar-login navbar-login-session">
								<div class="row">
									<div class="col-lg-12">
										<p><a class="btn btn-danger btn-block" href="{{ route('logout') }}"
											  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
												Cerrar Sessión
										</a></p>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
            @endguest
      </ul>
    </div>
  </div>
</nav>

@guest
<!-- Menu login modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Iniciar Sesión</h4>
      </div> <!-- /.modal-header -->

      <div class="modal-body">
        <form action="{{url('/')}}" method="post">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" id="uLogin" name="username" placeholder="Usuario">
              <label for="uLogin" class="rojologo input-group-addon glyphicon glyphicon-user"></label>
            </div>
          </div> <!-- /.form-group -->

          <div class="form-group">
            <div class="input-group">
              <input type="password" class="form-control" id="uPassword" name="password" placeholder="Contraseña">
              <label for="uPassword" class="rojologo input-group-addon glyphicon glyphicon-lock"></label>
            </div> <!-- /.input-group -->
          </div> <!-- /.form-group -->

          <div class="checkbox">
          	<label for="recordarme">
          		<input id="recordarme" type="checkbox"> Recordarme
          	</label>
          </div> <!-- /.checkbox -->
        

	      </div> <!-- /.modal-body -->

	      <div class="modal-footer">
	        <button class="rojologo form-control btn btn-primary">Iniciar Sessión</button>
	      </div> <!-- /.modal-footer -->
	    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
@endguest