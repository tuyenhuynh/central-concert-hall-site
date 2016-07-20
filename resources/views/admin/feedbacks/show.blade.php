@extends ('layouts.admin')

@section ('content')
    <h3 class="sub-header">Обратная связь</h3>
    <div class="view-concert">
        <div class="row">
            <div class="col-md-2">
                <label>От</label>
            </div>
            <div class="col-md-10">
                <label>{{$feedback->username}}</label>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-2'>
                <label>Почта</label>
            </div>
            <div class="col-sm-10">
                <label>{{$feedback->email}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <label>Текст</label>
            </div>
            <div class="col-sm-10">
                {{ Form::textarea('description', $feedback->content , ['class' => 'form-control', 'rows' => 10]) }}
            </div>
        </div>

    </div>
@endsection