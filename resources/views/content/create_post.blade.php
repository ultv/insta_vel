@extends('content.admin_content')

@section('title', 'Создание записи')

@section('place')

    {!! Form::open(['route' => 'content.store', 'method'=>'post','enctype'=>'multipart/form-data']) !!}

<table>
    <tr>
        <td width = "250"></td> <!-- пустая колонка слева -->


        <td width = "700" bgcolor = "white">
            <table class = "table table-bordered">
                <tr>
                    <td>
                        {{ Form::label('place', 'Создание записи') }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style = "margin: 20px 0px 20px 0px;">
                            {{ Form::text('place', 'Место съемки:', ['class' => 'form-control']) }}
                        </div>

                        {{ csrf_field() }}

                        {{ Form::label('place', 'Фотография:') }}

                        <div style = "margin: 0px 0px 0px 0px;">
                            {{ Form::file('photo', ['id'=>'photo', 'accept'=>'image/*', 'required']) }}
                        </div>

                        <div style = "margin: 20px 0px 20px 0px;">
                            {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
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