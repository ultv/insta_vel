

@extends('content.admin_content')

@section('title', 'Просмотр поста')

@section('place')


    {!! Form::open(['route' => 'DevResourceController@addcommit', 'method'=>'post','enctype'=>'multipart/form-data']) !!}

    <div class ="form-group">
        <div class="col-md-3">
            {{ Form::label('place', 'Добавление комментария') }}
        </div>
        <br>
        <div class="col-md-9">
            {{ Form::text('place', 'Новый комментарий', ['class' => 'form-control']) }}
        </div>
    </div>

    {{ csrf_field() }}


    <div class ="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{ Form::submit('Добавить комментарий', ['class' => 'btn btn-primary']) }}
        </div>
    </div>

    {!! Form::close() !!}



@endsection