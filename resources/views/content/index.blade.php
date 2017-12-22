
@extends('content.admin_content')

@section('title', 'Создание записи')

@section('place')

<style>

</style>

<table > <!-- таблица колонок страницы -->
    <tr>
        <td width = "250"></td> <!-- пустая колонка слева -->

        <td> <!-- колонка постов -->

            @if (Session::has('success') || Session::has('error'))
                @include('content.msg')
            @endif

            @if (auth()->id())
                <div style = "margin: 0px 0px 20px 0px;">
                <a href="{{ route('content.create', ['post'=>$post]) }}" class="btn btn-primary">Загрузить фото</a>
                </div>
            @endif

            <table class = "table table-bordered"> <!-- таблица постов -->
                <tr>
                    <td bgcolor = "white">Лента</td>
                </tr>


                @forelse($post as $value)

                    <tr> <!-- Пост -->
                        <td bgcolor = "white"> <!-- Пост -->

                            <table> <!-- расположенее кнопок -->
                                <tr>
                                    <td width = "50">
                                        <img src="{{ asset('storage' . $value->user->avatar) }}" class="img-circle" alt="" width="90%">
                                    </td>
                                    <td width = "400">
                                        <a href = "#">{{ '@' . $value->user->name }}</a><br>
                                        <a href="#"> {{ $value->place }}</a><br>
                                        <small> {{ Carbon\Carbon::parse($value->created_at)->format('d m Y') }}</small>
                                    </td>

                                    @if(auth()->id() === $value->user_id)
                                        <td width = "100">
                                            <a href="{{ route('content.edit', ['post'=>$value]) }}" class="btn btn-primary">Изменить</a>
                                        </td>

                                        <td>
                                            <form action="{{ route('content.destroy', ['post' => $value]) }}" method="post" style="...">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <div class = "pull-right">
                                                    <button class="btn btn-danger" type="submit">Удалить</button>
                                                </div>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            </table> <!-- расположенее кнопок -->

                            <img src="{{ asset($value->path) }}" alt="" width="100%"><br>

                            <div>
                                <h3>Комментарии:</h3>
                                <div>

                                    @forelse($value->comments as $comment)
                                        <div>
                                            {{ $comment->text }}
                                        </div>
                                    @empty
                                        <p>Нет комментариев.</p>
                                    @endforelse

                                    @if (auth()->id())
                                        <form action="{{ route('comment.edit', ['id' => $value]) }}">
                                            <div style = "margin: 20px 0px 10px 0px;" >
                                                <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>


                @empty

                    <p>Нет данных для отображения</p>

                        </td> <!-- Пост -->
                    </tr> <!-- Пост -->
                @endforelse

            </table> <!-- таблица постов -->

        </td> <!-- колонка постов -->

        <td width = "250"></td> <!-- пустая колонка справа -->


    </tr>
</table> <!-- таблица колонок страницы -->

@endsection