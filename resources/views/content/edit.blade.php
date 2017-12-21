@extends('content.admin_content')

@section('title', 'Создание записи')

@section('place')



    {!! Form::model($post, array('route'=>array('content.update', $post->id), 'method' => 'PUT',
     'enctype' => 'multipart/form-data')) !!}



<table>

    <tr>

        <td width = "250"></td> <!-- пустая колонка слева -->

        <td width = "700" bgcolor = "white">

            <table class = "table table-bordered">

                <tr>
                    <td>
                        {{ Form::label('place', 'Изменение записи') }}
                    </td>
                </tr>

                <tr>
                    <td>

                        <div style = "margin: 20px 0px 20px 0px;">
                            {{ Form::text('place', $post->plase, ['class' => 'form-control']) }}

                        </div>

                        {{ csrf_field() }}
                        <div style = "margin: 20px 0px 20px 0px;">
                            {{ Form::file('photo', ['id'=>'photo', 'accept'=>'image/*', 'required']) }}
                        </div>

                        <div style = "margin: 20px 0px 20px 0px;">
                            {{ Form::submit('Сохранить изменения', ['class' => 'btn btn-primary']) }}
                        </div>


                    </td>
                </tr>



            </table>

        </td>

        <td width = "250"></td> <!-- пустая колонка справа -->

    </tr>

</table>

   {!! Form::close() !!}

@endsection