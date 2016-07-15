@extends ('layouts.admin')

@section ('content')
    <h2 class="sub-header">Редактировать концерт</h2>
    {!! Form::open(array('action' => 'AdminController@updateConcert', 'method' => "post", 'files' => true )) !!}
    <div class="contact-form" style="margin-top:20px">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('name', 'Название')}}
                    {{ Form::text('name', $concert->name, ['class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле названиетребуется"]) }}
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    {{ Form::label('datetime', 'Дата/Время') }}
                    <div class='input-group date' id='datetimepicker'>
                        {{Form::text('datetime', $concert->datetime, ["class"=>"form-control" , "required"=>'required' , "data-error"=>"Поле дата требуется."])}}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker').datetimepicker({
                        locale:'ru'
                    });
                });
            </script>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('photo', 'Фото') }}
                    {{ Form::file('photo', null, ['class' => 'form-control']) }}
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('thumb_photo', 'Фото афиши') }}
                    {{ Form::file('thumb_photo', null, ['class' => 'form-control'])}}
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('date', 'Аудио') }}
                    {{ Form::file('date', null, ['class' => 'form-control']) }}
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    {{ Form::label('date', 'Описание') }}
                </div>
                <div class="col-md-12">
                    {{ Form::textarea('description', $concert->description , ['class' => 'form-control', 'rows' => 10, "placeholder"=>"Текст", "required"=>"required", "data-error" =>"Поле имя требуется."]) }}
                </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    {{Form::submit('Обновить', ['class' =>'btn btn-success btn-send'])}}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection