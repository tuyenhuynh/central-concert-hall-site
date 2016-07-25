@extends('layouts.app')

@section('content')
<div class="container">
    <div class="padding"></div>
    <div class="row current-month">
        <h4 style="font-weight: 400;" class="current-month"></h4>
    </div>
    <div></div>
</div>

<div class="container poster-date">
    <div class="row" style="float: none; margin: 0 auto;" >
        <div class="col-md-12 col-xs-12 col-centered">
            <a class="left" id="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <ul id="dates">
                <li class="date"><button class= "btn btn-default" >ПН<br>11</button></li>
                <li class="date"><button class= "btn btn-default" >ПН<br>11</button></li>
                <li class="date"><button class= "btn btn-default" >ПН<br>11</button></li>
                <li class="date"><button class= "btn btn-default" >ПН<br>11</button></li>
                <li class="date"><button class= "btn btn-default" >ПН<br>11</button></li>
                <li class="date"><button class= "btn btn-default" >ПН<br>11</button></li>
                <li class="date"><button class= "btn btn-default" >ПН<br>11</button></li>
                <li class="date"><button class= "btn btn-default" >ПН<br>11</button></li>
                <li class="date"><button class= "btn btn-default" >ПН<br>11</button></li>
                <li class="date"><button class= "btn btn-default" >ПН<br>11</button></li>
                <li class="date"><button class= "btn btn-default" >ПН<br>11</button></li>
            </ul>
            <a class="right" style="margin-left:20px" id="next">
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
                <ul id="concerts">
                    @if($concerts)
                        @foreach($concerts as $concert)
                            <li>
                                <div class="col-sm-4 col-lg-4 col-md-4">
                                    <div class="thumbnail">
                                        <div>
                                            <img src={{$concert->photo_path}}  height=100%>
                                        </div>
                                        <div class="caption">
                                            <div>
                                                <h4><a href='{{$concert->link}}'>{{$concert->name}}</a>
                                                </h4>
                                                <h4> {{$concert->lim_age . "+"}}</h4>
                                            </div>

                                            <p>{{$concert->description}}</p>
                                        </div>
                                        <div class="concert-time">
                                            <p>
                                                <span class="glyphicon glyphicon-time" style="margin-right: 5px"></span>
                                                {{$concert->displayed_date_time}}
                                            </p>
                                        </div>
                                        <div class="text-center center-block">
                                            <button class="btn btn-primary btn-purchase" type="button"  style="margin-bottom: 20px">Купить билет
                                                <span style="display: none">{{$concert->purchase_code}}</span>
                                            </button>
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
