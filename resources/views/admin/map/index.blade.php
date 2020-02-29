@extends('voyager::master')

@section('page_title', __('Admin-Panel Map'))

<style>
/* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
#map {
    height: 100%;
}
/* Optional: Makes the sample page fill the window. */
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}
</style>
@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="admin-section-title">
                    <h3><i class="voyager-list"></i>Map</h3>
                </div>
                <div class="clear"></div>
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .col-md-12 -->
    </div><!-- .page-content container-fluid -->
@stop

@section('javascript')
<script>
    
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you.
    var map, infoWindow;
    function initMap() {
      let states = {!! json_encode($states) !!};
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 31.000000, lng: -100.000000},
        zoom: 6
      });
        states.forEach(trg => {
            let position = trg.latlng.split(',')
            var marker = new google.maps.Marker({
                position: {lat: position[0] *1, lng: position[1]*1},
                map: map,
                icon:'http://maps.google.com/mapfiles/kml/pal4/icon15.png',
                title: `USER-ID:${trg.user_id}`
            });
        });
      infoWindow = new google.maps.InfoWindow;

      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };

          infoWindow.setPosition(pos);
          infoWindow.setContent('Location found.');
          infoWindow.open(map);
          map.setCenter(pos);
        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
                            'Error: The Geolocation service failed.' :
                            'Error: Your browser doesn\'t support geolocation.');
      infoWindow.open(map);
    }
  </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2tOeEx6e_FSggQVNDDNxueAeUuAKGCFI&callback=initMap"
    async defer></script>
<script>
    new Vue({
        el: '#user_request',
        
    });
</script>
@endsection
