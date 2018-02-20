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

function getImage(img){
    if(img === null){
        return '<img src="img/imageEmpty.png" alt="" />';
    }else{
        return '<img src="'+ img +'" alt="" />';
    }
}

function getUsername(){
    return $("#frame .contact-profile p:eq(0)").text();
}
function getimageUser(){
    return $("#frame .contact-profile img").attr('src');
}
function getUserId(){
    return $("#frame .contact-profile p:eq(1)").text();
}

function getStringChat(idSala, img, nombre){
    return '<a data-toggle="tab" href="#linkp'+idSala+'">'+
                '<li class="contact">'+
                    '<div class="wrap">'+ 
                        getImage(img) +
                        '<div class="meta">'+
                            '<p class="name">'+ nombre +'</p>'+
                            '<p class="preview"></p>'+
                        '</div>'+
                    '</div>'+
                '</li>'+
            '</a>';
}

function getStringMensaje(idSala){
    return '<div id="linkp'+idSala+'" class="tab-pane fade">'+
                '<ul>'+
                '</ul>'+
            '</div>';
}

function getChats(){
    ajax("api/public/getChats", "get", null, function(){}, function(res){
        for (var i = 0; i < res.length ; i++) {
            $('#contacts .separator:eq(1)').before($(getStringChat(res[i].id, res[i].imagen, res[i].nombre)).click(function(){
                $("#contacts .activado").removeClass( "activado" );
                $(this).addClass( "activado" );
            }));
            primeraConexionChatPublicos(res[i].id);
            setInterval(getLastMensajesPublicos, 2000, res[i].id);
        }
    });
}

function getLastMensajesPublicos(idSala){
    var idLastMensaje = $("#linkp"+idSala+" li").last().attr("idMensaje");
    if(idLastMensaje == null) idLastMensaje = 1;
    
    var idUsuario = getUserId();
    ajax("api/public/getLastMensajes", "get", {"idSala": idSala, "idMensaje": idLastMensaje}, function(){}, function(res){
        for (var i = 0; i < res.length ; i++) {
            mensajeRecibido(idSala, res[i].username, res[i].enviado, res[i].imagen, res[i].mensaje, res[i].idMensaje, idUsuario == res[i].idUsuario);
        }
    });
}

function primeraConexionChatPublicos(idSala){
    if ( $("#linkp"+idSala).length == 0 ) {
        $('#frame .messages:eq(0)').append(getStringMensaje(idSala));
    }
    var idUsuario = getUserId();
    ajax("api/public/getMensajes", "get", {"idSala": idSala}, function(){}, function(res){
        for (var i = 0; i < res.length ; i++) {
            mensajeRecibido(idSala, res[i].username, res[i].enviado, res[i].imagen, res[i].mensaje, res[i].idMensaje, idUsuario == res[i].idUsuario);
        }
    });
}

function newMessage() {
    var mensaje = $(".message-input input").val();
    if($.trim(mensaje) == '') return;

    var idSala = $('#contacts .activado').attr('href');
    if(idSala == null) return;
    idSala = idSala.substr(6);

    var f=new Date();

    var hora=f.getHours();
    var min=f.getMinutes();
    if(min < 10) min = "0" + min;
    hora = hora + ":" +  min;
    
    ajax("api/public/setMensajes", "get", {"idSala" : idSala, "idUsuario" : getUserId(), "mensaje" : mensaje}, function(){}, function(res){
        $('<li idMensaje="'+res.idMensaje+'" class="sent"><img src="'+ getimageUser() +'" alt="" /><p><span class="separator">'+username+', '+hora+'</span>' + mensaje + '</p></li>').appendTo($('.messages .active ul'));
        $('.message-input input').val(null);
        $('a[href$=linkp'+idSala+'] .preview').html('<span>Tú: </span>' + mensaje);
    });


};

function mensajeRecibido(idSala, nombre, date, imagen, mensaje, idMensaje, enviado=false) {
    if($.trim(mensaje) == '') {
        return false;
    }
    if(enviado){
        $('<li idMensaje="'+idMensaje+'" class="sent"><img src="'+ getimageUser() +'" alt="" /><p><span class="separator">'+nombre+', '+date+'</span>' + mensaje + '</p></li>').appendTo($('#linkp'+idSala+' ul:eq(0)'));
        $('a[href$=linkp'+idSala+'] .preview').html('<span>Tú: </span>' + mensaje);
        
    }else{
        $("#linkp"+idSala+" ul:eq(0)").append('<li idMensaje="'+idMensaje+'" class="replies">'+
                                                    getImage(imagen)+
                                                    '<p>'+
                                                        '<span class="separator">'+
                                                            nombre+', '+date+
                                                        '</span>'+ 
                                                        mensaje + 
                                                    '</p>'+
                                                '</li>');
    
        $('a[href$=linkp'+idSala+'] .preview').html('<span>'+nombre+': </span>' + mensaje);
    }
};

$(function() {
    username = $("nav .navbar-right:eq(0) .dropdown-toggle strong").text();
    getChats();

    $('.submit').click(function() {
      newMessage();
    });

    $(window).on('keydown', function(e) {
      if (e.which == 13) {
        newMessage();
        return false;
      }
    }); 
});