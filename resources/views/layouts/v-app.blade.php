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
        <v-app-bar color="white" height="65" app clipped-left>
            <v-toolbar-title>
                <a href="/">a</a>
                <img src="{{ asset('assets/logo.png') }}" alt="logo" class="logo-img">
            </v-toolbar-title>
            <v-spacer></v-spacer>
            @guest
                <v-btn text href="{{ route('login') }}">{{ __('Login') }}</v-btn>
                @if (Route::has('register'))
                    <v-btn text href="{{ route('register') }}">{{ __('Register') }}</v-btn>
                @endif
            @else
                <v-menu offset-y>
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn
                            text
                            v-bind="attrs"
                            v-on="on"
                        >
                            {{ Auth::user()->name }}
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <v-list-item-title>
                                {{ __('Logout') }}
                            </v-list-item-title>
                        </v-list-item>
                    </v-list>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </v-menu>
            @endguest
        </v-app-bar>
        <v-main>
            @yield('content')
        </v-main>
        <vc-footer></vc-footer>
    </v-app>
</div>
</body>
</html>
