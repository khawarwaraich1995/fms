<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'RMS') }}</title>
    </head>
    <body>
        <div id="app">
            <app-layout></app-layout>
        </div>
    </body>
    <script src="{{mix('/js/app.js')}}"></script>
</html>