@extends ('layouts.admin')

@section('content')
    <h4 class="sub-header">Обратная связь</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>От</th>
                <th>Почта</th>
                <th>Содержание</th>
                <th>Время создания</th>
                <th></th>
                <th></th>
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
                        <td style="padding-right:0px">
                            <button>
                                <a href= '{{"/admin/feedbacks/".$feedback->id}}'><span class="fa fa-eye"></span></a>
                            </button>
                        </td>
                        <td style="padding-left: 0px">
                            <!-- Button trigger modal -->
                            <button  class="btn-power-off" data-toggle="modal" data-target="#myModal">
                                <span class="fa fa-power-off" ></span>
                                <span class="link-remove">{{"/admin/feedbacks/".$feedback->id}}</span>
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
                    Вы хотите удалить выбранную обратную связь ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <div class="form-remove">
                        {{ Form::open(['method' => 'DELETE', 'id' => 'form-remove',  'route' => ['admin.feedbacks.destroy', -1]])}}
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
            console.log(link);
            $('#form-remove').attr("action", link);
        });
    </script>

@endsection