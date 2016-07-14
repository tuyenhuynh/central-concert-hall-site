@extends ('layouts.admin')

@section('content')
    <h2 class="sub-header">Концерты</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Время</th>
                <th>Во Сколько</th>
                <th>Описание</th>
                <th>Кол-во зрителей</th>
                <th>Аудио</th>
                <th>Фото</th>
                <th>Время создания</th>
                <th>Время обновления</th>
            </tr>
            </thead>
            <tbody>
            @if($concerts)
                @foreach($concerts as $concert)
                    <tr>
                        <td>{{$concert->id}}</td>
                        <td>{{$concert->name}}</td>
                        <td>{{$concert->date}}</td>
                        <td>{{$concert->time}}</td>
                        <td>{{$concert->description}}</td>
                        <td>{{$concert->audience_count}}</td>
                        <td>{{$concert->audio_id}}</td>
                        <td>{{$concert->photo_id}}</td>
                        <td>{{$concert->created_at->diffForHumans()}}</td>
                        <td>{{$concert->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection