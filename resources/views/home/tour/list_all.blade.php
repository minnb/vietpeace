@extends('home.app')
@section('title', 'Vietpeacetravel')
@section('content')
   	@include('home.tour.top_slide')
    <main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="{{ url('/') }}">Home</a>
					</li>
					<li><a href="{{ route('index.tour.list', ['id'=>0, 'name'=>'all'])}}">Tours</a>
					</li>
					<li>All</li>
				</ul>
			</div>
		</div>
		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->
		<div class="container margin_60">
			<div class="row">
				@include('home.tour.left')
				<div class="col-lg-9">
					<div id="tools">
						<div class="row">
							<div class="col-md-3 col-sm-4 col-6">
								<div class="styled-select-filters">
									<select name="sort_price" id="sort_price">
										<option value="" selected>Sort by price</option>
										<option value="lower">Lowest price</option>
										<option value="higher">Highest price</option>
									</select>
								</div>
							</div>
							<div class="col-md-3 col-sm-4 col-6">
								<div class="styled-select-filters">
									<select name="sort_rating" id="sort_rating">
										<option value="" selected>Sort by ranking</option>
										<option value="lower">Lowest ranking</option>
										<option value="higher">Highest ranking</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-4 d-none d-sm-block text-right">
								<a href="all_tours_grid.html" class="bt_filters"><i class="icon-th"></i></a> <a href="#" class="bt_filters"><i class=" icon-list"></i></a>
							</div>

						</div>
					</div>
					<!--/tools -->
					@if(isset($data_tour_all))
					@foreach($data_tour_all as $key=>$item)
					<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4">
								<div class="ribbon_3 popular"><span>Popular</span>
								</div>
								<div class="wishlist">
									<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
								</div>
								<div class="img_list">
									<a href="{{ route('index.tour.single', ['id'=>fencrypt($item->id), 'name'=>makeUnicode($item->name).'.htm']) }}"><img src="{!! asset($item->image) !!}" alt="{!! $item->name !!}">
										<div class="short_info"><i class="icon_set_1_icon-4"></i>Museums </div>
									</a>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="tour_list_desc">
									<div class="rating"><i class="icon-smile voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile"></i><small>(75)</small>
									</div>
									<h3><strong>{!! $item->name !!}</strong> tour</h3>
									<p>{!! substr($item->description, 0, 150) !!}</p>
									<ul class="add_info">
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-83"></i></span>
												<div class="tooltip-content">
													<h4>Schedule</h4>
													<strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
													<br>
													<strong>Saturday</strong> 09.00 AM - 5.30 PM
													<br>
													<strong>Sunday</strong> <span class="label label-danger">Closed</span>
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>
												<div class="tooltip-content">
													<h4>Address</h4> Musée du Louvre, 75058 Paris - France
													<br>
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-97"></i></span>
												<div class="tooltip-content">
													<h4>Languages</h4> English - French - Chinese - Russian - Italian
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-27"></i></span>
												<div class="tooltip-content">
													<h4>Parking</h4> 1-3 Rue Elisée Reclus
													<br> 76 Rue du Général Leclerc
													<br> 8 Rue Caillaux 94923
													<br>
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-25"></i></span>
												<div class="tooltip-content">
													<h4>Transport</h4>
													<strong>Metro: </strong>Musée du Louvre station (line 1)
													<br>
													<strong>Bus:</strong> 21, 24, 27, 39, 48, 68, 69, 72, 81, 95
													<br>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2">
								<div class="price_list">
									<div>	<!--<sup>$</sup>39*-->
										<span style="text-decoration:none;" class="normal_price_list">${{ number_format($item->unit_price) }}</span>
										<small>*Per person</small>
										<p><a href="{{ route('index.tour.single', ['id'=>fencrypt($item->id), 'name'=>makeUnicode($item->name).'.htm']) }}" class="btn_1">Details</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>
					@endforeach
					<hr>
					<nav aria-label="Page navigation">
						{{ $data_tour_all->links() }}
					</nav>
					@endif
				</div>
			</div>
		</div>
	</main>
@endsection
@section('javascript')
	<script src="{{ asset('public/home/js/common_scripts_min.js') }}"></script>
	<script src="{{ asset('public/home/js/functions.js') }}"></script>
	<script src="{{ asset('public/home/js/jquery.sliderPro.min.js') }}"></script>
	<script src="{{ asset('public/home/js/cat_nav_mobile.js') }}"></script>
	<script>
		$('#cat_nav').mobileMenu();
	</script>

	<!-- Map -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="{{ asset('public/home/js/map.js') }}"></script>
	<script src="{{ asset('public/home/js/infobox.js') }}"></script>
	
	<!-- Check box and radio style iCheck -->
	<script>
		$('input').iCheck({
		   checkboxClass: 'icheckbox_square-grey',
		   radioClass: 'iradio_square-grey'
		 });
	</script>
@endsection