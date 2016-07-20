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
                        <td>
                            <a href ={{"/admin/feedbacks/".$feedback->id}}><span class="fa fa-eye"></span></a>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <a  href="" data-toggle="modal" data-target="#myModal">
                                <span class="fa fa-power-off"></span>
                            </a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"></h4>
                                    </div>
                                    <div class="modal-body">
                                        Вы хотите удалить выбранную обратную связь ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                        <a href={{"/admin/feedbacks/".$feedback->id."/delete"}} role="button" class="btn btn-primary" >Удалить</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection