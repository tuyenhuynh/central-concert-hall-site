@extends ('layouts.admin')

@section ('content')
    <h4 class="sub-header">{{$concert->name}}</h4>
    <div class="contact-form" style="margin-top:20px">
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
                <label>{{DateTime::createFromFormat('D d/m/Y h:i', $concert->date_time)}}</label>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-3'>
                <label>Фото</label>
            </div>
            <div class="col-sm-9">
                <img src={{$concert->photo_path}}>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-3'>
                <label>Фото афиши</label>
            </div>
            <div class="col-sm-9">
                <img src={{$concert->photo_path}}>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('date', 'Аудио') }}
                    <audio controls style="width: 100%">
                        <source src="/audio/west-coast.mp3"
                                type='audio/mp3'>
                        <p>Your user agent does not support the HTML5 Audio element.</p>
                    </audio>
                </div>
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