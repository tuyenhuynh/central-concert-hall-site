@extends('layouts.app')

@section ('title', $concert->name ."/".$concert->date_code.'в Центральном концертном зале');

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('concert', $concert) !!}
    </div>

    <div class="container">
        @if($concert)
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <img class="single-concert-image" src={{$concert->photo_path}} alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="display:inline-block;" >
                    <h3 class="inline" style="float:left; margin-right: 30px"><a href="{{$concert->link}}">{{$concert->name}}</a></h3>
                    <h5 style="position:relative; top: 15px;">{{$concert->lim_age}}+</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <p style="padding-top:15px;">
                        {{$concert->description}}
                    </p>
                    <div class="concert-detail-time">
                        <h4>Когда?</h4>
                        <p style="color:#d17581">{{$concert->displayed_date_time}}</p>
                    </div>
                </div>
            </div>
            <div class="row audio">
                <div class="col-md-offset-1 col-md-10">
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
            </div>
            <div class="row buy-ticket text-center" style="margin-top:30px">
                <button class="btn btn-primary btn-purchase" type="button" style="margin-bottom: 10px">Купить билет
                    <span style="display: none">{{$concert->purchase_code}}</span>
                </button>
            </div>
            <div class="row seo-text">
                <div class="col-md-10 col-md-offset-1">
                    @if($information)
                        {{$information->ceo_text}}
                    @endif
                </div>
            </div>

        @endif
    </div>

@endsection