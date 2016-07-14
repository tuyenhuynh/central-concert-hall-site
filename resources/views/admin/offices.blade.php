@extends ('layouts.admin')

@section('content')
    <h2 class="sub-header">Кассы продаж</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Адрес</th>
                <th>Режим работы</th>
            </tr>
            </thead>
            <tbody>
            @if($offices)
                @foreach($offices as $office)
                    <tr>
                        <td>{{$office->id}}</td>
                        <td>{{$office->name}}</td>
                        <td>{{$office->address}}</td>
                        <td>{{"с " . $office->open_at." до ".$office->close_at}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection