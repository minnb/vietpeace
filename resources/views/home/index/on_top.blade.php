<?php
	$data_on_top_tour = App\Models\Post::orderBy('id','desc')->limit(6)->get();
	$data_list_tour_session = App\Models\CacheData::getTourListAll();
?>
@if(!empty($data_on_top_tour))
<div class="container margin_60">
	<div class="main_title">
		<h2>Vietnam <span>Top</span> Tours</h2>
		<p>Best tour in Vietnam, more than 20,000 smiles of satisfied customers</p>
	</div>
	<div class="row">
		@foreach($data_on_top_tour as $key=>$item)
		<div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.{{$key}}s">
			<div class="tour_container">
				<div class="ribbon_3 popular"><span>Popular</span></div>
				<div class="img_container">
					<a href="{{ route('index.tour.single', ['id'=>fencrypt($item['id']), 'name'=>makeUnicode($item['name']).'.htm']) }}">
						<img src="{{ asset($item['image']) }}" width="800" height="533" class="img-fluid" alt="{!! $item['name'] !!}">
						<div class="short_info">
							<i class="icon_set_1_icon-44"></i>Historic Buildings<span class="price"><sup>$</sup> {!! number_format($item['unit_price']) !!}</span>
						</div>
					</a>
				</div>
				<div class="tour_title">
					<h3><strong>{!! $item['name'] !!}</strong> tour</h3>
					<div class="rating">
						<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
					</div>
					<div class="wishlist">
						<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<p class="text-center add_bottom_30">
		<a href="{{ route('index.tour.list',['id'=>'0','name'=>'all']) }}" class="btn_1 medium"><i class="icon-eye-7"></i>View all tours ({{$data_list_tour_session->count()}}) </a>
	</p>
	<hr>
</div>
@endif