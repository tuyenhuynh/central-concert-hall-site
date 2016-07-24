@extends ('layouts.admin')

@section ('content')
    <h4 class="sub-header">Редактировать кассу</h4>
    @if($office)
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(array('route' => ['admin.offices.update', $office->id], 'method' => "put" , 'data-toggle'=>"validator")) !!}
                {{Form::hidden('id', $office->id)}}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Касса</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('name', 'Название:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('name', $office->name, ['class' => 'form-control', "placeholder"=>"Краснознаменская Улица 7", "required"=>"required", "data-error" =>"Поле название требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('address', 'Адрес:', ['class' => 'control-label col-sm-3'])}}
                                <div class="col-md-9">
                                    {{ Form::text('address', $office->address, ['class' => 'form-control', "placeholder"=>"Краснознаменская Улица 7", "required"=>"required", "data-error" =>"Поле адрес требуется"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('time_open', 'Время открыта:', ['class' => 'control-label col-sm-3']) }}
                                <div class="col-md-9">
                                    {{ Form::text('time_open', $office->time_open, ['pattern' => '^\d\d:\d\d$', 'class' => 'form-control', "placeholder"=>"08:30", "required"=>"required", "data-error" =>'Время пустое или формат не правильно']) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('time_close', 'Время закрыта:', ['class' => 'control-label col-sm-3']) }}
                                <div class="col-md-9">
                                    {{ Form::text('time_close', $office->time_close, ['class' => 'form-control', "placeholder"=>"20:00", "required"=>"required", "data-error" =>"Время пустое или формат не правильно"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('latitude', 'Широта:', ['class' => 'control-label col-sm-3']) }}
                                <div class="col-md-9">
                                    {{ Form::text('latitude', $office->latitude, ['pattern'=>'^(\-?\d+(\.\d+)?)$', 'class' => 'form-control', "placeholder"=>"48.70784", "required"=>"required", "data-error" =>"Поле Широта пустое или формат не правильно"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ Form::label('longtitude', 'Долгота:', ['class' => 'control-label col-sm-3']) }}
                                <div class="col-md-9">
                                    {{ Form::text('longtitude', $office->longtitude, ['pattern'=>'^(\-?\d+(\.\d+)?)$','class' => 'form-control', "placeholder"=>"44.50572", "required"=>"required", "data-error" =>"Поле Долгота пустое или формат не правильно"]) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">

                                <div class="col-md-3"></div>
                                <div class="col-md-9">
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



@endsection