
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        @yield('title')
        <title>Home | BT </title>
        <link href="{{ asset('eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
        <link href="{{ asset('eshopper/css/price-range.css') }}" rel="stylesheet">
        <link href="{{ asset('eshopper/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('eshopper/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('eshopper/css/responsive.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('search\test.css') }}">



        @yield('css')
    </head>
    <body>

     @include('components.header')
    @yield('content')
	@include('components.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

     @yield('js')
    </body>
</html>
