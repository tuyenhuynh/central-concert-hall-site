@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('posters') !!}
    <div class="container">
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
                        <?php $datetime =DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time);
                        ?>
                        <li>
                            <div class="row poster-item" style="border:1px solid #dddddd">
                                <img src= {{$concert->photo_path}} alt="" style="float:left; max-height: 150px; max-width:200px">
                                <div class="concert-poster-detail">
                                    <div class="concert-poster-date-of-month" style="float:left; margin-left: 20px; margin-top:30px">
                                        <h2>{{$datetime->format('d')}}</h2>
                                    </div>
                                    <div class="concert-poster-date-of-week" style="float:left; margin-left:20px; margin-top:30px">
                                        <h5 style="color:#d17581">{{$concert->day_of_week}}</h5>
                                        <h4 style="text-transform: uppercase">{{strtoupper($concert->month) ." ". $datetime->format('Y')}}</h4>
                                    </div>
                                    <div class="concert-poster-name" style="float:left; margin-left:40px; margin-top:35px">
                                        <h3><a href='{{"/afisha/".$concert->name."/".$datetime->format("dmY")}}' >{{$concert->name}}</a></h3>
                                    </div>
                                    <div class="concert-poster-buy-ticket" style="float:right; margin-right:20px; margin-top:50px">
                                        <a href='{{$concert->purchase_code}}' data-toggle="modal" data-target="#myModal" class="btn btn-success btn-purchase" role="button">Билеты</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
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
    <div class="container">
        <div class="row">
            @if($information)
                {{$information->ceo_text}}
            @endif
        </div>
    </div>


@endsection
