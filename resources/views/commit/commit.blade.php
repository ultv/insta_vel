

@extends('content.admin_content')

@section('title', 'Добавление коммита')

@section('place')

    <?php $id = 2; ?>

    <form action="{{ route('comment.store', ['id' => $id]) }}" method="post" enctype="multipart/form-data" style="...">

    <div class ="form-group">
        <div class="col-md-3">
            {{ Form::label('name', 'Добавление комментария') }}
        </div>
        <br>
        <div class="col-md-9">
            {{ Form::text('text', 'Новый комментарий', ['class' => 'form-control']) }}
        </div>
    </div>

    {{ csrf_field() }}


    <div class ="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{ Form::submit('Добавить комментарий', ['class' => 'btn btn-primary']) }}
        </div>
    </div>

    </form>



@endsection