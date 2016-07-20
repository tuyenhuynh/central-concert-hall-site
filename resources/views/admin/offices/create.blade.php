@extends ('layouts.admin')

@section ('content')
    <h2 class="sub-header">Добавить кассу</h2>
    {!! Form::open(array('action' => 'OfficeController@postCreateOffice', 'method' => "post" )) !!}
    <div class="contact-form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('name', 'Название')}}
                    {{ Form::text('name', null, ['class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле название требуется"]) }}
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('address', 'Адрес')}}
                    {{ Form::text('address', null, ['class' => 'form-control', "placeholder"=>"", "required"=>"required", "data-error" =>"Поле адрес требуется"]) }}
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('time_open', 'С') }}
                    {{ Form::text('time_open', null, ['class' => 'form-control']) }}
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('time_close', 'До') }}
                    {{ Form::text('time_close', null, ['class' => 'form-control']) }}
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    {{Form::submit('Добавить', ['class' =>'btn btn-success btn-send'])}}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection