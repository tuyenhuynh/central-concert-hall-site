@extends('layouts.app')
@section ('title', 'Билетные кассы')
@section('content')
    <div class="container office-container">

        {!! Breadcrumbs::render('offices') !!}
        <div class="poster-header">
            <h3>Кассы продаж</h3>
        </div>
    </div>

    <div class="container office-container">
        <div class="row">
            <div style="display: none">
                <span id="lat">{{$selected_office->latitude}}</span>
                <span id="long">{{$selected_office->longtitude}}</span>
                <span id='office_name'>{{$selected_office->name}}</span>
            </div>
        </div>
        <div>
            <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCL-lqH-yssRE616SNDJWf6SyFBmvPCX8Q'></script>
            <div style='overflow:hidden;height:440px;width:100%;'>
                <div id='gmap_canvas' style='height:440px;width:100%;'></div>
                <div><small><a href="http://embedgooglemaps.com">                                   embed google maps                           </a></small></div>
                <div><small><a href="https://termsandcondiitionssample.com">terms and conditions sample</a></small></div>
                <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
            </div>
            <script type='text/javascript'>
                function init_map(){
                    console.log($("#office_name").html());
                    var myOptions = {   zoom:10,
                        center:new google.maps.LatLng(48.708048,44.513303),
                        mapTypeId: google.maps.MapTypeId.ROADMAP};

                        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                        marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(48.708048,44.513303)});
                        infowindow = new google.maps.InfoWindow({content:'<strong>' + $("#office_name").html() +'</strong><br>Волгоград, Россия<br>'});
                        google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
                        infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
            </script>
        </div>
    </div>
    <div class="container office-container office-list" style="margin-top: 20px">
        <div>
            <h3>Адресы офисов</h3>
            <table class="table table-striped table-bordered" style="margin-top:10px">
                <thead>
                <tr>
                    <th>Название </th>
                    <th>Адрес</th>
                    <th>Режим работы</th>
                </tr>
                </thead>
                <tbody>
                @if($offices)
                    @foreach($offices as $office)
                        <tr>
                            <td>{{$office->name}}</td>
                            <td>{{$office->address}}</td>
                            <td>{{"с " . $office->time_open." до ".$office->time_close}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
 @endsection