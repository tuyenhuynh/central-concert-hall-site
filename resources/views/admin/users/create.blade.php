@extends ('layouts.admin')

@section ('content')
    <h4 class="sub-header">Добавить пользователя</h4>
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(array('action' => 'AdminUserController@store', 'method' => "post" ,'data-toggle' =>'validator')) !!}
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Новый пользователь</strong></div>
                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('name', 'Имя:', ['class' => 'control-label col-sm-3'])}}
                            <div class="col-sm-9">
                                {{ Form::text('name', null, ['class' => 'form-control', "placeholder"=>"Имя", "required"=>"required", "data-error" =>"Поле имя требуется"]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('email', 'Email:', ['class' => 'control-label col-sm-3'])}}
                            <div class="col-md-9">
                                {{ Form::text('email', null, ['data-minlength' => 4, 'class' => 'form-control', "placeholder"=>"email", "required"=>"required", "data-error" =>"Поле email требуется"]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('password', 'Пароль:', ['class' => 'control-label col-sm-3'])}}
                            <div class="col-md-9">
                                {{ Form::text('password', null, ['data-minlength'=>6, 'class' => 'form-control', "placeholder"=>"пароль", "required"=>"required", "data-error" =>"Поле пароль требуется"]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('role_id', ' Роль', ['class' => 'control-label col-sm-3']) }}
                            <div class="col-md-9">
                                {{ Form::select('role_id', ['0'=>'Администратор', '1'=>'Пользователь'], null,  ['class' => 'form-control', "required"=>"required"]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('is_active', ' Активность', ['class' => 'control-label col-sm-3']) }}
                            <div class="col-md-9">
                                {{ Form::select('is_active', ['1'=>'Активный', '0'=>'Не активный'], null,  ['class' => 'form-control', "required"=>"required"]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">

                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                {{Form::submit('Добавить', ['class' =>'btn btn-success btn-send'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection