@extends ('layouts.admin')

@section('content')
    <h2 class="sub-header">Обратная связь</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>От</th>
                <th>Почта</th>
                <th>Содержание</th>
                <th>Время создания</th>
            </tr>
            </thead>
            <tbody>
            @if($feedbacks)
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{$feedback->id}}</td>
                        <td>{{$feedback->username}}</td>
                        <td>{{$feedback->email}}</td>
                        <td>{{$feedback->content}}</td>
                        <td>{{$feedback->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection