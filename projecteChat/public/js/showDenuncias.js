function crearMapa(lat, lng){
  new GMaps({ 
    el: '#map',
    lat: lat,
    lng: lng,
  }).addMarker({ 
    lat: lat, 
    lng: lng
  });
};

$(function(){
  var point = $("div#map").text().split(";");
  $("div#map").text("");
  crearMapa(point[0], point[1]);
});