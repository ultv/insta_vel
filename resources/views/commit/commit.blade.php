

@extends('content.admin_content')

@section('title', 'Добавление коммита')

@section('place')


 <!--   <form action="{{-- route('comment.update', ['post' => $post]) --}}"-->

 {!! Form::model($post, array('route'=>array('comment.update', $post->id), 'method' => 'PUT',
   'enctype' => 'multipart/form-data')) !!}

<table>
    <tr>
        <td width = "250"></td>

        <td width = "650", bgcolor = "white">

            <table class = "table table-bordered">

                <tr>
                    <td>
                        {{ Form::label('name', 'Добавление комментария') }}
                    </td>
                </tr>

                <tr>
                    <td>
                        <div style = "margin: 20px 0px 10px 0px;">
                            {{ Form::text('text', 'Новый комментарий', ['class' => 'form-control']) }}
                        </div>

                        <div style = "margin: 20px 0px 10px 0px;">
                            {{ Form::submit('Добавить комментарий', ['class' => 'btn btn-primary']) }}
                        </div>
                    </td>
                </tr>

            </table>

        </td>

        <td width = "250"></td>
    </tr>

</table>





    <!-- /form> -->

 {!! Form::close() !!}


@endsection