
@extends('content.admin_content')

@section('title', 'Создание записи')

@section('place')

<style>

</style>

<table> <!-- таблица колонок страницы -->
    <tr>
        <td width = "250"></td> <!-- пустая колонка слева -->

        <td> <!-- колонка постов -->

            @if (Session::has('success') || Session::has('error'))
                @include('content.msg')
            @endif

            @if (auth()->id())
                <a href="{{ route('content.create', ['post'=>$post]) }}" class="btn btn-primary">Загрузить фото</a>
                <br>
            @endif

            <table class = "table"> <!-- таблица постов -->
                <tr>
                    <td bgcolor = "white">Лента</td>
                </tr>


                @forelse($post as $value)

                    <tr> <!-- Пост -->
                        <td align = "center" bgcolor = "white"> <!-- Пост -->

                            <div style="...">
                                <a href = "#">{{ '@' . $value->user->name }}</a><br>
                                <a href="#"> {{ $value->place }}</a><br>
                                <small> {{ Carbon\Carbon::parse($value->created_at)->format('d m Y') }}</small>
                            </div>

                            @if(auth()->id() === $value->user_id)
                                <br><a href="{{ route('content.edit', ['post'=>$value]) }}" class="btn btn-primary">Изменить</a><br>
                                <form action="{{ route('content.destroy', ['post' => $value]) }}" method="post" style="...">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <br><button class="btn btn-danger" type="submit">Удалить</button>
                                </form>
                            @endif

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
                                            <div class="form-group">
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