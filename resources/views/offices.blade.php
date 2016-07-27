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
                <ul>
                    @foreach ($offices as $office)
                        <li class="office">
                            <span class="lat">{{$office->latitude}}</span>
                            <span class="long">{{$office->longtitude}}</span>
                            <span class='office_name'>{{$office->name}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div>
            <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCL-lqH-yssRE616SNDJWf6SyFBmvPCX8Q&v=3.exp'>
            </script>
            <div style='overflow:hidden;height:440px;width:px;'>
                <div id='gmap_canvas' style='height:440px;width:px;'></div>
                <div><small><a href="http://embedgooglemaps.com">embed google maps</a></small></div>
                <div><small><a href="https://termsofusegenerator.net">terms of use generator</a></small></div>
                <style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div>
            <script type='text/javascript'>
                function init_map(){
                    var myOptions = {
                        zoom:12,
                        center:new google.maps.LatLng(48.708048,44.5133034),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                    var offices = $('ul > li.office');
                    var length = offices.length;
                    var markers = [];
                    var infowindows = [];
                    for(var i = 0 ; i< length ; ++i) {
                        var data = offices.eq(i).children();
                        var lat = data.eq(0).html(),
                                long = data.eq(1).html(),
                                name = data.eq(2).html();

                        console.log("lat: " + lat +", long: " + long + " name: " +name);

                        var marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(lat,long)});
                        markers.push(marker);
                        var infowindow = new google.maps.InfoWindow({
                            content:'<strong>' + name + '</strong><br>Volgograd, Russia<br>'});
                        infowindows.push(infowindow);
                        google.maps.event.addListener(
                                marker,
                                'click',
                                function(){
                                    infowindow.open(map,marker);
                                    console.log(marker.position);
                                });
                        infowindow.open(map,marker);
                    }
                }
                google.maps.event.addDomListener(window, 'load', init_map);
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