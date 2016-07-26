@extends ('layouts.app')

@section('title', 'Контакт')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('contact') !!}
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Обратная связь</h3>

                    {!! Form::open(array('id'=>'form-feedback', 'method' => "post", 'data-toggle' =>'validator')) !!}
                    <div class="contact-form" style="margin-top:20px">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::text('firstname', null, [ 'id'=>'firstname', 'class' => 'form-control', "placeholder"=>"Имя", "required"=>"required", "data-error" =>"Поле имя требуется."]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::text('lastname', null, ['id'=>'lastname', 'class' => 'form-control', "placeholder"=>"Фамилия", "required"=>"required", "data-error" =>"Поле имя требуется."]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::email('email', null, ['id'=>'email', 'class' => 'form-control', "placeholder"=>"Email адрес", "required"=>"required", "data-error" =>"формат поля email не правильно ."]) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::textarea('message', null, ['id'=>'message', 'class' => 'form-control', 'rows' => 10, "placeholder"=>"Текст", "required"=>"required", "data-error" =>"Поле текст требуется."]) }}
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
                    <p>
                        <?php
                            $output  = str_replace('\"', '', $information->company_info);
                        ?>
                        {{$information->company_info}}
                    </p>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="feedbackSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="top:150px; left: 15%">
            <div class="modal-content modal-sm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Сообщение отправлено</h4>
                </div>
                <div class="modal-body">
                    Спасибо за вашу обратную связь
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-close">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#form-feedback").submit(function(e){
            e.preventDefault();
            var username = $('#firstname').val() + " " + $("#lastname").val();
            var email = $('#email').val();
            var message = $('#message').val();
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:'/ajax_post_feedback',
                type:'POST',
                data: {
                    'username': username,
                    'email':email,
                    'message': message
                },
                success: function(data){
                    $('#feedbackSuccess').modal('show');

                }
            }) ;
        });
        $('#btn-close').click(function(){
            window.location.href = "/";
        });
    </script>
@endsection