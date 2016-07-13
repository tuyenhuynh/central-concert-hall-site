@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="padding"></div>
        <div class="row path">
            <h5>Главная > Кассы</h5>
        </div>
        <div class="row poster-header">
            <h3>Кассы продаж</h3>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div id="map" class="map" style="width: 100%; height:400px">
                <script>
                    function initMap (){
                        var mapDiv = document.getElementById('map');
                        var map = new google.maps.Map(mapDiv, {
                            center:{lat: 48.70784, lng: 44.50572},
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
    <div class="container office-list" style="margin-top: 20px">
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
            <tr>
                <td>Ленина 41, Пегас Туристик</td>
                <td>Ленина 51</td>
                <td>с 8:00 до 19:00</td>
            </tr>
            <tr>
                <td>Ленина 41, Пегас Туристик</td>
                <td>Ленина 51</td>
                <td>с 8:00 до 19:00</td>
            </tr>
            <tr>
                <td>Ленина 41, Пегас Туристик</td>
                <td>Ленина 51</td>
                <td>с 8:00 до 19:00</td>
            </tr>
            </tbody>
        </table>
    </div>
 @endsection