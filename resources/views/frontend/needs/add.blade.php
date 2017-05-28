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
                <form class="form-horizontal" role="form" method="POST" action="/needs/add">
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
                            <textarea class="form-control" rows="4" id="address" name="address" required>{{ old('address') }}</textarea>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="latlon" class="col-lg-2 control-label">ඔබ සිටින ස්ථනය සිතියමෙන්</label>
                        <div class="col-lg-10">
                            <input type="hidden" class="form-control" id="latlon" name="latlon"  value="{{ old('latlon') }}"/>
                              <button type="button" onclick="getLocation()" class="btn btn-primary">සිතියමට ඇතුල් කරන්න</button>
                            <p id="demo">&nbsp;</p>
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
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

     

        <script>
        var map;
            function myMap() {
            
              var myCenter = new google.maps.LatLng(6.9271,79.9912);
                
                
              var mapCanvas = document.getElementById("mapholder");
              var mapOptions = {center: myCenter, zoom: 8};
              map = new google.maps.Map(mapCanvas, mapOptions);

            }


            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                var latlon = position.coords.latitude + "," + position.coords.longitude;
                document.getElementById("latlon").value=latlon;

                marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: {lat: position.coords.latitude, lng: position.coords.longitude}
              });
            }


            function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }

        </script>

           <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgC3FLuMrk9VwMBzBq9EUmfSX6eD3dR0Y&callback=myMap"></script>

    </div><!-- /.container -->
@endsection