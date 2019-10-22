@extends('home.app')
@section('title', 'Vietpeacetravel')
@section('content')
    <main>
    @include('home.layouts.slide')
    @include('home.layouts.on_top')
    @include('home.layouts.popular_tour')
	@include('home.layouts.reasons_tour')	
	</main>
@endsection