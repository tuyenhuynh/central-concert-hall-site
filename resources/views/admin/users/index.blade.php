@extends('layouts.admin')

@section('content')
    <h2 class="sub-header">Пользователя</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Время создания</th>
                <th>Время обновления</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}
                        <td style="padding-right:0px;">
                            <button>
                                <a href ={{"/admin/users/".$user->id."/edit"}}><span class="fa fa-edit"></span></a>
                            </button>
                        </td>
                        <td style="padding-left:0px;">
                            <button>
                                @if($user->is_active)
                                    <a  href='{{"/admin/users/".$user->id."/deactivate"}}' class="btn-power-off">
                                        <span class="fa fa-power-off"></span>
                                    </a>
                                @else
                                    <a href='{{"/admin/users/".$user->id."/activate"}}' class="btn-power-off">
                                        <span class="fa fa-power-on"></span>
                                    </a>
                                @endif
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
