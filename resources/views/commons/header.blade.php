<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg">
        <div class="container">
            <p class="navbar-brand">Photo Albums</p>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link">Index</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link">Register</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">