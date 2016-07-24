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
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if($offices)
                @foreach($offices as $office)
                    <tr>
                        <td>{{$office->id}}</td>
                        <td>{{$office->name}}</td>
                        <td>{{$office->address}}</td>
                        <td>{{"с " . $office->time_open." до ".$office->time_close}}</td>
                        <td style="padding-right:0px;">
                            <button>
                                <a href ={{"/admin/offices/".$office->id."/edit"}}><span class="fa fa-edit"></span></a>
                            </button>
                        </td>
                        <td style="padding-left:0px;">
                            <button>
                                <a  href="" class="btn-power-off" data-toggle="modal" data-target="#myModal">
                                    <span class="fa fa-power-off"></span>
                                    <span class="link-remove">{{"/admin/offices/".$office->id}}</span>
                                </a>
                            </button>
                        </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content modal-center">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    Вы хотите удалить выбранную кассу?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <div class="form-remove">
                        {{ Form::open(['method' => 'DELETE', 'id' => 'form-remove',  'route' => ['admin.offices.destroy', -1]])}}
                        {{ Form::submit('Удалить', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.btn-power-off').click(function () {
            var link = $(this).children('.link-remove').html();
            $('#form-remove').attr('action', link);
        });
    </script>
@endsection