@extends('home.app')
@section('title', 'Vietpeacetravel')
@section('content')
    @include('home.tour.top_slide')	
    <main>
    	<div id="position">
			<div class="container">
				<ul>
					<li><a href="{{url('/')}}">Home</a>
					</li>
					<li><a href="{{ route('index.tour.list', ['id'=>0, 'name'=>'all'])}}">Tours</a>
					</li>
					<li>{{isset($data) ? $data['name'] : ''}}</li>
				</ul>
			</div>
		</div>
		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<?php
			$galleryImg = [];
			$gallery = $data['gallery'] != '' ? json_decode($data['gallery'],true)['arr_images'] : ''; 
			if(is_array($gallery) && count($gallery) > 0 ){
				foreach($gallery as $item){
					if(File::exists($item)){
						array_push($galleryImg, $item);
					}
				}
			}
		?>
		<div class="container margin_60">
			<div class="row">
				<div class="col-lg-8" id="single_tour_desc">
					<p class="d-none d-md-block d-block d-lg-none"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					@if(isset($galleryImg) && count($galleryImg) > 0)
					<div id="Img_carousel" class="slider-pro">
						<div class="sp-slides">
							<?php $i = 0; $number_img = count($galleryImg)-1; ?>						
							@for($j = 0; $j <= $number_img; $j++)
							<div class="sp-slide">
								<img alt="{{$j}}" class="sp-image" src="{{ asset('public/home/css/images/blank.gif') }}" data-src="{{ asset($galleryImg[$j]) }}" data-small="{{ asset($galleryImg[$j]) }}" data-medium="{{ asset($galleryImg[$j]) }}" data-large="{{ asset($galleryImg[$j]) }}" data-retina="{{ asset($galleryImg[$j]) }}">
							</div>
							@endfor
						</div>
						<div class="sp-thumbnails">
							@for($k = 0; $k <= $number_img; $k++)
								<img alt="{{$k}}" class="sp-thumbnail" src="{{ File::exists($galleryImg[$k]) ? asset($galleryImg[$k]) : asset($galleryImg[$k]) }}">
							@endfor
						</div>
					</div>
					<hr>
					@endif
					<div class="row">
						<div class="col-lg-12">
							{!! $data['content'] !!}
						</div>
					</div>
					<hr>
				</div>
				@include('home.tour.right')
			</div>
		</div>
        <div id="overlay"></div>
	</main>
@endsection
@section('javascript')
	<script src="{{ asset('public/home/js/common_scripts_min.js') }}"></script>
	<script src="{{ asset('public/home/js/functions.js') }}"></script>
	<script src="{{ asset('public/home/js/jquery.sliderPro.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function ($) {
			$('#Img_carousel').sliderPro({
				width: 960,
				height: 500,
				fade: true,
				arrows: true,
				buttons: false,
				fullScreen: false,
				smallSize: 500,
				startSlide: 0,
				mediumSize: 1000,
				largeSize: 3000,
				thumbnailArrows: true,
				autoplay: false
			});
		});
	</script>
	<script>
		$('input.date-pick').datepicker('setDate', 'today');
		$('input.time-pick').timepicker({
			minuteStep: 15,
			showInpunts: false
		})
	</script>
	<script src="{{ asset('public/home/assets/validate.js') }}"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="{{ asset('public/home/js/map.js') }}"></script>
	<script src="{{ asset('public/home/js/infobox.js') }}"></script>
@endsection