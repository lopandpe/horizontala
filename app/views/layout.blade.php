<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Horizontala')</title>

        {{-- Bootstrap --}}
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        {{-- Custom css --}}
        <link href="{{ asset('assets/css/anarchy.css') }}" rel="stylesheet">

        {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
        {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">

            @include('topnav')
            @include('modals')

            @yield('content')
        </div>


        @include('footer')


        {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://www.openlayers.org/api/OpenLayers.js"></script>

        {{-- Include all compiled plugins (below), or include individual files as needed --}}
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/horizontala.js') }}"></script>
    </body>
</html>