

@extends('content.admin_content')

@section('title', 'Просмотр поста')

@section('place')
    @include('content.msg')

    {{ $post->place }}
    <p>{{ $post->created_at }}</p>


    <img src="{{ asset($post->path) }}">



@endsection