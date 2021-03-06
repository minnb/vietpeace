<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	@if(isset($seo_meta))
		<meta name="description" content="{!! $seo_meta !!}">
	@else
   		<meta name="description" content="VietpeaceTravel - reliable tour operator in Vietnam, offering private and tailor-made tour packages in Vietnam, Cambodia, Laos, Myanmar and Thailand that meet traveller's needs and budget.">
    @endif
    <meta name="author" content="VietpeaceTravel">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VietpeaceTravel - @if(isset($page_title)) {!! $page_title !!} @endif</title>
    <link rel="shortcut icon" href="{{ asset('public/home/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('public/home/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('public/public/home/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('public/home/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('public/home/img/apple-touch-icon-144x144-precomposed.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,700" rel="stylesheet">
	<link href="{{ asset('public/home/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/home/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('public/home/css/vendors.css') }}" rel="stylesheet">
	<link href="{{ asset('public/home/css/custom.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/home/rev-slider-files/fonts/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/home/rev-slider-files/css/settings.css') }}">  
	<style>
		.tp-caption.NotGeneric-Title,
		.NotGeneric-Title {
			color: rgba(255, 255, 255, 1.00);
			font-size: 70px;
			line-height: 70px;
			font-weight: 800;
			font-style: normal;
			text-decoration: none;
			background-color: transparent;
			border-color: transparent;
			border-style: none;
			border-width: 0px;
			border-radius: 0 0 0 0px
		}
		.tp-caption.NotGeneric-SubTitle,
		.NotGeneric-SubTitle {
			color: rgba(255, 255, 255, 1.00);
			font-size: 13px;
			line-height: 20px;
			font-weight: 500;
			font-style: normal;
			text-decoration: none;
			background-color: transparent;
			border-color: transparent;
			border-style: none;
			border-width: 0px;
			border-radius: 0 0 0 0px;
			letter-spacing: 4px
		}
		.tp-caption.NotGeneric-Icon,
		.NotGeneric-Icon {
			color: rgba(255, 255, 255, 1.00);
			font-size: 30px;
			line-height: 30px;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			background-color: rgba(0, 0, 0, 0);
			border-color: rgba(255, 255, 255, 0);
			border-style: solid;
			border-width: 0px;
			border-radius: 0px 0px 0px 0px;
			letter-spacing: 3px
		}
		.tp-caption.NotGeneric-Button,
		.NotGeneric-Button {
			color: rgba(255, 255, 255, 1.00);
			font-size: 14px;
			line-height: 14px;
			font-weight: 500;
			font-style: normal;
			text-decoration: none;
			background-color: rgba(0, 0, 0, 0);
			border-color: rgba(255, 255, 255, 0.50);
			border-style: solid;
			border-width: 1px;
			border-radius: 0px 0px 0px 0px;
			letter-spacing: 3px
		}
		.tp-caption.NotGeneric-Button:hover,
		.NotGeneric-Button:hover {
			color: rgba(255, 255, 255, 1.00);
			text-decoration: none;
			background-color: transparent;
			border-color: rgba(255, 255, 255, 1.00);
			border-style: solid;
			border-width: 1px;
			border-radius: 0px 0px 0px 0px;
			cursor: pointer
		}
	</style>
</head>
<body>

