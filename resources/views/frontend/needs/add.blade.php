@extends('layouts.master')

@section('content')
    <div class="container main-container">
        <div class="row">
            @if (session('errors'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach (session('errors') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-12">
                <h4>අවශ්‍යතා එකතු කරන්න </h4>
                <form class="form-horizontal" role="form" method="POST" action="{{ url("/needs/add")}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">ඔබගේ නම</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telephone" class="col-lg-2 control-label">සම්බන්ධ කර ගත හැකි දුරකථන අංක</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-lg-2 control-label">ඔබගේ ලිපිනය</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="address" name="address" required onkeyup="getLocation()">{{ old('address') }}</textarea>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="latlon" class="col-lg-2 control-label">ඔබ සිටින ස්ථනය සිතියමෙන්</label>
                        <div class="col-lg-10">
                            <input type="hidden" class="form-control" id="geolocation" name="geolocation"  value="{{ old('latlon') }}"/>
                            <p id="map_messages">&nbsp;</p>
                                <div id="mapholder" style="width:55%;height:300px">
                                </div>                          
                        </div>                       
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-lg-2 control-label">ආසන්නම නගරය/ප්‍රා.ලේ කොට්ටාසය </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="needs" class="col-lg-2 control-label">ඔබගේ අවශ්‍යතා </label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="needs" name="needs" required>{{ old('needs') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="heads" class="col-lg-2 control-label">ඔබ සමග සිටින පිරිස </label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="heads" name="heads" max="100000" value="{{ old('heads') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-md-offset-2">
                            {!! app('captcha')->render(); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        <script>
        var map;
        var geocoder;
        var x;
        var marker;
            //initialize map using call back
            function myMap() {
              var myCenter = new google.maps.LatLng(6.9271,79.9912);                
              var mapCanvas = document.getElementById("mapholder");
              var mapOptions = {center: myCenter, zoom: 8};
              map = new google.maps.Map(mapCanvas, mapOptions);
              geocoder = new google.maps.Geocoder();
              x=document.getElementById("map_messages");

              //marker obj
                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP       
                });

                //marker drag listener
                 marker.addListener('dragend', function() {
                    var lat = marker.getPosition().lat();
                    var lng = marker.getPosition().lng();
                    document.getElementById("geolocation").value=lat+","+lng;
                    x.innerHTML=lat+","+lng;

                  });
            }
            
            //user input address
            function getLocation() {

                var address=document.getElementById("address").value;
                codeAddress(address);
            }
            //address to longitude and latitude
            function codeAddress(address) {
                geocoder.geocode( { 'address': address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        showPosition(results[0].geometry.location);
                    } else {
                        showError(status);
                    }
                });
            }

            //show position using marker
            function showPosition(position) {
               
                var lat_lng = position.lat() + "," + position.lng();
                var latlng = new google.maps.LatLng(position.lat(), position.lng());
                marker.setPosition(latlng);
                document.getElementById("geolocation").value=lat_lng;
                x.innerHTML=lat_lng;
            }


            function showError(error) {
            switch(error) {
                case "ZERO_RESULTS":
                    x.innerHTML = "ඔබගේ ලිපිනය සොයාගත නොහැක . රතු පැහැති  සලකුණ ඇදගෙන යාමෙන්  ඔබ සිටින ස්ථානය ලකුණු කල හැක "
                    break;
                case "OVER_QUERY_LIMIT":
                    x.innerHTML = "විමසුම් සීමාව ඉක්මවිය ."
                    break;
                case "REQUEST_DENIED":
                    x.innerHTML = "ඉල්ලීම ප්‍රතික්ෂේප විය "
                    break;
                case "INVALID_REQUEST":
                    x.innerHTML = "වලංගු නොවන ඉල්ලීමකි ."
                    break;
                case "UNKNOWN_ERROR":
                    x.innerHTML="නැවත උත්සහ කරන්න";
                    break;
            }
        }

        </script>

           <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgC3FLuMrk9VwMBzBq9EUmfSX6eD3dR0Y&callback=myMap"></script>

    </div><!-- /.container -->
@endsection
