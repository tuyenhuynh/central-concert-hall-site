<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>ЦКЗ Админская Панель</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/css/admin/bootstrap-datepicker.css"/>
        <!-- Styles -->
        <link href="/css/admin/style.css" rel="stylesheet">
        {{--JS--}}
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/admin/moment-with-locales.js"></script>
        <script type="text/javascript" src="/js/admin/boostrap-datetimepicker.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">ЦКЗ САЙТ</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/logout">Выход</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="/admin" >Админская панель<span class="sr-only">(current)</span></a></li>
                        <li><a href="/admin/concerts">Концерты</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="/admin/offices">Кассы</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="/admin/users">Пользователь</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="/admin/feedbacks">Обратная связь</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="/admin#form-phone-number">Контактный телефон</a></li>
                        <li><a href="/admin#form-default-purchase-code">Код покупки по умолчанию</a></li>
                        <li><a href="/admin#form-company-info">О проекте</a></li>
                        <li><a href="/admin#form-hall-schema">Схема зала</a></li>
                        <li><a href="/admin#form-hall-text">Текст после схемы</a></li>
                        <li><a href="/admin#form-ceo-text">СЕО Текст</a></li>
                        <li><a href="/admin#form-office-location">Позиция на карте</a></li>
                        <li><a href="/admin#form-social-network">Социальная сеть</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/admin/admin.js"></script>
        <script type="text/javascript" src='/js/validator.min.js'></script>
        <script>
            $(document).ready(function (){
                var url = window.location.href;
                $('ul.nav li a').each(function(){
                    if(url == this.href) {
                        $(this).parent().addClass('active');
                    }
                });
                $('ul.nav li a').click(function(){
                    $('ul.nav li a').each(function(){
                        $(this).parent().removeClass('active');
                    });
                    $(this).parent().addClass('active');
                });
            });
        </script>
    </body>
</html>