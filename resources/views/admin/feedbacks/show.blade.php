@extends ('layouts.admin')

@section ('content')
    <h4 class="sub-header">Обратная связь</h4>
    @if($feedback)
        <?php $date_time =DateTime::createFromFormat('Y-m-d H:i:s', $feedback->created_at)->format('D d-m-Y H:i')?>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>#</strong></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-2">
                                    <strong>От:</strong>
                                </div>
                                <div class="col-sm-10">
                                    {{$feedback->username}}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-md-12">
                                <div class="col-sm-2">
                                    <strong>Email:</strong>
                                </div>
                                <div class="col-sm-10">
                                    {{$feedback->email}}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-2">
                                    <strong>Время создание:</strong>
                                </div>
                                <div class="col-sm-10">
                                    {{$date_time}}
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-sm-2">
                                    <strong>Содержание</strong>
                                </div>
                                <div class="col-sm-10">
                                    {{$feedback->content}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection