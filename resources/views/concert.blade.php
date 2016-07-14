@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="padding"></div>
        <div class="row path">
            <h5>Главная > Афиша концертов > Lana Del Ray/15072016</h5>
        </div>
    </div>

    <div class="container">
        <div class="row" class="">
            <img class="concert-image" src="http://placehold.it/800x300" alt="">
        </div>
        <div class="row">
            <div>
                <h3 class="inline">Lana Del Rey</h3>
                <p class="inline" style="margin-top: 25px">12+</p>
                <div class="clear-both"></div>
            </div>
            <p style="padding-top:15px;">
                Лайн-ап фестиваля продолжает формироваться и в итоге включит в себя свыше сотни имён различной степени известности. Помимо целой плеяды звёзд финской сцены, событие посетят артисты и команды из разных уголков планеты. Особенно мощным в нынешнем году ожидается британский десант: чего только стоят хедлайнеры в лице легендарных пионеров синти-попа New Order и праотцов трип-хопа Massive Attack. Последние в нынешнем году как раз напомнили о себе свежайшим ЕР Ritual Spirit, а попутно справляют четвертьвековой юбилей дебютной пластинки Blue Lines, так что зрителям следует готовиться к большому ретроспективному сету бристольских гениев.
                <br>
                К соотечественникам присоединятся проект лидера Arctic Monkeys Алекса Тёрнера The Last Shadow Puppets, электронный алхимик Jamie xx, шотландцы Chvrches и другие. Международный парад суперзвёзд, среди прочих, украсят «дедушка» панк-рока Iggy Pop, в марте выпустивший свой 17-й студийник Post Pop Depression; покорительница мировых чартов, австралийская хитмейкер Sia; а также неожиданный диджейский дуэт Wooden Wisdom, в составе которого значится главный спаситель Средиземья Элайджа Вуд.
            </p>
            <div classstyle="concert-detail-time" style="margin-top:15px;">
                <h4>Когда?</h4>
                <p style="color:#d17581">12 июля, 19:00</p>
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
                    <!-- The next two lines are only executed if the browser doesn't support MP4 files -->
                    <!-- <source src="http://media.w3.org/2010/07/bunny/04-Death_Becomes_Fur.oga"
                            type='audio/ogg; codecs=vorbis'> -->
                    <!-- The next line will only be executed if the browser doesn't support the <audio> tag-->
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
    </div>
@endsection()