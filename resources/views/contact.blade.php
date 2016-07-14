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
                <div class="contact-form" style="margin-top:20px">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Имя" required="required" data-error="Поле имя требуется.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="lastname" type="text" name="lastname" class="form-control" placeholder="Фамилия" required="required" data-error="Поле фамилия требуется.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="email" type="text" name="email" class="form-control" placeholder="Email адрес" required="required" data-error="Поле email требуется">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea id="form_message" name="message" class="form-control" placeholder="Текст" rows="10" required="required" data-error="Поле текст требуется."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send" value="Отправить">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>О проекте</h3>
                <p>
                    @if($about_text)
                        {{$about_text}}
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection