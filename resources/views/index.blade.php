@extends('layouts.app')

@section('content')
<div class="container">
    <div class="padding"></div>
    <div class="row poster-header">
        <h3>Aфиша ЦКЗ на Сентябрь</h3>
    </div>
    <div></div>
</div>

<div class="container poster-date">
    <div class="row" style="float: none; margin: 0 auto;" >
        <div class="col-md-12 col-xs-12 col-centered">
            <a class="left" href="#" style="margin-top:30px; margin-left:30px">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <ul>
                <li class="date"><a class= "btn btn-default" role="button"  href="/afisha">ПН<br>1</a></li>
                <li class="date"><a class= "btn btn-default" role="button" href="/afisha">ВТ<br>2</a></li>
                <li class="date"><a class= "btn btn-default" role="button"  href="/afisha">СР<br>3</a></li>
                <li class="date"><a class= "btn btn-success" role="button" href="/afisha">ЧТ<br>4</a></li>
                <li class="date"><a class= "btn btn-default" role="button" href="/afisha">ПН<br>5</a></li>
                <li class="date"><a class= "btn btn-grey" role="button" href="/afisha">СБ<br>6</a></li>
                <li class="date"><a class= "btn btn-grey" role="button" href="/afisha">ВК<br>7</a></li>
                <li class="date"><a class= "btn btn-default" role="button" href="/afisha">ПН<br>8</a></li>
                <li class="date"><a class= "btn btn-default" role="button" href="/afisha">ВТ<br>9</a></li>
                <li class="date"><a class= "btn btn-default" role="button" href="/afisha">СР<br>10</a></li>
                <li class="date"><a class= "btn btn-default" role="button" href="/afisha">ПН<br>11</a></li>
            </ul>
            <a class="right" href="#" style="margin-left:20px">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>

    </div>
</div>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="row">
                <ul>
                    @if($concerts)
                        @foreach($concerts as $concert)
                            <li>
                                <div class="col-sm-4 col-lg-4 col-md-4">
                                    <div class="thumbnail">
                                        <div style="max-width: 350px;  height:200px;">
                                            <img src={{$concert->photo->path}}  height=100%>
                                        </div>
                                        <div class="caption">
                                            <h4 class="pull-right"> {{$concert->audience_count . "+"}}</h4>
                                            <h4><a href={{"/concerts/".$concert->id}}>{{$concert->name}}</a>
                                            </h4>
                                            <p>{{$concert->description}}</p>
                                        </div>
                                        <div class="concert-time">
                                            <p>
                                                <span class="glyphicon glyphicon-time"></span>
                                                {{DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time)->format('d/m/Y, H:i')}}
                                            </p>
                                        </div>
                                        <div class="text-center center-block">
                                            <a class="btn btn-primary" role="button" href="#" style="margin-bottom: 10px">Купить билет</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif

                </ul>
            </div>

        </div>

    </div>

</div>
<!-- /.container -->
@endsection
