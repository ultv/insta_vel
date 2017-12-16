
@extends('content.admin_content')

@section('title', 'Создание записи')

@section('place')

    @if (Session::has('success') || Session::has('error'))
        @include('content.msg')
    @endif


    @if (auth()->id())
        <br>
        <a href="{{ route('content.create', ['post'=>$post]) }}" class="btn btn-primary">Загрузить фото</a>
        <br>
    @endif



        @forelse($post as $value)


          @if(auth()->id() === $value->user_id)


              <br>
              <a href="{{ route('content.edit', ['post'=>$value]) }}" class="btn btn-primary">Изменить</a>

              <br>
                <form action="{{ route('content.destroy', ['post' => $value]) }}" method="post" style="...">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <br>
                    <button class="btn btn-danger" type="submit">Удалить</button>
                </form>
          @endif


         <div style="...">

             <a href = "#">{{ '@' . $value->user->name }}</a>
             <br>
             <a href="#"> {{ $value->place }}</a>
             <br>
             <small> {{ Carbon\Carbon::parse($value->created_at)->format('d m Y') }}</small>
         </div>
            <img src="{{ asset($value->path) }}" alt="" width="50%">
            <br>

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

        @endforelse


@endsection