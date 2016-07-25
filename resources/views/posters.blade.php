@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            {!! Breadcrumbs::render('posters') !!}
        </div>
        <div class="row poster-header">
            <h3>Aфиша концертов ЦКЗ</h3>
        </div>
        <div></div>
    </div>

    <div class="container">
        <div class="row poster-month">
            <p>Июль 2016</p>
        </div>
        <div class=" row concert-list">
            @if($result)
                @foreach ($result as $concerts)
                    <ul>
                        @if($concerts)
                            @foreach($concerts as $concert)
                                <li>
                                    <div class="row poster-item" style="border:1px solid #dddddd">
                                        <img src= {{$concert->photo_path}} alt="" style="float:left; max-height: 150px; max-width:200px">
                                        <div class="concert-poster-detail">
                                            <div class="concert-poster-date-of-month" style="float:left; margin-left: 20px; margin-top:30px">
                                                <h2>{{$concert->date_time_object->format('d')}}</h2>
                                            </div>
                                            <div class="concert-poster-date-of-week" style="float:left; margin-left:20px; margin-top:30px">
                                                <h5 style="color:#d17581">{{$concert->day_of_week}}</h5>
                                                <h4 style="text-transform: uppercase">{{strtoupper($concert->month) ." ". $concert->date_time_object->format('Y')}}</h4>
                                            </div>
                                            <div class="concert-poster-name" style="float:left; margin-left:40px; margin-top:35px">
                                                <h3><a href='{{"/afisha/".$concert->name."/".$concert->date_time_object->format("dmY")}}' >{{$concert->name}}</a></h3>
                                            </div>
                                            <div class="concert-poster-buy-ticket" style="float:right; margin-right:20px; margin-top:50px">
                                                <button class="btn btn-success btn-purchase" role="button">
                                                    Билеты
                                        <span style="display:none">
                                            {{$concert->purchase_code}}
                                        </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                @endforeach
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if($information)
                {{$information->ceo_text}}
            @endif
        </div>
    </div>


@endsection
