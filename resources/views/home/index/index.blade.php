@extends('home.app')
@section('title', 'Vietpeacetravel')
@section('content')
    <main>
    @include('home.layouts.slide')
    @include('home.index.on_top')
    @include('home.index.popular_tour')
	@include('home.index.reasons_tour')	
	</main>
@endsection