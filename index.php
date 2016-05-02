<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
    <!--<![endif]-->
    <?php
    $css_inc = array(
        'font-awsome' => 'http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',
        'bootstrap-css' => 'css/bootstrap.css',
        'style-css' => 'style.css',
        'responsive-css' => 'css/responsive.css'
    );

    $js_inc = array(
        'jquery' => 'https://code.jquery.com/jquery.min.js',
        'bootstrap-js' => 'js/bootstrap.min.js',
        'theme-js' => 'js/main.js',
        'angular-js' => 'http://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js',
        'angular-js-route' => 'http://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-route.min.js',
        'script' => 'scripts/injection.js',
        'animate' => 'http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.js'
    );

    include_once 'autoload.php';
    $autoload = new Autoload();
    $autoload->title = 'Tamil MP3';
    $autoload->css_inc = $css_inc;
    $autoload->js_inc = $js_inc;
    ?>

    <?php include ('header.php'); ?>
    <style type="text/css">

        .loading-screen {
            top:0;
            left:0;
            width:100%;
            height:100%;
            position: fixed;
            z-index: 20;
            background-color: #111;
            opacity: 0.6;
            filter: alpha(opacity=60);

        }
        .loading-icon{
            margin-left: auto;
            margin-right: auto;
            margin-top: 21%;
        }
        .sk-wave {
            margin: 40px auto;
            width: 50px;
            height: 40px;
            text-align: center;
            font-size: 10px; }
        .sk-wave .sk-rect {
            background-color: #fff;
            height: 100%;
            width: 6px;
            display: inline-block;
            -webkit-animation: sk-waveStretchDelay 1.2s infinite ease-in-out;
            animation: sk-waveStretchDelay 1.2s infinite ease-in-out; }
        .sk-wave .sk-rect1 {
            -webkit-animation-delay: -1.2s;
            animation-delay: -1.2s; }
        .sk-wave .sk-rect2 {
            -webkit-animation-delay: -1.1s;
            animation-delay: -1.1s; }
        .sk-wave .sk-rect3 {
            -webkit-animation-delay: -1s;
            animation-delay: -1s; }
        .sk-wave .sk-rect4 {
            -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s; }
        .sk-wave .sk-rect5 {
            -webkit-animation-delay: -0.8s;
            animation-delay: -0.8s; }

        @-webkit-keyframes sk-waveStretchDelay {
            0%, 40%, 100% {
                -webkit-transform: scaleY(0.4);
                transform: scaleY(0.4); }
            20% {
                -webkit-transform: scaleY(1);
                transform: scaleY(1); } }

        @keyframes sk-waveStretchDelay {
            0%, 40%, 100% {
                -webkit-transform: scaleY(0.4);
                transform: scaleY(0.4); }
            20% {
                -webkit-transform: scaleY(1);
                transform: scaleY(1); } }

    </style>

    <body ng-app="tamilMp3" ng-controller="main">
        <!-- NAVIGATION -->
        <?php include ('nav.php'); ?>

        <!-- ~~~=| Banner START |=~~~ -->
        <section class="hp_banner_area section_padding" ng-show="banner.visibility">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="hp_banner_box">
                            <div class="hp_banner_right">
                                <div class="br_single_news"> <img src="images/friends-tamil-mp3-chat.jpg" alt="" />
                                </div>
                            </div>

                            <div class="hp_banner_left">


                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <div class="br_single_news">
                                                <img alt="" src="images/friends-tamil-mp3-banner.jpg">
                                                <div class="br_cam">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="br_single_news">
                                                <img alt="" src="images/friends-tamil-mp3-banner2.jpg">
                                                <div class="br_cam">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="br_single_news">
                                                <img alt="" src="images/friends-tamil-mp3-banner3.jpg">
                                                <div class="br_cam">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="hp_banner_right">

                                <div class="br_single_news"> <img src="images/friends-tamil-mp3-right-banner.jpg" alt="" />
                                    <div class="br_single_text"> <span class="blue_hp_span">CHAT NOW</span> <a href="#">
                                            <h4>FRIENDS TAMIL MP3 CHAT</h4></a> </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ~~~=| Banner END |=~~~ -->



        <section class="main_news_wrapper cc_single_post_wrapper">
            <div class="container">
                <div class="row">
                    <?php include_once ('left-menu.php'); ?>
                    <div class="col-lg-9 col-md-9">
                        <ng-view></ng-view>
                        <div data-loading class="loading-screen">
                            <div class="loading-icon">
                                <div class="sk-wave">
                                    <div class="sk-rect sk-rect1"></div>
                                    <div class="sk-rect sk-rect2"></div>
                                    <div class="sk-rect sk-rect3"></div>
                                    <div class="sk-rect sk-rect4"></div>
                                    <div class="sk-rect sk-rect5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include ('footer.php'); ?>

    </body>
</html>

