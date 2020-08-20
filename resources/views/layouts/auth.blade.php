<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IDEAL ADESIVOS</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('dist-assets/css/themes/lite-purple.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <script src="{{ asset('js/app.js') }}"></script>
    @notify_css
</head>
<body >
<div class="auth-layout-wrap" style="background-image: url({{ asset('dist-assets/images/photo-wide-4.jpg') }})">
    <div class="auth-content">
        <div class="card o-hidden">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
@livewireScripts
@notify_js
@notify_render
</body>
</html>
