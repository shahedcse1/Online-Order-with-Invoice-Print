<!doctype html>
<html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jafrin Home Made Food') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Fevicon --}}
    <link type="image/png" rel="icon" href="{{ asset('images/favicon.ico')}}">
    <link type="image/png" rel="shortcut icon" href="{{ asset('images/favicon.ico')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body>
    <!-- Page content -->
    <div id="app__auth">
      {{-- content --}}
      @yield('content')
      {{-- content --}}
    </div>
    <!-- Page content -->
  </body>

</html>
