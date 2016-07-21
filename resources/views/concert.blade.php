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
            <?php $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time) ?>
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
                <a class="btn btn-primary btn-purchase" data-toggle="modal" data-target="#myModal" role="button" href='{{$concert->purchase_code}}' style="margin-bottom: 10px">Купить билет</a>
            </div>
            <div class="row conert-text" style="margin-top: 20px">
                @if($information)
                    {{$information->ceo_text}}
                @endif
            </div>
        @endif
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

@endsection()