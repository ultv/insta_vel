@extends('content.admin_content')

@section('title', 'Создание записи')

@section('place')

<div class="col-md-7">

    {!! Form::model($post, array('route'=>array('content.update', $post->id), 'method' => 'PUT',
     'enctype' => 'multipart/form-data')) !!}
    <!--{--!! Form::open(['route' => 'content.update', 'method'=>'post','enctype'=>'multipart/form-data']) !!--}-->

    <div class ="form-group">
        <div class="col-md-3">
            {{ Form::label('place', 'Изменение записи') }}
        </div>
        <br>
        <div class="col-md-9">
            {{ Form::text('place', 'Место съемки', ['class' => 'form-control']) }}
        </div>
    </div>

    {{ csrf_field() }}
    <div class ="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{ Form::file('photo', ['id'=>'photo']) }}
            {{-- Form::file('photo', ['id'=>'photo','required']) --}}
        </div>
    </div>

    <div class ="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{ Form::submit('Сохранить изменения', ['class' => 'btn btn-primary']) }}
        </div>
    </div>
</div>

   {!! Form::close() !!}

@endsection