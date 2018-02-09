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
        <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{url('/')}}">Inicio</a></li>
      	@guest
        @else
	        <li class="{{ Request::is('chatroom') ? 'active' : ''}}"><a href="{{url('/chatroom')}}">Chat Room</a></li>
	        <li class="{{ Request::is('denuncia') ? 'active' : ''}}"><a href="{{url('/denuncia')}}">Denuncia</a></li>
	        <li class="{{ Request::is('foro') ? 'active' : ''}}"><a href="{{url('/foro')}}">Foro</a></li>
	        <li class="{{ Request::is('intercanvios') ? 'active' : ''}}"><a href="{{url('/intercanvios')}}">Intercanvios</a></li>
	    @endguest
      </ul>

      {{-- Lado derecho --}}
      <ul class="nav navbar-nav navbar-right">
      		{{-- Usuario No Logeado --}}
      		@guest
		        <li class="{{ Request::is('login') ? 'active' : ''}}"><a href="{{url('/login')}}"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
		        <li class="{{ Request::is('register') ? 'active' : ''}}"><a href="{{url('/register')}}"><span class="glyphicon glyphicon-user"></span> Registro</a></li>
       		{{-- Usuario Logeado --}}
       		@else
				<li class="{{ Request::is('/auth/update') ? 'active' : ''}}">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-user"></span>
						<strong>{{ Auth::user()->name }}</strong>
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