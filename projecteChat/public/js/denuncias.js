var map, point;

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

function crearMapa(){
  map = new GMaps({ 
    el: '#map',
    lat: 41.3577465,
    lng: 2.0615397,
    click: function(e){addPoint(e.latLng.lat(), e.latLng.lng());},
    tap: function(e){addPoint(e.latLng.lat(), e.latLng.lng());}
  });
  map.addControl({
    position: 'top_right',
    content: 'Geolocate',
    style: {
      margin: '5px',
      padding: '1px 6px',
      border: 'solid 1px #717B87',
      background: '#fff'
    },
    events: {
      click: function(){
        GMaps.geolocate({
          success: function(position) {
            map.setCenter(position.coords.latitude, position.coords.longitude);
            addPoint(position.coords.latitude, position.coords.longitude);
          },
          error: function(error) {
            alert('Geolocation failed: '+error.message);
          },
          not_supported: function() {
            alert("Your browser does not support geolocation");
          }
        });
      }
    }
  });
  //addPoint(41.3577465, 2.0615397);
};
function addPoint(lat, lng){
  point = {lat:lat,lng:lng};
  map.removeMarkers();
  map.addMarker( { 
    lat: lat, 
    lng: lng
  });
}
$(function(){
  crearMapa();

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
  $("form").submit(function(e){
    $("input[name=coords]").val(point["lat"] + ";" + point["lng"]);
  })
});