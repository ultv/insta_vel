@extends('layouts.app')

@section('content')

<!doctype html>
<html lang="ru">
<head>



    <meta charset="UTF-8">
    <meta name="viewport" content=""width=device-width">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">



            @yield('place')

        </div>
    </div>
</body>



</html>

@endsection