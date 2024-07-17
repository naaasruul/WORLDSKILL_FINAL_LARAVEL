<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged In</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <p class="navbar-brand">Photo Albums</p>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('gallery')}}" class="nav-link">Gallery</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('album')}}" class="nav-link">Albums</a>
                </li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <li class="nav-item">
                        <button type="submit" class="nav-link">Log Out</button>
                    </li>
                </form>
            </ul>
            Hi {{$user->name}}
        </div>
    </nav>
    <div class="container">