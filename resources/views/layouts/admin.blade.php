<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ЦКЗ Админский Панель</title>

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
                    <a class="navbar-brand" href="/admin/index">Админский Панель</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Профиль</a></li>
                        <li><a href="#">Справка</a></li>
                        <li><a href="/logout">Выход</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">

                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="/">ЦКЗ<span class="sr-only">(current)</span></a></li>
                        <li><a href="/admin/concerts">Концерты</a></li>
                        <li><a href="/admin/concerts/create">Добавить концерт</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="/admin/offices">Кассы</a></li>
                        <li><a href="/admin/offices/create">Добавить кассу</a></li>

                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="/admin/schema_text">CEO текст</a></li>
                        <li><a href="/admin/feedbacks">Обратная связь</a></li>
                        <li><a href="/admin/about">О проекте</a></li>
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
    </body>
</html>