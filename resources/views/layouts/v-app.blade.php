<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sample') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <v-app style="background-color: #F1F6FB;">
        <vc-navbar :is-guest="{{ json_encode(auth()->guest()) }}"
                   :csrf="{{ json_encode(csrf_token()) }}"
                   :href="{{ json_encode([
                        'login' => route('login'),
                        'logout' => route('logout'),
                    ]) }}"
                   :name="{{ json_encode([
                        'login' => __('Login'),
                        'logout' => __('Logout'),
                    ]) }}"
                   @if (Auth::user())
                    :user="{{ Auth::user() }}"
                   @endif
        ></vc-navbar>
        <v-main>
            @yield('content')
        </v-main>
        <vc-footer></vc-footer>
    </v-app>
</div>
</body>
</html>
