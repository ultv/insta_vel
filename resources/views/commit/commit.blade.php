

@extends('content.admin_content')

@section('title', 'Добавление коммита')

@section('place')


 <!--   <form action="{{-- route('comment.update', ['post' => $post]) --}}"-->

 {!! Form::model($post, array('route'=>array('comment.update', $post->id), 'method' => 'PUT',
   'enctype' => 'multipart/form-data')) !!}

    <div class ="form-group">
        <div class="col-md-3">
            {{ Form::label('name', 'Добавление комментария') }}
        </div>
        <br>
        <div class="col-md-9">
            {{ Form::text('text', 'Новый комментарий', ['class' => 'form-control']) }}
        </div>
    </div>




    <div class ="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{ Form::submit('Добавить комментарий', ['class' => 'btn btn-primary']) }}
        </div>
    </div>

    <!-- /form> -->

 {!! Form::close() !!}


@endsection