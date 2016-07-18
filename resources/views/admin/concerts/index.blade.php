@extends ('layouts.admin')

@section('content')
    <h2 class="sub-header">Концерты</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Описание</th>
                <th>Кол-во зрителей</th>
                <th>Аудио</th>
                <th>Фото</th>
                <th>Время создания</th>
                <th>Время обновления</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if($concerts)
                @foreach($concerts as $concert)
                    <tr>
                        <td>{{$concert->id}}</td>
                        <td><a href ={{"/admin/concerts/".$concert->id."/edit"}}>{{$concert->name}}</a></td>
                        <td>{{ DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time)->format('d.m.Y')}}</td>
                        <td>{{DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time)->format('H:i')}}</td>
                        <td>{{$concert->description}}</td>
                        <td>{{$concert->audience_count}}</td>
                        <td>{{$concert->audio_id}}</td>
                        <td>{{$concert->photo_id}}</td>
                        <td>{{$concert->created_at->diffForHumans()}}</td>
                        <td>{{$concert->updated_at->diffForHumans()}}</td>
                        <td>
                            <a href ={{"/admin/concerts/".$concert->id}}><span class="fa fa-eye"></span></a>
                        </td>
                        <td>
                            <a href ={{"/admin/concerts/".$concert->id."/edit"}}><span class="fa fa-edit"></span></a>
                        </td>
                        <td>
                            <a href={{"/admin/concerts/".$concert->id."/delete"}}><span class="fa fa-power-off"></span></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection