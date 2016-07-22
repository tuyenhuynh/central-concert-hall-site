<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Центральный Концерт Зал</title>

        <!-- Bootstrap Core CSS -->
        {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">--}}
        {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">--}}

        <link href="/css/font-awesome.min.css" rel="stylesheet"/>

        <!-- Styles -->
        {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}
        <link rel="stylesheet" href="/css/bootstrap.min.css"/>
        <!-- Custom CSS -->
        <link href="/css/style.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>


    <header id="header" style="position:fixed; top:0px; left: 0;  display: block; width: 100%; z-index: 10000" >
        <div id="top-header" style="height: 56px;background-color:#2DA0DF; width: 100%; display: block; "  >
            <div class='left-top-header' style="margin-left:30px; position: absolute; top: 0px">
                <h1 style="line-height: 50px; margin-top: 0"><a href="" style="color:#000; font-size:30px">ЦКЗ</a></h1>
            </div>
            <div class="right-top-header" style="position:absolute; top:0; right:48px; line-height: 50px">
                <h1 style="float:left; ; font-size:15px; font-weight:400 ; color:#fff">+7 (937) 709 6262</h1>
                <button class="btn btn-success" style="margin-left:20px; font-size: 15px; color:#fff">Купить билет</button>
            </div>
        </div><!--
        <h1><a href="#">Future Imperfect</a></h1> -->
        <nav class="links" style="text-align:center; width: 100%; height: 48px; background-color: #000">
            <ul id="nav">
                <li><a href="/" class="active-link">Главная</a></li>
                <li><a href="/afisha" id="test">Афиша концертов</a></li>
                <li><a href="/biletnye_kassy">Кассы</a></li>
                <li><a href="/hall">Схема зала</a></li>
                <li><a href="/contact">Контакты</a></li>
            </ul>
        </nav>
    </header>
        {{--<!-- Navigation -->--}}
        {{--<nav class="navbar navbar-inverse navbar-fixed-top navbar-custom" role="navigation">--}}
            {{--<div class="container ">--}}
                {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
                {{--<div class="navbar-header">--}}
                    {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">--}}
                        {{--<span class="sr-only">Toggle navigation</span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                    {{--</button>--}}
                    {{--<a class="navbar-brand" href="/index">ЦКЗ</a>--}}
                {{--</div>--}}
                {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
                {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
                    {{--<ul class="nav navbar-right">--}}
                        {{--@if($information)--}}
                            {{--<li class="phone">{{$information->phone_number}}</li>--}}
                            {{--<li><a href='{{$information->default_purchase_code}}' class="btn btn-primary btn-purchase" data-toggle="modal" data-target="#myModal" id="default-purchase-button" role="button">Купить билет</a></li>--}}
                        {{--@endif--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="container">--}}
                    {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
                    {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
                        {{--<ul class="nav nav-justified">--}}
                            {{--<li><a href="/afisha">Афиша концертов</a></li>--}}
                            {{--<li><a href="/biletnye_kassy">Кассы</a></li>--}}
                            {{--<li><a href="/hall">Схема зала</a></li>--}}
                            {{--<li><a href="/contact">Контакты</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<!-- /.navbar-collapse -->--}}
                {{--</div>--}}
                {{--<!-- /.navbar-collapse -->--}}
            {{--</div>--}}
            {{--<!-- /.container -->--}}
        {{--</nav>--}}

        @yield ('content')

        <div class="container" style="bottom:50px">

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row text-center">
                    <div class="col-md-12 text-center social-links" >
                        <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                        <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
                        <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fa fa-vk fa-2x"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12  text-center">
                        <p>&copy;2016 Права на тектовые и другие материалы, размещенные на сайте, охраняются законом</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/app.js"></script>

    </body>

</html>
