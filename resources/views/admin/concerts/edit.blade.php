@extends ('layouts.admin')

@section ('content')
    <h4 class="sub-header">Редактировать концерт</h4>
    @if($concert)
        <div style="padding-bottom: 20px">
            <a href={{"/admin/concerts/".$concert->id}}  role="button" class="btn btn-primary"  >Отображать</a>
            <a href={{"/admin/concerts/"}}  role="button" class="btn btn-primary"  >Список концертов</a>
        </div>
        <div class="row">
            <div class="col-md-9">
                {!! Form::open(array('route' =>  ['admin.concerts.update', $concert->id], 'method' => "put", 'files' => true , 'data-toggle' =>'validator')) !!}
                {{Form::hidden('id', $concert->id)}}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Концерт</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('name', 'Название:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('name', $concert->name, ['class' => 'form-control', "placeholder"=>"Назвение концерта", "required"=>"required", "data-error" =>"Поле название требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('datetime', 'Дата/Время:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    <div class="input-group date" id="datetimepicker">
                                        {{ Form::text('datetime', $concert->date_time , ['class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле Дата/Время требуется"]) }}
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
                                    {{ Form::text('lim_age', $concert->lim_age, ['pattern' => '^(\d)?\d$', 'class' => 'form-control', "placeholder"=>"16", "required"=>"required", "data-error" =>"Поле Ограничение возраста требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('purchase_code', 'Код покупки:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('purchase_code', $concert->purchase_code, ['class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле Код покупки требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('description', 'Код Описание:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::textarea('description', $concert->description, ['rows' => 10, 'data-minlength' => 20, 'class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле Описание требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-md-3 col-md-offset-3">{{Form::submit('Сохранить', ['class' =>'btn btn-success btn-send'])}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    @endif

@endsection