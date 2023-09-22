<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>web-app</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/cheatsheet.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">
</head>
<body>
<x-header></x-header>
<div class="container-fluid">
    <div class="row">
        <x-sidebar></x-sidebar>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @hasSection('content')
                @yield('content')
            @endif
            @sectionMissing('content')
                    <blockquote class="blockquote mt-5 text-center">
                        <p class="blockquote-footer">любезно разработан командой</p>
                        <h2 class="mb-0">∑E(HW)...E(N)=∞⇒P(1st place)→1</h2>
                    </blockquote>
            @endif
        </main>
    </div>
</div>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
@stack('js')
</body>
</html>
