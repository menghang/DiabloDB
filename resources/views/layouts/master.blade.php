<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>
    @include('layouts/_nav')
    <div class="container">
        @yield('content')
    </div>
</body>
</html>