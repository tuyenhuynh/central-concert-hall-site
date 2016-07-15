@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="padding"></div>
        <div class="row path">
            <h5>Главная > Афиша концертов</h5>
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
        <div class="concert-list">
            <ul>
                @if($concerts)
                    @foreach($concerts as $concert)
                        <?php $datetime =DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time) ?>
                        <li>
                            <div class="row poster-item" style="border:1px solid #dddddd">
                                <img src= {{$concert->photo->path}} alt="" style="float:left; max-height: 150px; max-width:200px">
                                <div class="concert-poster-detail">
                                    <div class="concert-poster-date-of-month" style="float:left; margin-left: 20px; margin-top:30px">
                                        <h2>{{$datetime->format('d')}}</h2>
                                    </div>
                                    <div class="concert-poster-date-of-week" style="float:left; margin-left:20px; margin-top:30px">
                                        <h5 style="color:#d17581">{{$datetime->format('D')}}</h5>
                                        <h4>{{$datetime->format('m Y')}}</h4>
                                    </div>
                                    <div class="concert-poster-name" style="float:left; margin-left:40px; margin-top:35px">
                                        <h3><a href={{"/concerts/".$concert->id}}>{{$concert->name}}</a></h3>
                                    </div>
                                    <div class="concert-poster-buy-ticket" style="float:right; margin-right:20px; margin-top:50px">
                                        <a href="#" class="btn btn-success" role="button">Билеты</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
    </div>
@endsection
