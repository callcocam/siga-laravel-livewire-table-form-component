<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IDEAL ADESIVOS</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('dist-assets/css/themes/lite-purple.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist-assets/css/plugins/perfect-scrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    @notify_css
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="text-left">
<div id="app" class="app-admin-wrap layout-sidebar-large">
@auth
    @include('includes.header')
    @include('includes.sidebar')
@endauth
<!-- =============== Left side End ================-->
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <!-- ============ Body content start ============= -->
        <div class="main-content">
            @yield('content')
            @include('includes.footer')
        </div>
    </div>
</div>
<script src="{{ asset('dist-assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('dist-assets/js/scripts/script.min.js') }}"></script>
<script src="{{ asset('dist-assets/js/scripts/sidebar.large.script.min.js') }}"></script>
<script src="https://kit.fontawesome.com/f248d703d3.js" crossorigin="anonymous"></script>
@livewireScripts
@stack('scripts')
@notify_js
@notify_render
</body>
</html>
