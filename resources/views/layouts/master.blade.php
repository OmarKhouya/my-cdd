<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('images/electro ka.png') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue&display=swap" rel="stylesheet">

    <title>my cdd| @yield('title')</title>
</head>

<body>
     {{--@auth
        @if (Auth::user()->usertype == 'admin')
            @include('layouts.partials.admin.header')
            @yield('content')
            @include('layouts.partials.admin.footer')
        @else
            @include('layouts.partials.header')
            @yield('content')
            @include('layouts.partials.footer')
        @endif
    @else
        @include('layouts.partials.header')
        @yield('content')
        @include('layouts.partials.footer')
    @endif--}}
    @include('layouts.partials.nav')
    @yield('content')
    @include('layouts.partials.footer')
</body>

</html>
