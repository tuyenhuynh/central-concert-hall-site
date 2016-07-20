@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="padding"></div>
        <div class="row path">
            <h5>Главная > Афиша концертов > Lana Del Ray/15072016</h5>
        </div>
    </div>

    <div class="container">
        @if($concert)
            <div class="row" class="">
                <img class="concert-image" src={{$concert->photo_path}} alt="">
            </div>
            <div class="row">
                <div>
                    <h3 class="inline">{{$concert->name}}</h3>
                    <p class="inline" style="margin-top: 25px">{{$concert->audience_count}}</p>
                    <div class="clear-both"></div>
                </div>
                <p style="padding-top:15px;">
                    {{$concert->description}}
                </p>
                <div classstyle="concert-detail-time" style="margin-top:15px;">
                    <h4>Когда?</h4>
                    <p style="color:#d17581">{{DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time)->format('d/m/Y, H:i')}}</p>
                </div>
            </div>
            <div class="row audio" style="margin-top:20px">
                <div class="col-md-1">
                    <span class="glyphicon glyphicon-music"></span>
                </div>
                <div class="col-md-3">
                    Untraviolence - Lana del Rey
                </div>
                <div class="col-md-8">
                    <audio controls style="width: 100%">
                        <source src="/audio/west-coast.mp3"
                                type='audio/mp3'>
                        <p>Your user agent does not support the HTML5 Audio element.</p>
                    </audio>
                </div>
            </div>
            <div class="row buy-ticket text-center" style="margin-top:30px">
                <a href="#" class="btn btn-success" role="button">Купить билет</a>
            </div>
            <div class="row conert-text" style="margin-top: 20px">
                CEO Tекст
            </div>
        @endif

    </div>
@endsection()