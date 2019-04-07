<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Title -->
    <title>{{ config('app.name', '404') }}</title>

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('fonts/feather/feather.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/highlight.js/styles/vs2015.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/quill/dist/quill.core.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/flatpickr/dist/flatpickr.min.css') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Theme CSS -->
    {{--<link rel="stylesheet" href="{{ asset('css/theme.min.css') }}" id="stylesheetLight">--}}
    <link rel="stylesheet" href="{{ asset('css/theme-dark.min.css') }}" id="stylesheetDark">
    <style>
        body {
            display: none;
        }
    </style>

    <!-- C S R F TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

@yield('content')

</body>

<!-- Libs JS -->
<script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('libs/highlightjs/highlight.pack.min.js') }}"></script>
<script src="{{ asset('libs/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('libs/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
<script src="{{ asset('libs/list.js/dist/list.min.js') }}"></script>
<script src="{{ asset('libs/quill/dist/quill.min.js') }}"></script>
<script src="{{ asset('libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('libs/chart.js/Chart.extension.min.js') }}"></script>
<script src="{{ asset('js/theme.min.js') }}"></script>
</html>
