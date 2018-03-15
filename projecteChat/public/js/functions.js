/**
* @description: Función que cambia la estetica y guarda el valor en la cookie.
* @param {string} elem: donde esta situado. 
* @param {String} valor: el valor que obtenemos cuando introducimos.
* @param {String} name: nombre que le damos para identificar la cookie.
* @param {String} css: indicamos que parte del css queremos editar.
*/ 
function cambiacolor(elem, valor, name, css){ 		
	elem.css(css,valor);							
	Cookies.set(name,valor);						
}

/**
* @description: Inicializa y añade eventos al projecto
*/
jQuery(function(){ 

	/**
	* @todo: Al cargar la página se cambia la estetica que hemos echo i se guarda como nuevo valor en la cookie.
	*/ 
	jQuery('.navbar-inverse').css('background-color',Cookies.get('menu'));
	jQuery('body').css('background-color',Cookies.get('fondo'));
	jQuery('body').css('font-size',Cookies.get('letra'));
	jQuery('body').css('color',Cookies.get('color'));
	jQuery('body').css('font-family',Cookies.get('estilo'));


	/**
	* @todo: Al clicar sobre nuestro boton de 'Aplicar' busca la id de nuestro valor y llamamos la función 'cambiacolor'.
	*/
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
	
	/**
	* @todo: Al clicar sobre el botón 'Valores por defecto', borramos la cookies que tengamos.
	*/
	jQuery("#eliminaCookie").click(function(){
		Cookies.remove('menu');
		Cookies.remove('fondo');
		Cookies.remove('letra');
		Cookies.remove('color');
		Cookies.remove('estilo');
		location.reload();
	});
		
});