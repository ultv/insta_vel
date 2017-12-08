@extends('content.admin_content')

@section('title', 'Создание записи')

@section('place')

    @if (Session::has('success') || Session::has('error'))
        @include('content.msg')
    @endif

    <br>
    <a href="{{ route('content.create', ['post'=>$post]) }}" class="btn btn-primary">Загрузить фото</a>
    <br>

        @forelse($post as $value)

          @if(auth()->id() === $value->user_id)
              <br>
              <a href="{{ route('content.edit', ['post'=>$post]) }}" class="btn btn-primary">Изменить</a>
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
             <small> {{ $value->created_at->format('d.m.Y.H:i') }}</small>
         </div>
            <img src="{{ asset($value->path) }}" alt="" width="50%">
            <br>

        @empty
            <p>Нет данных для отображения</p>

        @endforelse



@endsection