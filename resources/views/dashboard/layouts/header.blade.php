<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>VietpeaceTravel - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="">
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link type="text/css" rel="stylesheet" href="{{ asset('dashboard/css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('dashboard/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('dashboard/css/fonts.googleapis.com.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('dashboard/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('dashboard/css/ace-skins.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('dashboard/css/ace-rtl.min.css') }}" />
    @yield('stylesheet')
    <script src="{{ asset('dashboard/js/ace-extra.min.js') }}"></script>
        <script type="text/javascript">
        var baseURL = "{!! url('/') !!}";
        window.setTimeout(function() {
            $("#flash-message").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
            });
        }, 5000);
    </script>
</head>
<body class="no-skin">