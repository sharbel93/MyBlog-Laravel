
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Laravel Blog @yield('title')</title>   {{-- CHANGE THIS TITLE FOR EACH PAGE --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    {{ Html::style('css/style.css') }}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{ Html::style('css/all.min.css') }}
    {{--{!! Html::style('css/select2.min.css') !!}--}}
    {{--<!-- Scripts -->--}}
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    {{--<!-- Styles -->--}}
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    @yield('stylesheets')