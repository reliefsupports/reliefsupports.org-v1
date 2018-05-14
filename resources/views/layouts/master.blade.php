<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Relief Supports Sri Lanka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Facebook Open Graph Meta Tags -->
    <meta property="og:title" content="Relief Supports Sri Lanka"/>
    <meta property="og:image" content="/img/reliefsupports_banner.png"/>
    <meta property="og:site_name" content="Relief Supports Sri Lanka"/>
    <meta property="og:description" content="අයහපත් කාලගුණ තත්වය හේතුවෙන් ආපදාවට පත්වූ ඔබේ අවශ්‍යතා සහ මේ මොහොතේ ඔවුන්ට උපකාර කිරීමට සූදානම් ඔබත් මුනගැස්සවන වෙබ් සේවාවක්. ඔබේ අවශ්‍යතා සහ ආධාර දැන්ම එක් කරන්න. Post your relief support activities and connect with people who need it the most. This is a community driven Open Source project to support relief support activities conducted by volunteers. This project was originally created to support flood relief activities in Sri Lanka in May 2017."/>
     
    <link href="{{ asset("/css/app.css") }}" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="/js/vendor/html5shiv.js"></script>
    <script src="/js/vendor/respond.min.js"></script>
    <![endif]-->
    @yield('head-content')
</head>
<body>

<style>

    .share-buttons img {
        width: 35px;
        padding: 5px;
        border: 0;
        box-shadow: 0;
        display: inline;
    }
</style>

<!-- Static navbar -->
<div class="navbar navbar-inverse navbar-fixed-top navbar-lg" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand" href="/">Relief Supports</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li {{ (Request::is('/') ? 'class=active' : '') }}><a href="/">මුල් පිටුව </a></li>
                <li {{ (Request::is('donations*') ? 'class=active' : '') }}><a href="/donations">ආධාර</a></li>
                <li {{ (Request::is('needs*') ? 'class=active' : '') }}><a href="/needs">අවශ්‍යතාවයන්</a></li>
                <li {{ (Request::is('camps*') ? 'class=active' : '') }}><a href="/camps">කදවුරු</a></li>
                <li {{ (Request::is('emergency-contacts*') ? 'class=active' : '') }}><a href="/emergency-contacts">අත්‍යවශ්‍ය දුරකථන  අංක </a></li>
                <!-- <li {{ (Request::is('online-donations*') ? 'class=active' : '') }}><a href="/online-donations">Online Donations </a></li> -->
                <li {{ (Request::is('twitter-feed*') ? 'class=active' : '') }}><a href="/twitter-feed">#WeatherSL Twitter Feed</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

@yield('content')
<!-- /.container -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-xs-12">
                <h3 class="footer-title">© Relief Supports {{ date('Y') }}</h3>
                <p>අයහපත් කාලගුණ තත්වය හේතුවෙන් ආපදාවට පත්වූ ඔබේ අවශ්‍යතා සහ මේ මොහොතේ ඔවුන්ට උපකාර කිරීමට සූදානම් ඔබත් මුනගැස්සවීම සඳහා මෙම වෙබ් අඩවිය නිර්මාණය කර ඇත.</p>
                <p>මෙම සේවාව 100% නොමිලේ වන අතර හුදෙක් ආධාර කළමනාකරණයට පහසුවක් සැලසිම අපේ අරමුණයි. නුදුරු දිනයන් තුළ තවත් විශේෂාංග අතුළත් වනු ඇත.</p>
            </div> <!-- /col-xs-7 -->

            <div class="col-md-5 col-xs-12">
                <div class="footer-banner">
                    <h3 class="footer-title">Disclaimer</h3>
                    <p>මෙහි ඇති එක් එක් තොරතුරු ඒ ඒ පුද්ගලයන් විසින් වෙබ් අඩවියට ඇතුලත් කර ඇති අතර ඒවයේ නිරවද්‍යතාවය සම්බන්ධයෙන් සොයාබලා කටයුතු කරන ලෙස කාරුණිකව ඉල්ලා සිටිමු.</p>
                    <p>මෙම වෙබ් සේවාව ස්වේච්ඡා සේවාවක් සහ ව්‍යපෘතියකි. තවත් තොරතුරු සහ වැඩි දියුණු කිරීම සඳහා උදවු කිරීමට 
<a href="https://github.com/reliefsupports/reliefsupports.org">Github පිටුවට</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
<script src="{{ asset("/js/vendor/jquery.min.js") }}"></script>
<script src="{{ asset("/js/vendor/video.js")}}"></script>
<script src="{{ asset("/js/flat-ui.min.js")}}"></script>
<script src="{{ asset("/js/donations.js")}}"></script>

@yield('js-content')
</body>
</html>
