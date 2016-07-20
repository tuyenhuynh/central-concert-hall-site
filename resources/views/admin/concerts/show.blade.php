@extends ('layouts.admin')

@section ('content')
    <h4 class="sub-header">{{$concert->name}}</h4>
    <a href={{"/admin/concerts/".$concert->id."/edit"}}  role="button" class="btn btn-primary">Редактировать</a>
    <div class="view-concert" style="margin-top:20px">
        <div class="row">
            <div class="col-md-3">
                <label>Название</label>
            </div>
            <div class="col-md-9">
                <label>{{$concert->name}}</label>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-3'>
                <label>Дата/Время</label>
            </div>
            <div class="col-sm-9">
                <label>{{DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time)->format('D d/m/Y, H:i')}}</label>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-3'>
                <label>Фото</label>
            </div>
            <div class="col-sm-6">
                <img src={{$concert->photo_path}} style="max-width:550px"/>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-3'>
                <label>Аудио</label>
            </div>
            <div class="col-sm-6">
                <audio controls style="width: 100%">
                    <source src="/audio/west-coast.mp3"
                            type='audio/mp3'>
                    <p>Your user agent does not support the HTML5 Audio element.</p>
                </audio>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-3'>
                <label>Количество зрителей</label>
            </div>
            <div class="col-sm-6">
                <label>{{$concert->audience_count}}</label>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-3'>
                <label>Код покупки</label>
            </div>
            <div class="col-sm-6">
                <label>{{$concert->purchase_code}}</label>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    {{ Form::label('date', 'Описание') }}
                </div>
                {{ Form::textarea('description', $concert->description , ['class' => 'form-control', 'rows' => 10]) }}
            </div>
        </div>
    </div>
@endsection