@extends('layouts.app')

@section('content')
    <div class="container office-container">
        <div class="row">
            {!! Breadcrumbs::render('offices') !!}
        </div>
        <div class="row poster-header">
            <h3>Кассы продаж</h3>
        </div>
    </div>

    <div class="container office-container">
        <div class="row">
            <div style="display: none">
                <span id="lat">{{$selected_office->latitude}}</span>
                <span id="long">{{$selected_office->longtitude}}</span>
            </div>
        </div>
        <div class="row">
            <div id="map" class="map" style="width: 100%; height:400px">
                <script>
                    function initMap (){
                        var mapDiv = document.getElementById('map');
                        var map = new google.maps.Map(mapDiv, {
                            center:{lat: $('#lat').html(), lng: $('#long').html()},
                            zoom: 8
                        }) ;
                    }
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL-lqH-yssRE616SNDJWf6SyFBmvPCX8Q&callback=initMap">
                </script>
            </div>
        </div>
    </div>
    <div class="container office-container office-list" style="margin-top: 20px">
        <div class="row">
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