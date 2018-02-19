var username = "";
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
        return '<img src="http://127.0.0.1:8000/img/imageEmpty.png" alt="" />';
    }else{
        return '<img src="'+ img +'" alt="" />';
    }
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
    ajax("http://127.0.0.1:8000/api/public/getChats", "get", null, function(){}, function(res){
        for (var i = 0; i < res.length ; i++) {
            $('#contacts .separator:eq(1)').before($(getStringChat(res[i].id, res[i].imagen, res[i].nombre)).click(function(){
                $("#contacts .activado").removeClass( "activado" );
                $(this).addClass( "activado" );
            }));
            
            getMensajesPublico(res[i].id);
        }
    });
}

function getMensajesPublico(idSala){
    if ( $("#linkp"+idSala).length == 0 ) {
        $('#frame .messages:eq(0)').append(getStringMensaje(idSala));
    }

    ajax("http://127.0.0.1:8000/api/public/getMensajes", "get", {"idSala": idSala}, function(){}, function(res){
        for (var i = 0; i < res.length ; i++) {
            mensajeRecibido(idSala, res[i].username, res[i].enviado, res[i].imagen, res[i].mensaje);
        }
    });
}

function newMessage() {
    message = $(".message-input input").val();
    if($.trim(message) == '') {
        return false;
    }
    var f=new Date();

    var hora=f.getHours();
    var min=f.getMinutes();
    if(min < 10) min = "0" + min;
    hora = hora + ":" +  min;

    var idSala = $('#test').attr('id');

    $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p><span class="separator">'+username+', '+hora+'</span>' + message + '</p></li>').appendTo($('.messages .active ul'));
    $('.message-input input').val(null);
    $('a[href$=linkp'+idSala+'] .preview').html('<span>Tú: </span>' + message);
};

function mensajeRecibido(idSala, nombre, date, imagen, mensaje) {
    if($.trim(mensaje) == '') {
        return false;
    }
    
    $("#linkp"+idSala+" ul:eq(0)").append('<li class="replies">'+
                                                getImage(imagen)+
                                                '<p>'+
                                                    '<span class="separator">'+
                                                        nombre+', '+date+
                                                    '</span>'+ 
                                                    mensaje + 
                                                '</p>'+
                                            '</li>');
    
    $('a[href$=linkp'+idSala+'] .preview').html('<span>'+nombre+': </span>' + mensaje);
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