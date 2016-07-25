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

        <script type="text/javascript" src="/js/jquery.js"></script>
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
                    <button type="button" class="btn btn-success btn-purchase">Купить билет
                        <span style="display:none">
                            {{--{{$information->default_purchase_code}}--}}
                            https://vlg.kassir.ru/kassir/action/view/5155?iframedomain=volgocirk.ru
                        </span>
                    </button>
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
        <div id="popup">
            <div class="content">
                <iframe id ='ticket_frame' src="" style="zoom:0.5;" width="100%" height="100%" frameborder="0" ></iframe>
                <img src="/images/close.png" onclick="hide_frame()" style="position: absolute; right: -16px;top: -16px; cursor: pointer">
            </div>
        </div>
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
        <script>
            $('button.btn-purchase').click(function(){
                var url = $(this).children('span').html();
                $('iframe#ticket_frame').attr('src', url);
                $('#popup').removeClass('hide1').addClass('show');
            });
            $('button.btn-close').click(function(){
                hide_frame();
            });
            function hide_frame() {
                $('#popup').removeClass('show').addClass('hide1');
            }

        </script>
        <!-- /.container -->

        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/app.js"></script>
        <script type="text/javascript" src='/js/validator.min.js'></script>

    </body>

</html>
