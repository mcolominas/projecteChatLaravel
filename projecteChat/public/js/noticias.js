function previewFile(input, img) {
  var preview = img;
  var file    =  input.files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}

function crearElementos(){
          /*Creacion del primer div, que hay un titulo i un input*/
          var div = $("<div class='form-group'>");
          var label = $("<label class='col-md-4 control-label' for='textarea'>");
          var input = $("<input  class='form-control' id='input' type='input' name='titulo' required>");
          var div2 = $("<div class='col-md-4'>");

          label.text("Titulo");
          $('.content form fieldset').append(div);
          div.append(label);
          div.append(div2);
          div2.append(input);

          /*Creacion del segundo div, que hay un mensaje i un textarea*/
          var div3 = $("<div class='form-group'>");
          var label = $("<label class='col-md-4 control-label' for='textarea'>");
          var textarea = $("<textarea class='form-control' id='textarea' name='mensaje' placeholder='Descripcio de la noticia...'' required>");
          var div4 = $("<div class='col-md-4'>");

          label.text("Mensaje");
          $('.content form fieldset').append(div3);
          div3.append(label);
          div3.append(div4);
          div4.append(textarea);

          /*Creacion del tecer div, que hay una imagen i un input*/
          var div5 = $("<div class='form-group'>");
          var label = $("<label class='col-md-4 control-label' for='fimagenGrupo'>");
          var span = $("<span class='modal-title'>");
          var div6 = $("<div class='col-md-4'>");
          var div7 = $("<div class='row'>");
          var label2 = $("<label class='input-text' style='font-weight: normal;' for='fimagenGrupo'>");
          var p = $("<p>");
          var img = $("<img id='imgSeleccionada' style='max-width: 100%;'>");
          var input = $("<input id='fimagenGrupo' style='display: none;'' name='imgNoticia' type='file' accept='image/*'>");

          span.text("Imagen");
          p.text("Clica para insertar una imagen");
          $('.content form fieldset').append(div5);
          div5.append(label);
          label.append(span);
          div5.append(div6);
          div6.append(div7);
          div7.append(label2);
          label2.append(p);
          label2.append(img);
          div7.append(input);

          /*Creacion del tecer div, que hay una boton*/
          var div8 = $("<div class='form-group'>");
          var button = $("<button id='singlebutton' name='singlebutton' class='btn btn-warning'>");
          var i = $("<i class='glyphicon glyphicon-send'>");

          button.text(" Enviar");
          $('.content form fieldset').append(div8);
          div8.append(button);
          button.append(i);
      }

$(function(){
crearElementos();
document.getElementById("fimagenGrupo").addEventListener("input", function(){
    var input = document.getElementById("fimagenGrupo");
    var filename = input.value;
    var fileNameIndex = filename.lastIndexOf("/") + 1;
    if(fileNameIndex == 0)
        fileNameIndex = filename.lastIndexOf("\\") + 1;

    if(fileNameIndex > 0)
        filename = filename.substr(fileNameIndex);

    $("label[for='fimagenGrupo'] p").text(filename);
    previewFile(input, document.getElementById("imgSeleccionada"));
  })
});