<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Address</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .nav-link {
            font-size: 20px;
        }

        h2 {
            font-size: 32px;
            margin: 2%;
            font-weight: bold;
        }

        p {
            font-size: 18px;
        }

        .form-control {
            width: 60%;
        }

        .list-group {
            font-size: 15px;
        }

        .table tr {
            font-size: 15px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light collapse navbar-collapse">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            @if (Route::has('login'))
                @auth
                    <li class="nav-item active ml-4"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                    <li class="nav-item ml-4"><a class="nav-link" href="{{ url('/address') }}"> Address Lookup</a></li>
                    <li class="nav-item ml-4"><a class="nav-link" href="{{route('logout')}}"><span
                                class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><span
                                class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><span
                                    class="glyphicon glyphicon-user"></span>Register</a></li>
        @endif
        @endauth
        @endif
    </div>
</nav>
<div class="container p-3 text-center">
    <h2>Address Lookup Tool</h2>
    <p>The tool is used to find detailed information about specific postcodes</p>
    <p> Please provide a valid postcode: </p>
    <div class="content" id="app">
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
