<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>VCM - @yield('title')</title>
     <link rel="shortcut icon" href="">
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link type="text/css" rel="stylesheet" href="{{ asset('public/dashboard/css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('public/dashboard/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('public/dashboard/css/fonts.googleapis.com.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('public/dashboard/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('public/dashboard/css/ace-skins.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('public/dashboard/css/ace-rtl.min.css') }}" />
    @yield('stylesheet')
    <script src="{{ asset('public/dashboard/js/ace-extra.min.js') }}"></script>
</head>
<body class="no-skin">