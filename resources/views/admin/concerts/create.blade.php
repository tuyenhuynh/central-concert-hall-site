@extends ('layouts.admin')

@section ('content')
    <h4 class="sub-header">Добавить концерт</h4>
    <div class="row">
        <div class="col-md-9">
            {!! Form::open(array('action' => 'ConcertController@postCreateConcert', 'method' => "post", 'files' => true , 'data-toggle' =>'validator')) !!}
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Концерт</strong></div>
                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('name', 'Название:', ['class' => 'control-label col-sm-3'])}}
                            <div class="col-sm-9">
                                {{ Form::text('name', null, ['class' => 'form-control', "placeholder"=>"Назвение концерта", "required"=>"required", "data-error" =>"Поле название требуется"]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                     </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('datetime', 'Дата/Время:', ['class' => 'control-label col-sm-3'])}}
                            <div class="col-sm-9">
                                <div class="input-group date" id="datetimepicker">
                                    {{ Form::text('datetime', null , ['class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле Дата/Время требуется"]) }}
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker').datetimepicker({
                                        locale:'ru'
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('photo', 'Фото:', ['class' => 'control-label col-sm-3'])}}
                            <div class="col-sm-9">
                                {{ Form::file('photo', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('audio', 'Аудио:', ['class' => 'control-label col-sm-3'])}}
                            <div class="col-sm-9">
                                {{ Form::file('audio', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('lim_age', 'Ограничение возраста:', ['class' => 'control-label col-sm-3'])}}
                            <div class="col-sm-9">
                                {{ Form::text('lim_age', null, ['pattern' => '^(\d)?\d$', 'class' => 'form-control', "placeholder"=>"16", "required"=>"required", "data-error" =>"Поле Ограничение возраста требуется"]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('purchase_code', 'Код покупки:', ['class' => 'control-label col-sm-3'])}}
                            <div class="col-sm-9">
                                {{ Form::text('purchase_code', null, ['class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле Код покупки требуется"]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('description', 'Код Описание:', ['class' => 'control-label col-sm-3'])}}
                            <div class="col-sm-9">
                                {{ Form::text('description', null, ['data-minlength' => 20, 'class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле Описание требуется"]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="col-md-3 col-md-offset-3">{{Form::submit('Добавить', ['class' =>'btn btn-success btn-send'])}}</div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection