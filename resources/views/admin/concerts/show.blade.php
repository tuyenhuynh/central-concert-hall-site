@extends ('layouts.admin')

@section ('content')
    @if($concert)
        <?php $date_time =DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time)->format('D d-m-Y H:i')?>
        <h4 class="sub-header">Концерт</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>{{$concert->name}}</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-2">
                                    <strong>Дата/Время:</strong>
                                </div>
                                <div class="col-sm-10">
                                    {{$date_time}}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-2">
                                    <strong>Фото</strong>
                                </div>
                                <div class="col-sm-10">
                                    <img src='{{$concert->photo_path}}' style="width: 80%;"/>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-2">
                                    <strong>Аудио:</strong>
                                </div>
                                <div class="col-sm-10">
                                    <audio controls style="width: 80%">
                                        <source src="/audio/west-coast.mp3"
                                                type='audio/mp3'>
                                        <p>Your user agent does not support the HTML5 Audio element.</p>
                                    </audio>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-2">
                                    <strong>Ограничение возраста</strong>
                                </div>
                                <div class="col-sm-10">
                                    <em>{{$concert->lim_age}}</em>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-2">
                                    <strong>Код покупка</strong>
                                </div>
                                <div class="col-sm-10">
                                    <a href="{{$concert->purchase_code}}">{{$concert->purchase_code}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-2">
                                    <strong>Описание</strong>
                                </div>
                                <div class="col-sm-10">
                                    <p style="width: 90%">
                                        {{$concert->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <a href={{"/admin/concerts/".$concert->id."/edit"}}  role="button" class="btn btn-primary" style="border-bottom: 20px">Редактировать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    {{--<div class="view-concert" style="margin-top:20px">--}}
        {{--<div class="row">--}}
            {{--<div class='col-sm-3'>--}}
                {{--<label>Фото</label>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6">--}}
                {{--<img src={{$concert->photo_path}} style="max-width:550px"/>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class='col-sm-3'>--}}
                {{--<label>Аудио</label>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6">--}}
                {{--<audio controls style="width: 100%">--}}
                    {{--<source src="/audio/west-coast.mp3"--}}
                            {{--type='audio/mp3'>--}}
                    {{--<p>Your user agent does not support the HTML5 Audio element.</p>--}}
                {{--</audio>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class='col-sm-3'>--}}
                {{--<label>Количество зрителей</label>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6">--}}
                {{--<label>{{$concert->audience_count}}</label>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class='col-sm-3'>--}}
                {{--<label>Код покупки</label>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6">--}}
                {{--<label>{{$concert->purchase_code}}</label>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="form-group">--}}
                {{--<div class="col-md-6">--}}
                    {{--{{ Form::label('date', 'Описание') }}--}}
                {{--</div>--}}
                {{--{{ Form::textarea('description', $concert->description , ['class' => 'form-control', 'rows' => 10]) }}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    @endif
@endsection