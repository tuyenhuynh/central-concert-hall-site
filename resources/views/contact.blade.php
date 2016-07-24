@extends ('layouts.app')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('contact') !!}
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Обратная связь</h3>

                    {!! Form::open(array('action' => 'ConcertHallController@saveFeedback', 'method' => "post", 'data-toggle' =>'validator')) !!}
                    <div class="contact-form" style="margin-top:20px">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::text('firstname', null, [ 'class' => 'form-control', "placeholder"=>"Имя", "required"=>"required", "data-error" =>"Поле имя требуется."]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::text('lastname', null, ['class' => 'form-control', "placeholder"=>"Фамилия", "required"=>"required", "data-error" =>"Поле имя требуется."]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::email('email', null, ['class' => 'form-control', "placeholder"=>"Email адрес", "required"=>"required", "data-error" =>"формат поля email не правильно ."]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::textarea('message', null, ['class' => 'form-control', 'rows' => 10, "placeholder"=>"Текст", "required"=>"required", "data-error" =>"Поле текст требуется."]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send" value="Отправить">
                        </div>
                    </div>
                    </div>
                    {!! Form::close() !!}
            </div>
            <div class="col-md-6">
                <h3>О проекте</h3>
                @if($information)
                    {{$information->company_info}}
                @endif
            </div>
        </div>
    </div>
@endsection