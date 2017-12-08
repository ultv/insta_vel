@extends('content.admin_content')

@section('title', 'Создание записи')

@section('place')

    {!! Form::open(['route' => 'content.store', 'method'=>'post','enctype'=>'multipart/form-data']) !!}

    <div class ="form-group">
        <div class="col-md-3">
            {{ Form::label('place', 'Создание записи') }}
        </div>
        <br>
        <div class="col-md-9">
                {{ Form::text('place', 'Место съемки', ['class' => 'form-control']) }}
            </div>
    </div>

    {{ csrf_field() }}
    <div class ="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{ Form::file('photo', ['id'=>'photo', 'accept'=>'image/*', 'required']) }}

        </div>
    </div>

    <div class ="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
        </div>
    </div>

{!! Form::close() !!}

@endsection