@extends('content.admin_content')

@section('title', 'Создание записи')

@section('place')
    {!! Form::open(['route' => 'content.store']) !!}
        <div class ="form-group">
            <div class="col-md-3">
                {{ Form::label('title', 'Создание записи') }}
            </div>
            <div class="col-md-9">
                {{ Form::text('title', 'Место съемки', ['class' => 'form-control']) }}
            </div>
        </div>

    <div class ="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{ Form::file('Выбрать файл') }}
        </div>

    </div>

       <div class ="form-group">
        <div class="col-md-9 col-md-offset-3">

            {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
        </div>


    </div>

{!! Form::close() !!}

@endsection