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
                        <td>
                            <a href ={{"/admin/offices/".$office->id."/edit"}}><span class="fa fa-edit"></span></a>
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
                                        Вы хотите удалить выбранную кассу?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                        <a href={{"/admin/offices/".$office->id."/delete"}} role="button" class="btn btn-primary" >Удалить</a>
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