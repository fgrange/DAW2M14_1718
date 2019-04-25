<html lang="en"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- JS -->
        <script src="{{ url('js/jquery.min.js')}}"></script>
        <script src="{{ url('js/CU_36.js')}}"></script>
        <script src="{{ url('js/bootstrap.min.js')}}"></script>
        <script src="{{ url('js/app.js')}}"></script>

        <!-- CSS -->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <!-- ¿En el include de CSS no deberia ser dinamico con el nombre del controlador,
        para que cada uno pudiera aplicar cambios de diseño? -->
        <link href="{{ url('css/CU_02.css')}}" rel="stylesheet" type="text/css"/>
        {{-- <link href="{{ url('css/CU_07.css')}}" rel="stylesheet" type="text/css"/> --}}
        <link href="{{ url('css/CU_36.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{ url('css/layout.css')}}">



        <title>Gestor de continguts</title>
        @yield('assets')
    </head>

    <body>

        @include('partials.navbar')
        {{-- {!! Notification::showAll() !!} --}}
        <div  class="container main">
            @yield('content')
            <!-- Crear css per cada un -->
        </div>


    </body>
  </html>
