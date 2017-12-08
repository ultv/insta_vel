

@extends('content.admin_content')

@section('title', 'Просмотр поста')

@section('place')
    @include('content.msg')

    <!--foreach ($post as $value)-->
        <br>
        {{ $post->place }}
        <br>
        {{ $post->created_at }}
        <br>
        <img src="{{ asset($post->path) }}">

    <!--endforeach-->





@endsection