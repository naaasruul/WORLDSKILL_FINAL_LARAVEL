<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged In</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <p class="navbar-brand">Photo Albums</p>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('users')}}" class="nav-link">Users</a>
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