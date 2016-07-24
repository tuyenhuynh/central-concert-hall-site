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
                                        <div style="max-width: 350px;  height:200px;">
                                            <img src={{$concert->photo_path}}  height=100%>
                                        </div>
                                        <div class="caption">
                                            <div  style="display: inline; line-height: 2em">
                                                {{--"--}}
                                                <div style="float:left;">
                                                    <a href='{{$concert->link}}'>{{$concert->name}}</a>
                                                </div>
                                                <div>
                                                    {{$concert->lim_age . "+"}}
                                                </div>
                                            </div>
                                            {{--<span><h4 ></h4><div style="display: inline-block"></div></span>--}}

                                            <p>{{$concert->description}}</p>
                                        </div>
                                        <div class="concert-time">
                                            <p>
                                                <span class="glyphicon glyphicon-time" style="margin-right: 10px"></span>
                                                {{$concert->displayed_date_time}}
                                            </p>
                                        </div>
                                        <div class="text-center center-block">
                                            <a class="btn btn-primary btn-purchase" data-toggle="modal" data-target="#myModal" role="button" href='{{$concert->purchase_code}}' style="margin-bottom: 20px">Купить билет</a>
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
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body" style="height: 500px">
                    <iframe src="" style="zoom:0.4" width="100%" height="100%" frameborder="0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->
@endsection
