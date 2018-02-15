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

$(function(){

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