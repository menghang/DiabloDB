<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    @include('layouts/_style')
    @include('layouts/_js')
</head>
<body>
    @include('layouts/_nav')
    <div class="container">
        @yield('content')
    </div>
</body>
</html>