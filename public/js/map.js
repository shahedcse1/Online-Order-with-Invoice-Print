function initMap() {
  var mapProp = {
    center: new google.maps.LatLng(25.7449501667, 89.220074),
    zoom: 12,
  };
  var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
