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
                    Компания KASSIR.RU была основана в 1999 году в Санкт-Петербурге. Сегодня KASSIR.RU осуществляет бронирование и продажу билетов на все события Москвы, Санкт-Петербурга, Нижнего Новгорода, Екатеринбурга, Челябинска и Перми. Особенностью системы заказа и бронирования билетов является возможность работы в едином билетном поле.
                    <br> <br>
                    Сайт компании KASSIR.RU содержит подробную информацию о культурно-зрелищных событиях, схемы концертных площадок и театральных залов, информацию о кассах продаж наших партнеров. Посещаемость сайта на сегодняшний день составляет 25 000 посетителей в сутки. Для удобства клиента возможны практически все существующие на сегодняшний день способы оплаты билетов, кроме того KASSIR.RU имеет собственную службу доставки билетов.
                    <br><br>
                    Вы можете с нами связаться по почте contact@kassir.ru</
                </p>
            </div>
        </div>
    </div>
@endsection