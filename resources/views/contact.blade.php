@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="padding"></div>
        <div class="row path">
            <h5>Главная > Кассы</h5>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Обратная связь</h3>

                    {!! Form::open(array('action' => 'ConcertHallController@saveFeedback', 'method' => "post")) !!}
                    <div class="contact-form" style="margin-top:20px">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::text('firstname', null, ['class' => 'form-control', "placeholder"=>"Имя", "required"=>"required", "data-error" =>"Поле имя требуется."]) }}
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
                                {{ Form::text('email', null, ['class' => 'form-control', "placeholder"=>"Email адрес", "required"=>"required", "data-error" =>"Поле имя требуется."]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::textarea('message', null, ['class' => 'form-control', 'rows' => 10, "placeholder"=>"Текст", "required"=>"required", "data-error" =>"Поле имя требуется."]) }}
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
                @if($about_text)
                    @foreach($about_text as $text)
                        <p>{{$text}}</p>
                        <br>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection