<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AplikasiKu By RadhityaHafif</title>
    <link href="{{ url('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body data-bs-theme="dark">
<div class="container-fluid mt-3">
    <a href="{{ url('/') }}" class="btn btn-primary">
        Home
    </a>
    <a href="{{ url('about') }}" class="btn btn-primary">
        About
    </a>
    <a href="{{ url('data') }}" class="btn btn-primary">
        Data
    </a>
    <a href="{{ url('logout') }}" class="btn btn-primary">
        Keluar
    </a>
</div>
<hr>


<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
    @endif
    @yield("content")
</div>

<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
