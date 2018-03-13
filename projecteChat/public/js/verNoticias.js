/**
* @description Funcion generica para hacer llamas ajax
*
* @method ajax
* @param {String} url URL que se quiere utilizar
* @param {String} method Metodo que se quiere utilizar (get, post)
* @param {Array} params Parametros que se pasan por get o post, en caso de null no se pasara ningun dato
* @param {Function} loading Funcion que utiliza mientras esta esperando una respuesta
* @param {Function} respuesta Funcion que recibe la respuesta del servidor
*/
function ajax(url, method, params, loading, respuesta){
    if(params != null)
        $.ajax({
            data:params,
            url: url,
            type: method,
            beforeSend: loading,
            success: respuesta
        });
    else
        $.ajax({
            url: url,
            type: method,
            beforeSend: loading,
            success: respuesta
        });
}

/**
* @description Obtienes un objeto con el cuerpo de una noticia generada
*
* @method generateNoticia
* @param {String} titulo Titulo de la noticia
* @param {String} contenido Descripción de la noticia
* @param {String} categoria Categoria de la noticia
* @param {String} img Imagen de la noticia
* @param {Boolean} [importante=false] Si es la noticia importante o no
* @return {Object} Devuelve un objeto jquery con un bloque de noticia generado
*/
function generateNoticia(titulo, contenido, categoria, img, importante = false){
	if(img == null) img = "/img/imageEmpty.png";
	return $('<div categoria="'+categoria+'" class="row marginTop">'+
        		'<div class="col-md-3"><img src='+img+' class="img-responsive"></div>'+
        			'<div class="col-md-9">' +
            			'<div class="row">' +
               				'<div class="col-md-12">' +
                    			'<h3>' + titulo+ '</h3>' +
                    			(importante ? '<img src="img/gold_star.png" class="importante" alt="importante">' : '') +
                			'</div>' +
            			'</div>' +
                		'<div class="row">' +
                    		'<div class="col-md-12">' +
                        		contenido +
                    		'</div>'+
                		'</div>'+
	        		'</div>'+
	        	'</div>'+
        	'</div>');
}

/**
* @description Obtienes un objeto con el cuertpo del dropdown que contiene las categorias disponibles
*
* @method generateDropDownCategorias
* @param {Array} categorias Se para un array que contiene objetos de las categorias
* @return {Object} Devuelve un objeto jquery con un bloque de noticia generado
*/
function generateDropDownCategorias(categorias){
	var dropdown = $('<div class="dropdown text-left"></div>');
	var button = $('<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Sin categoria' +
    '<span class="caret"></span></button>');
    var ul = $('<ul class="dropdown-menu"></ul>');

    for(var i = 0; i < categorias.length; i++){
    	var li =  $('<li></li>')
    		li.append($('<a href="#">'+categorias[i].nombre+'</a>').on("click", clickCategoria));
    	ul.append(li);
    }
    dropdown.append(button);
    dropdown.append(ul);
  return dropdown;
}

/**
* @description Se activa al seleccionar una categoria en el dropdown
*
* @method clickCategoria
* @param {Object} e Evento que se genera
*/
function clickCategoria(e){
	e.preventDefault();
	var categoria = $(this);
	var button = categoria.parent().parent().parent().find("button").eq(0);	

	var ul = categoria.parent().parent();
	var li = $('<li></li>')
    	li.append($('<a href="#">'+button.text()+'</a>').on("click", clickCategoria));
    	
    if(button.text() === "Sin categoria")
    	ul.prepend(li);
   	else
    	ul.append(li);
    
    button.html(categoria.text() + '<span class="caret"></span>');
	categoria.remove();

	var a = ul.find("li a")

	if(button.text() !== "Sin categoria")
		showNoticias(button.text());

	for(var i = 0; i < a.length; i++)
		if(button.text() === "Sin categoria")
			showNoticias($(a[i]).text());
		else
			hiddenNoticias($(a[i]).text());
}

/**
* @description Oculta la noticias con la categoria pasada
*
* @method hiddenNoticias
* @param {String} categoria Categoria para ocultar
*/
function hiddenNoticias(categoria){
	$( "[categoria='"+categoria+"']" ).hide( "slide", {"direction" : "down"}, 300);
}

/**
* @description Muestra la noticias con la categoria pasada
*
* @method showNoticias
* @param {String} categoria Categoria para mostrar
*/
function showNoticias(categoria){
	$( "[categoria='"+categoria+"']" ).show( "slide", {"direction" : "up"}, 300);
}

/**
* @description Descarga las noticias por ajax y las añade a la pagina
*
* @method addNoticias
*/
function addNoticias(){
	ajax("api/noticias/getNoticias", "get", null, function(){}, function(res){
		for (var i = 0; i < res.importantes.length ; i++) {
			var noticia = res.importantes[i];
			generateNoticia(noticia.titulo, noticia.mensaje, noticia.categoria, noticia.imagen).appendTo('#noticias')
		}
		for (var i = 0; i < res.normal.length ; i++) {
			var noticia = res.normal[i];
			generateNoticia(noticia.titulo, noticia.mensaje, noticia.categoria, noticia.imagen).appendTo('#noticias')
		}
    });
}

/**
* @description Descarga las categorias por ajax y las añade a la pagina
*
* @method addCategorias
*/
function addCategorias(){
	ajax("api/noticias/getCategorias", "get", null, function(){}, function(res){
		generateDropDownCategorias(res).insertBefore($('#noticias').parent().parent().find("> div"))
	});
}


$(function(){
	addCategorias();
	addNoticias();
});
