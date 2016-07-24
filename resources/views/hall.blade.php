@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('hall') !!}
    </div>


    <div class="container">

        <div class="schema">
            @if($information)
                <img src={{$information->hall_schema}} height="500px">
            @endif
        </div>
        <div class="text" style="margin-top: 15px">
            <p>{{$information->hall_text}}</p>
        </div>
    </div>
@endsection