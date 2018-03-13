jQuery(function(){ 

	//Función que cambia el color de fondo y guarda el valor en la cookie
	function cambiacolor(elem, valor, name, css){ 		//Recibe el color de fondo 'bgcolor'
		elem.css(css,valor);							//Cambia el color de fondo de la web a 'bgcolor'
		Cookies.set(name,valor);						//Crea una cookie llamada 'colorCookie' con el color elegido 'bgcolor'
	}
	
	//Al cargar la página se pone de color de fondo el valor que hay en la cookie 
	jQuery('.navbar-inverse').css('background-color',Cookies.get('menu'));
	jQuery('body').css('background-color',Cookies.get('fondo'));
	jQuery('body').css('font-size',Cookies.get('letra'));
	jQuery('body').css('color',Cookies.get('color'));
	jQuery('body').css('font-family',Cookies.get('estilo'));

	//Al clicar sobre la imagen obtenemos el color del la id del input y llamamos la función 'cambiacolor' con el color seleccionado
	jQuery('#clicar').click(function(e){
		e.preventDefault();
		cambiacolor(jQuery('.navbar-inverse'), $("#menu2").val(), "menu", "background-color");
		
	});

	jQuery('#clicar2').click(function(e){
		e.preventDefault();
		cambiacolor(jQuery('body'), $("#menu3").val(), "fondo", "background-color");
		
	});

	jQuery('#clicar3').click(function(e){
		e.preventDefault();
		cambiacolor(jQuery('body'), $("#menu4").val(), "letra", "font-size");
		
	});

	jQuery('#clicar4').click(function(e){
		e.preventDefault();
		cambiacolor(jQuery('body'), $("#menu5").val(), "color", "color");
		
	});

	jQuery('#menu6 a').click(function(e){
		e.preventDefault();
		cambiacolor(jQuery('body'), $(this).text(), "estilo", "font-family");

	});
	
	//Al clicar sobre el botón de eliminar cookies, borramos la cookie	
	jQuery("#eliminaCookie").click(function(){
		Cookies.remove('menu');
		Cookies.remove('fondo');
		Cookies.remove('letra');
		Cookies.remove('color');
		Cookies.remove('estilo');
		location.reload();
	});
		
});