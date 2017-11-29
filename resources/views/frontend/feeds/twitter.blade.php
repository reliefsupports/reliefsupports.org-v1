@extends('layouts/master')

@section('content')
    <div class="container">
        <h5>Tweets about #WeatherSL, #FloodReliefLKA, #FloodSL</h1>
        <a class="twitter-timeline"  href="https://twitter.com/search?q=%23WeatherSL%20OR%20%23FloodReliefLKA%20OR%20%23FloodSL"
         data-widget-id="935984136111738881" data-chrome="nofooter nofooter noborders transparent noheader" data-tweet-limit="10" data-aria-polite="assertive" data-width="500px">Tweets about #WeatherSL OR #FloodReliefLKA OR #FloodSL</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>  
    </div>
@endsection