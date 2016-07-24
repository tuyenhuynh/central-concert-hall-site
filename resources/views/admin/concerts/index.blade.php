@extends ('layouts.admin')

@section('content')
    <h4 class="sub-header">Концерты в ЦКЗ</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Ограничение возраста</th>
                <th>Активный</th>
                <th>Код покупки</th>
                <th>Время создания</th>
                <th>Время обновления</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if($concerts)
                @foreach($concerts as $concert)
                    <tr>
                        <td>{{$concert->id}}</td>
                        <td>{{$concert->name}}</td>
                        <td>{{ DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time)->format('d.m.Y')}}</td>
                        <td>{{DateTime::createFromFormat('Y-m-d H:i:s', $concert->date_time)->format('H:i')}}</td>
                        <td>{{$concert->lim_age}}+</td>
                        <td>{{$concert->is_active ==1 ? "Да" : "Нет"}}</td>
                        <td style="max-width: 200px; overflow: hidden">{{$concert->purchase_code}}</td>
                        <td>{{$concert->created_at->diffForHumans()}}</td>
                        <td>{{$concert->updated_at->diffForHumans()}}</td>
                        <td style="width:120px">
                            <button>
                                <a href ='{{"/admin/concerts/".$concert->id}}'><span class="fa fa-eye"></span></a>
                            </button>
                            <button style="margin: 0;display:inline;">
                                <a href ='{{"/admin/concerts/".$concert->id."/edit"}}'>
                                    <span class="fa fa-edit"></span>
                                </a>
                            </button>
                            <!-- Button trigger modal -->
                            <button  class="btn-power-off" data-toggle="modal" style="margin-left: 0;display:inline;" data-target="#myModal">
                                <span class="fa fa-power-off"></span>
                                <span class ="link-remove">{{"/admin/concerts/".$concert->id}}</span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content modal-center" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        Вы хотите удалить концерт ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <div class="form-remove">
                            {{ Form::open(['method' => 'DELETE', 'id' => 'form-remove',  'route' => ['admin.concerts.destroy', -1]])}}
                            {{ Form::submit('Удалить', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $('.btn-power-off').click(function () {
            var link = $(this).children('.link-remove').html();
            $('#form-remove').attr("action", link);
        });
    </script>


@endsection