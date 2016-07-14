@extends('layouts.admin')

@section('content')

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(array('action' => 'AdminController@updateAboutText', 'method' => "post")) !!}
        <div class="form-group">
            {{ Form::label('text', 'О проекте')}}
            {{ Form::textarea('text', $about_text, ['class' => 'form-control', 'rows' => 15]) }}
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
    {!! Form::close() !!}

@endsection