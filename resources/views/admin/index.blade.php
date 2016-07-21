@extends('layouts.admin')

@section('content')

    <h2 class="sub-header">Администрация</h2>

    @if($information)


        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('phone_number', 'Контактный телефон')}}
                        {{ Form::text('phone_number', $information->phone_number, ['class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле контактный телефон требуется"]) }}
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <button class="btn btn-success" id="btn-update-telephone" >Сохранить</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('default_purchase_code', 'Код покупки по умолчанию')}}
                        {{ Form::text('default_purchase_code', $information->default_purchase_code, ['class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле контактный телефон требуется"]) }}
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <button class="btn btn-success" id="btn-update-default-purchase-code" >Сохранить</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        {{ Form::label('company_info', 'О проекте')}}
                        {{ Form::textarea('company_info', $information->company_info, ['rows' => 10, 'class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле контактный телефон требуется"]) }}
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <button class="btn btn-success" id="btn-update-company-info" >Сохранить</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top:30px">
            {!! Form::open(array('id' => 'form-upload-schema', 'action' => 'AdminController@updateHallSchema' ,  'method' => "post", 'files' => true )) !!}
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            {{ Form::label('hall_schema', 'Схема зала')}}
                            {{ Form::file('hall_schema', null, ['class' => 'form-control', "required"=>"required", "data-error" =>"Поле контактный телефон требуется"]) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <button type= "submit" class="btn btn-success" id="btn-update-hall-schema" >Сохранить</button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>

        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        {{ Form::label('hall_text', 'Текст после схемы зала')}}
                        {{ Form::textarea('hall_text', $information->hall_text, ['rows' => 10, 'class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле контактный телефон требуется"]) }}
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <button class="btn btn-success" id="btn-update-hall-text" >Сохранить</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        {{ Form::label('ceo_text', 'СЕО текст')}}
                        {{ Form::textarea('ceo_text', $information->ceo_text, ['rows' => 10, 'class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле контактный телефон требуется"]) }}
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <button class="btn btn-success" id="btn-update-ceo-text" >Сохранить</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        {{ Form::label('office_location', 'Позиция на карте')}}
                        {{ Form::textarea('office_location', $information->office_location, ['rows' => 5, 'class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле контактный телефон требуется"]) }}
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <button class="btn btn-success" id="btn-update-office-location" >Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });

        var token = $('meta[name="csrf-token"]').attr('content');

        $('#btn-update-telephone').click(function(e){
            e.preventDefault();

            var phone_number = $('#phone_number').val();

            console.log(phone_number);
            console.log(token);
            $.ajax({
                url:'/admin/update_phone_number',
                type:'POST',
                data: {
                    'phone_number': phone_number,
                    '_token': token
                }, success: function(data){
                    alert(data);
                }
            });
        });

        $('#btn-update-default-purchase-code').click(function(e){
            e.preventDefault();

            var default_purchase_code = $('#default_purchase_code').val();
            $.ajax({
                url:'/admin/update_default_purchase_code',
                type:'POST',
                data: {
                    'default_purchase_code': default_purchase_code,
                    '_token': token
                }, success: function(data){
                    alert(data);
                }
            });
        });

        $('#btn-update-company-info').click(function(e){
            e.preventDefault();

            var company_info = $('#company_info').val();
            console.log(token);
            $.ajax({
                url:'/admin/update_company_info',
                type:'POST',
                data: {
                    'company_info': company_info,
                    '_token': token
                }, success: function(data){
                    alert(data);
                }
            });
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

        $('#btn-update-hall-text').click(function(e){
            e.preventDefault();

            var hall_text = $('#hall_text').val();
            $.ajax({
                url:'/admin/update_hall_text',
                type:'POST',
                data: {
                    'hall_text': hall_text,
                    '_token': token
                }, success: function(data){
                    alert(data);
                }
            });
        });

        $('#btn-update-ceo-text').click(function(e){
            e.preventDefault();

            var ceo_text = $('#ceo_text').val();
            console.log('ceo_text');
            $.ajax({
                url:'/admin/update_ceo_text',
                type:'POST',
                data: {
                    'ceo_text': ceo_text,
                    '_token': token
                }, success: function(data){
                    console.log(data);
                }
            });
        });

        $('#btn-update-office-location').click(function(e){
            e.preventDefault();

            var office_location = $('#office_location').val();
            $.ajax({
                url:'/admin/update_office_location',
                type:'POST',
                data: {
                    'office_location': office_location,
                    '_token': token
                }, success: function(data){
                    alert(data);
                }
            });
        });

    </script>


@endsection