<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Relief Supports Sri Lanka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Facebook Open Graph Meta Tags -->
    <meta property="og:title" content="Relief Supports Sri Lanka"/>
    <meta property="og:image" content=""/>
    <meta property="og:site_name" content="Relief Supports Sri Lanka"/>
    <meta property="og:description" content="This is a community driven Open Source project to support relief support activities conduct by volunteers. This project was originally created to support flood relief activities in Sri Lanka in May 2017."/>
    
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
        padding-top: 95px;
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
                <li {{ (Request::is('/') ? 'class=active' : '') }}><a href="/">මුල් පිටුව </a></li>
                <li {{ (Request::is('donations*') ? 'class=active' : '') }}><a href="/donations">ආධාර</a></li>
                <li {{ (Request::is('needs*') ? 'class=active' : '') }}><a href="/needs">අවශ්‍යතාවයන්</a></li>
                <li {{ (Request::is('emergency-contacts*') ? 'class=active' : '') }}><a href="/emergency-contacts">අත්‍යවශ්‍ය දුරකථන  අංක </a></li>
                <li {{ (Request::is('online-donations*') ? 'class=active' : '') }}><a href="/online-donations">Online Donations </a></li>
                <li {{ (Request::is('twitter-feed*') ? 'class=active' : '') }}><a href="/twitter-feed">#FloodSL Twitter Feed</a></li>
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
                <p>මෙම සේවාව 100% නොමිලේ වන අතර හුදෙක් ආධාර කලමනාකරණයට පහසුකවක් සැලසිම අපේ අරමුණයි. නුදුරු දිනයන් තුළ තවත් විශේෂාංග අතුළත් වනු ඇත.</p>
            </div> <!-- /col-xs-7 -->

            <div class="col-md-5 col-xs-12">
                <div class="footer-banner">
                    <h3 class="footer-title">Disclamier</h3>
                    <p>මෙහි ඇති එක් එක් තොරතුරු ඒ ඒ පුද්ගලයන් විසින් වෙබ් අඩවියට ඇතුලත් කර ඇති අතර ඒවයේ නිරවද්‍යතාවය සම්බණ්දයෙන්  සොයාබලා කටයුතු කරන ලෙස කාරුණිකව ඉල්ලා සිටිමි.</p>
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
