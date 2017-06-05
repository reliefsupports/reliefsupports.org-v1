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
                <li {{ (Request::is('/') ? 'class=active' : '') }}><a href="/">{{ __('layout.menu.home') }}</a></li>
                <li {{ (Request::is('donations*') ? 'class=active' : '') }}><a href="/donations">{{ __('layout.menu.aid') }}</a></li>
                <li {{ (Request::is('needs*') ? 'class=active' : '') }}><a href="/needs">{{ __('layout.menu.requests') }}</a></li>
                <li {{ (Request::is('emergency-contacts*') ? 'class=active' : '') }}><a href="/emergency-contacts">{{ __('layout.menu.tel') }}</a></li>
                <li {{ (Request::is('online-donations*') ? 'class=active' : '') }}><a href="/online-donations">{{ __('layout.menu.online-donations') }}</a></li>
                <li {{ (Request::is('twitter-feed*') ? 'class=active' : '') }}><a href="/twitter-feed">{{__('layout.menu.twitter-feed')}}</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">{{ (App::isLocale('si') ? 'සිංහල' : 'English') }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(App::isLocale('si'))
                        <!-- <li><a href="/locale/ta">தமிழ்</a></li> -->
                        <li><a href="/locale/en">English</a></li>
                        @else
                        <li><a href="/locale/si">සිංහල</a></li>
                        @endif
                    </ul>
                </li>
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
                {!!__('layout.intro-footer')!!}
            </div> <!-- /col-xs-7 -->

            <div class="col-md-5 col-xs-12">
                <div class="footer-banner">
                    <h3 class="footer-title">Disclaimer</h3>
                    {!! __('layout.disclaimer') !!}
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
<script src="{{ asset("/js/vendor/jquery.min.js") }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset("/js/vendor/video.js")}}"></script>
<script src="{{ asset("/js/flat-ui.min.js")}}"></script>
<script src="{{ asset("/js/donations.js")}}"></script>

</body>
</html>
