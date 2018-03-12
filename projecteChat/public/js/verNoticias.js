//recibe 5 paramrtros, uno la url a la que se conecta, el otro el metodo, el otro un array con los parametros,
//en caso de ninguno se pone null y 2 funcionas, una para cuando esta descargando los datos del servidor, 
//y la otra cuando ya ha recibido los datos, recibe un parametro con los datos del servidor
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

//generateNoticia("test", "prueba", null).appendTo('.col-md-offset-1.col-md-10')
function generateNoticia(titulo, contenido, categoria, img, importante = false){
	if(img == null) img = "/img/imageEmpty.png";
	return $('<div categoria="'+categoria+'" class="row marginTop"><div>' +
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
        '</div></div>');
}

//generateCategorias(["a", "b"]).appendTo('.col-md-offset-1.col-md-10')
function generateCategorias(categorias){
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

	showCategorias(button.text());

	for(var i = 0; i < a.length; i++)
		if(button.text() === "Sin categoria")
			showCategorias($(a[i]).text());
		else
			hiddenCategorias($(a[i]).text());
}

function selectCategoria(categoria){

}

function hiddenCategorias(categoria){
	//$("[categoria='"+categoria+"']").hide();
	$( "[categoria='"+categoria+"']" ).hide( "blind", {"direction" : "up"}, 50000 );
}

function showCategorias(categoria){
	$( "[categoria='"+categoria+"']" ).show( "slide", 5000 );
	//$("[categoria='"+categoria+"']").show();
}

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

function addCategorias(){
	ajax("api/noticias/getCategorias", "get", null, function(){}, function(res){
		generateCategorias(res).insertBefore($('#noticias').parent().parent().find("> div"))
	});
}

$(function(){
	addCategorias();
	addNoticias();
});
