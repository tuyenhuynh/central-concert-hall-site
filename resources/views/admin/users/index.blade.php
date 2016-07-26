@extends('layouts.admin')

@section('content')
    <h4 class="sub-header">Пользователя</h4>
    <a href="/admin/users/create" role="button" class="btn btn-primary" >Добавить</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Активность</th>
                <th>Роль</th>
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
                        <td>{{$user->is_active ? "Активный" :"Не активный"}}</td>
                        <td>{{$user->role_id ==0 ? "Admin" : "User"}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}
                        <td style="padding-right:0px;">
                            <button>
                                @if(!$user->isAdmin() || Auth::user()->id == $user->id)

                                    <a href ={{"/admin/users/".$user->id."/edit"}}><span class="fa fa-edit"></span></a>
                                @else
                                    <span class="fa fa-hand-o-right"></span>
                                @endif

                            </button>
                        </td>
                        <td style="padding-left:0px;">
                            <button>
                                @if(!$user->isAdmin())
                                    @if($user->is_active)
                                        <a  href='{{"/admin/users/".$user->id."/deactivate"}}' class="btn-power-off">
                                            <span class="fa fa-power-off"></span>
                                        </a>
                                    @else
                                        <a href='{{"/admin/users/".$user->id."/activate"}}' class="btn-power-on">
                                            <span class="fa fa-toggle-on"></span>
                                        </a>
                                    @endif
                                @else
                                    <span class="fa fa-hand-o-right"></span>
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
