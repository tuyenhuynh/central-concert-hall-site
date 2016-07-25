@extends('layouts.admin')

@section('content')

    <h4 class="sub-header">Администрация</h4>

    @if($information)

        <div class="row">
            <div class="col-md-10">
                {!! Form::open(array('method' => "post" , 'id'=>'form-phone-number', 'data-toggle'=>"validator")) !!}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Редактировать контактный телефон</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('phone_number', 'Контактный телефон:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('phone_number', $information->phone_number, ['class' => 'form-control', "placeholder"=>"+7 (84 42) 36 12 73", "required"=>"required", "data-error" =>"Поле контактный телефон требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-9 col-sm-offset-3">
                                    {{Form::submit('Сохранить', ['class' =>'btn btn-success btn-send'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                {!! Form::open(array('method' => "post" , 'id'=>'form-default-purchase-code', 'data-toggle'=>"validator")) !!}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Редактировать код покупки по умолчанию</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('default_purchase_code', 'Код покупки по умолчанию:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('default_purchase_code', $information->default_purchase_code, ['class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Код покупки по умолчанию"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-9 col-sm-offset-3">
                                    {{Form::submit('Сохранить', ['class' =>'btn btn-success btn-send'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                {!! Form::open(array('method' => "post" , 'id'=>'form-company-info', 'data-toggle'=>"validator")) !!}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Редактировать информацию о проекте</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('company_info', 'О проекте:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::textarea('company_info', $information->company_info, ['rows'=> 20, 'class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"О проекте требуестя"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-9 col-sm-offset-3">
                                    {{Form::submit('Сохранить', ['class' =>'btn btn-success btn-send'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                {!! Form::open(array(  'id' =>'form-hall-schema', 'action' => 'AdminController@updateHallSchema' , 'method' => "post", 'files' => true )) !!}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Загрузить новую схему</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('hall_schema', 'Схема зала:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::file('hall_schema', null, ['class' => 'form-control', "required"=>"required", "data-error" =>"Схема не загружена"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-9 col-sm-offset-3">
                                    {{Form::submit('Сохранить', ['class' =>'btn btn-success btn-send'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                {!! Form::open(array( 'id' =>'form-hall-text', 'method' => "post", 'files' => true , 'data-toggle'=>"validator")) !!}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Текст после схемы зала</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('hall_text', 'Текст после схемы зала:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::textarea('hall_text', $information->hall_text, ['rows' => 10, 'class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле Текст после схемы зала требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-9 col-sm-offset-3">
                                    {{Form::submit('Сохранить', ['class' =>'btn btn-success btn-send'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                {!! Form::open(array('id' =>'form-ceo-text',  'method' => "post", 'files' => true , 'data-toggle'=>"validator")) !!}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>СЕО текст</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('ceo_text', 'СЕО текст:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::textarea('ceo_text', $information->hall_text, ['rows' => 10, 'class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле СЕО текст требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-9 col-sm-offset-3">
                                    {{Form::submit('Сохранить', ['class' =>'btn btn-success btn-send'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                {!! Form::open(array( 'method' => "post", 'id' => 'form-office-location' , 'files' => true , 'data-toggle'=>"validator")) !!}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Позиция на карте</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('office_location', 'Позиция на карте:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    <select name="office_location" id="office_location" class="form-control" required ="required" data-error="Поле позиция на карте текст требуется" >
                                        @foreach ($offices as $office)
                                            <option value="{{$office->id}}">{{$office->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-9 col-sm-offset-3">
                                    {{Form::submit('Сохранить', ['class' =>'btn btn-success btn-send'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                {!! Form::open(array('method' => "post" , 'id'=>'form-social-network', 'data-toggle'=>"validator")) !!}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Социальная сеть</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('facebook_url', 'Facebook:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('facebook_url', $information->facebook_url, ['class' => 'form-control', "placeholder"=>"facebook.com", "required"=>"required", "data-error" =>"Поле facebook требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('vk_url', 'VKontakte:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('vk_url', $information->vk_url, ['class' => 'form-control', "placeholder"=>"vk.com", "required"=>"required", "data-error" =>"Поле VKontakte требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('twitter_url', 'Twitter:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('twitter_url', $information->twitter_url, ['class' => 'form-control', "placeholder"=>"twitter.com", "required"=>"required", "data-error" =>"Поле Twitter требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('instagram_url', 'Instagram:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('instagram_url', $information->instagram_url, ['class' => 'form-control', "placeholder"=>"instagram.com", "required"=>"required", "data-error" =>"Поле Instagram требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-9 col-sm-offset-3">
                                    {{Form::submit('Сохранить', ['class' =>'btn btn-success btn-send'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    @endif


    <script type="text/javascript">

        $(document).ready(function() {
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                    }
                });
            });

            var token = $('meta[name="csrf-token"]').attr('content');

            var  ajaxPostText = function(_data, url) {
                $.ajax({
                    url:url,
                    type:'POST',
                    data: _data ,
                    success: function(data){
                        alert(data);
                    }
                });
            };

            $('#form-phone-number').submit(function(e){
                e.preventDefault();
                var phone_number = $('#phone_number').val();
                ajaxPostText({'phone_number': phone_number, '_token': token}, '/admin/update_phone_number');
            });

            $('#form-default-purchase-code').submit(function(e){
                e.preventDefault();
                var default_purchase_code = $('#default_purchase_code').val();
                ajaxPostText({
                    'default_purchase_code': default_purchase_code,
                    '_token': token
                }, '/admin/update_default_purchase_code')
            });


            $('#form-company-info').submit(function(e){
                e.preventDefault();

                var company_info = $('#company_info').val();
                ajaxPostText({
                    'company_info': company_info,
                    '_token': token
                }, '/admin/update_company_info');
            });

            $('#form-hall-text').submit( function(e){
                e.preventDefault();

                var hall_text = $('#hall_text').val();
                ajaxPostText({
                    'hall_text': hall_text,
                    '_token': token
                }, '/admin/update_hall_text');
            });

            $('#form-ceo-text').submit(function(e){
                e.preventDefault();

                var ceo_text = $('#ceo_text').val();
                ajaxPostText({
                    'ceo_text': ceo_text,
                    '_token': token
                }, '/admin/update_ceo_text');

            });

            $('#form-office-location').submit(function(e){
                e.preventDefault();

                var office_location = $('#office_location option').filter(":selected").text();

                ajaxPostText({
                    'office_location': office_location,
                    '_token': token
                }, '/admin/update_office_location');
            });

            $('#form-social-network').submit(function(e){
                e.preventDefault();
                var facebook_url =  $('#facebook_url').val();
                var vk_url =  $('#vk_url').val();
                var twitter_url =  $('#twitter_url').val();
                var instagram_url =  $('#instagram_url').val();

                console.log(token);
                ajaxPostText({
                    'facebook_url': facebook_url,
                    'vk_url': vk_url,
                    'twitter_url': twitter_url,
                    'instagram_url': instagram_url,
                    '_token': token
                }, '/admin/update-social-network-link');
            });

//
//        $('#btn-update-hall-schema').click(function(e){
//            e.preventDefault();
//
//            var hall_schema = $('#hall_schema').val();
//            $.ajax({
//                url:'/admin/update_hall_schema',
//                type:'POST',
//                data: {
//                    'schema': new FormData($("#hall")[0]),
//                    '_token': token
//                }, success: function(data){
//                    alert(data);
//                }
//            });
//        });
//
//        $('#form-upload-schema1').on('submit', function (e) {
//            var url = "/admin/update_hall_schema";
//            $.ajax({
//                type: "POST",
//                url: url,
//                data: {
//                    'photo' : new FormData::($('#form-upload-schema')[0]),
//                    '_token': token
//                },
//                success: function (data)
//                {
//                    if(data == 'ok') {
//                        alert(data);
//                    }else {
//                        alert('failed');
//                    }
//                }
//            });
//        })

        });
    </script>


@endsection