<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'RMS') }}</title>
        <link rel="stylesheet" href="{{ asset('theme1') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('theme1') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('theme1') }}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('theme1') }}/fonts/themify-icons/themify-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&amp;family=Righteous&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('theme1') }}/css/hc-offcanvas-nav.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('theme1') }}/css/default30f4.css?v=3">
    <style>
        :root {
            --theme-color: #ff3252;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('theme1') }}/css/style30f4.css?v=3">
    <link rel="stylesheet" href="{{ asset('theme1') }}/css/responsive30f4.css?v=3">
    </head>
    <body>
        <div id="app">
            <app-layout></app-layout>
        </div>
    </body>
    <script src="{{mix('/js/app.js')}}"></script>

    <script src="{{ asset('theme1') }}/js/vendor/jquery-3.5.1.min.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;language=en&amp;key=AIzaSyAHmGT1kzyIK8bgc7Mqrn2bpaIQ-IlUTtE"></script>
    <script src="{{ asset('theme1') }}/js/store/home.js"></script>
    <script src="{{ asset('theme1') }}/js/jquery.unveil.js"></script>
    <script src="{{ asset('theme1') }}/js/store/store.js"></script>
    <script src="{{ asset('theme1') }}/js/store/cart.js"></script>
    <script src="{{ asset('theme1') }}/js/popper.min.js"></script>
    <script src="{{ asset('theme1') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('theme1') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('theme1') }}/js/hc-offcanvas-nav.js"></script>
    <script src="{{ asset('theme1') }}/js/simpler-sidebar.js"></script>
    <script src="{{ asset('theme1') }}/js/main.js"></script>
</html>