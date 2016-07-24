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
        <link href="/css/font-awesome.min.css" rel="stylesheet"/>

        <!-- Styles -->
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


    <header id="header" >
        <div id="top-header"  >
            <div class='left-top-header'>
                <h1><a href="/index">ЦКЗ</a></h1>
            </div>
            @if($information)
                <div class="right-top-header">
                    <h1>{{$information->phone_number}}</h1>
                    <a role="button" href='{{$information->default_purchase_code}}' class="btn btn-success btn-purchase">Купить билет</a>
                </div>
            @endif
        </div><!--
        <h1><a href="#">Future Imperfect</a></h1> -->
        <nav class="links">
            <ul id="nav">
                <li><a href="/index">Главная</a></li>
                <li><a href="/afisha">Афиша концертов</a></li>
                <li><a href="/biletnye_kassy">Кассы</a></li>
                <li><a href="/hall">Схема зала</a></li>
                <li><a href="/contact">Контакты</a></li>
            </ul>
        </nav>
    </header>


        @yield ('content')

        <div class="container">

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row text-center">
                    <div class="col-md-12 text-center social-links" >
                        <a href='{{$information->twitter_url}}'><i class="fa fa-twitter fa-2x"></i></a>
                        <a href="{{$information->instagram_url}}"><i class="fa fa-instagram fa-2x"></i></a>
                        <a href="{{$information->facebook_url}}"><i class="fa fa-facebook fa-2x"></i></a>
                        <a href="{{$information->vk_url}}"><i class="fa fa-vk fa-2x"></i></a>
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
        <script type="text/javascript" src='/js/validator.min.js'></script>

    </body>

</html>
