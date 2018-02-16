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

function getStringChat(id, img, nombre){
    return '<li class="contact" id="'+ id +'">'+
        '<a data-toggle="tab" href="#p'+id+'">'+
            '<div class="wrap">'+
                getImage(img) +
                '<div class="meta">'+
                    '<p class="name">'+ nombre +'</p>'+
                    '<p class="preview"></p>'+
                '</div>'+
            '</div>'+
        '</a>'+
      '</li>';
}

function getChats(){
    ajax("http://127.0.0.1:8000/api/public/getChats", "get", null, function(){}, function(res){
        for (var i = 0; i < res.length ; i++) {
            $('#contacts .separator:eq(1)').before(getStringChat(res[i].id, res[i].imagen, res[i].nombre));
            getMensajesPublico(res[i].id);
        }
    });
}

function getMensajesPublico($idSala){
    
}



$(function() {
    getChats();
    
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");

    $("#contacts a").click(function() {
        $("#status-options").toggleClass("active");
    });

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

function newMessage() {
    message = $(".message-input input").val();
    if($.trim(message) == '') {
        return false;
    }
    var f=new Date();

    var hora=f.getHours();
    var min=f.getMinutes();
    if(min < 10) min = "0" + min;
    hora = hora + ":" + min;

    $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p><span class="separator">Pepito, '+hora+'</span>' + message + '</p></li>').appendTo($('.messages ul'));
    $('.message-input input').val(null);
    $('.contact.active .preview').html('<span>Tú: </span>' + message);
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

function setMessage(idSala, nombre, date, imagen, mensaje) {
    if($.trim(message) == '') {
        return false;
    }

    $('<li class="replies"><img src="'+getImage(imagen)+'" alt="" /><p><span class="separator">'+nombre+', '+date+'</span>' + message + '</p></li>').appendTo($('.messages ul'));
    $('.contact.active .preview').html('<span>nombre: </span>' + message);
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");
};
function getImage(img){
    if(img === null){
        return '<img src="http://127.0.0.1:8000/img/imageEmpty.png" alt="" />';
    }else{
        return '<img src="'+ img +'" alt="" />';
    }
}