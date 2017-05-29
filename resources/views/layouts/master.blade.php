<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Relief Supports Sri Lanka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Abhaya+Libre" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/public/css/flat-ui.min.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="/public/js/vendor/html5shiv.js"></script>
    <script src="/public/js/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<style>
    * {
        font-family: 'Abhaya Libre', serif;
    }
    
    body {
        padding-top: 120px;
    }

    .main-container {
        min-height: 600px;
    }

    footer {
        margin-top: 80px;
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
                <li {{ (Request::is('/') ? 'class=active' : '') }}><a href="/">{{ __('interface.main_menu.front') }}</a></li>
                <li {{ (Request::is('donations*') ? 'class=active' : '') }}><a href="/donations">{{ __('interface.main_menu.aid') }}</a></li>
                <li {{ (Request::is('needs*') ? 'class=active' : '') }}><a href="/needs">{{ __('interface.main_menu.needs') }}</a></li>
                <li {{ (Request::is('emergency-contacts*') ? 'class=active' : '') }}><a href="/emergency-contacts">{{ __('interface.main_menu.ess_phone_nos') }}</a></li>
                <li {{ (Request::is('twitter-feed*') ? 'class=active' : '') }}><a href="/twitter-feed">{{ __('interface.main_menu.twitter_feed') }}</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Switch Language <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/lang/si">සිංහල</a></li>
                        <li><a href="/lang/ta">தமிழ்</a></li>
                        <li><a href="/lang/en">English</a></li>
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
                <p>{{ __('information.frontpage.aim') }}</p>
            </div> <!-- /col-xs-7 -->

            <div class="col-md-5 col-xs-12">
                <div class="footer-banner">
                    <h3 class="footer-title">Disclamier</h3>
                    <p>{{ __('information.frontpage.verify_details') }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
<script src="/public/js/vendor/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/public/js/vendor/video.js"></script>
<script src="/public/js/flat-ui.min.js"></script>
<script src="/public/js/donations.js"></script>

</body>
</html>
