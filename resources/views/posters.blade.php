@extends('layouts.app')

@section('title', 'Афиша концертов ЦКЗ')

@section('content')
    <div class="container">
        <div>
            {!! Breadcrumbs::render('posters') !!}
        </div>
        <div class="poster-header">
            <h3>Aфиша концертов ЦКЗ</h3>
        </div>
        <div></div>
    </div>

    <div class="container">
        <div class=" row concert-list">
            @if($result)
                @foreach ($result as $concerts)
                    <ul>
                        @if($concerts)
                            <?php
                            $month_and_year = $concerts[0]->month ." " .  $concerts[0]->date_time_object->format('Y');
                            ?>
                            <div class="row month-and-year">
                                <h4>{{$month_and_year}}</h4>
                            </div>
                            @foreach($concerts as $concert)
                                <li>
                                    <div class="row poster-item">
                                        <img src= {{$concert->photo_path}} alt="" class="poster-image">
                                        <div class="concert-poster-detail">
                                            <div class="poster-date-of-month">
                                                <h2>{{$concert->date_time_object->format('d')}}</h2>
                                            </div>
                                            <div class="poster-date-of-week">
                                                <h5>{{$concert->day_of_week}}</h5>
                                                <h4>{{$concert->month." ". $concert->date_time_object->format('Y')}}</h4>
                                            </div>
                                            <div class="poster-name">
                                                <h3><a href='{{"/afisha/".$concert->name."/".$concert->date_time_object->format("dmY")}}' >{{$concert->name}}</a></h3>
                                            </div>
                                            <div class="poster-ticket-link">
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
        <div class="seo-text">
            @if($information)
                {{$information->ceo_text}}
            @endif
        </div>
    </div>


@endsection
