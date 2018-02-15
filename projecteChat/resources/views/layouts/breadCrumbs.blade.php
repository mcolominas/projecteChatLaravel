<ul class="breadcrumb">
	@if (Request::is('/'))
		<li class="active">Inicio</li>
	@else
		<li><a href="{{ url('/') }}">Inicio</a></li>
	@endif

	@if (Request::is('chatroom'))
		<li class="active">Chatroom</li>
	@elseif (Request::is('denuncia'))
		<li class="active">Crear denuncias</li>
	@elseif (Request::is('denuncia/show*'))
		@if (Request::is('denuncia/show'))
			<li class="active">Ver denuncias</li>
		@else
			<li><a href="{{ url('denuncia/show') }}">Ver denuncias</a></li>
		@endif

		@if (Request::is('denuncia/show/*'))
			<li class="active">Ver informacion denuncia</li>
		@endif
	@elseif (Request::is('foro'))
		<li class="active">Foro</li>
	@elseif (Request::is('intercanvios'))
		<li class="active">Intercanvios</li>
	@elseif (Request::is('login'))
		<li class="active">Iniciar sesion</li>
	@elseif (Request::is('register'))
		<li class="active">Registro</li>
	@elseif (Request::is('noticias'))
		<li class="active">Noticias</li>
	@elseif (Request::is('noticias/add'))
		<li class="active">Crear noticias</li>
	@endif

</ul>

