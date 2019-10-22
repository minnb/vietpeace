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
					<li><a href="#">Tour</a>
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
			if(count($gallery) > 0 ){
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
					</p><!-- Map button for tablets/mobiles -->

					@if(isset($galleryImg) && count($galleryImg) > 0)
					<div id="Img_carousel" class="slider-pro">
						<div class="sp-slides">

							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="{{ asset($galleryImg[0]) }}" data-src="{{ asset($galleryImg[0]) }}" data-small="{{ asset($galleryImg[0]) }}" data-medium="{{ asset($galleryImg[0]) }}" data-large="{{ asset($galleryImg[0]) }}" data-retina="{{ asset($galleryImg[0]) }}">
							</div>
							
							@foreach($galleryImg as $key=>$img)
							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="{{ asset('public/home/css/images/blank.gif') }}" data-src="{{ asset($img) }}" data-small="{{ asset($img) }}" data-medium="img/slider_single_tour/2_medium.jpg" data-large="{{ asset($img) }}" data-retina="{{ asset($img) }}">
								<h3 class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="40" data-show-transition="left">{{$data['name']}}</h3>
								<p class="sp-layer sp-white sp-padding" data-horizontal="40" data-vertical="100" data-show-transition="left" data-show-delay="200">
									{{$data['name']}}
								</p>
								<p class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="160" data-width="350" data-show-transition="left" data-show-delay="400">
									{{$data['name']}}
								</p>
							</div>
							@endforeach
							
							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="{{ asset('public/home/css/images/blank.gif') }}" data-src="{{ asset('public/home/img/slider_single_tour/9_medium.jpg') }}" data-small="{{ asset('public/home/img/slider_single_tour/9_small.jpg') }}" data-medium="{{ asset('public/home/img/slider_single_tour/9_medium.jpg') }}" data-large="{{ asset('public/home/img/slider_single_tour/9_large.jpg') }}" data-retina="{{ asset('public/home/img/slider_single_tour/9_large.jpg') }}">
							</div>
						</div>
						<div class="sp-thumbnails">
							@foreach($galleryImg as $key=>$img)

								<img alt="Image" class="sp-thumbnail" src="{{ File::exists($img) ? asset($img) : asset(getImgDefault()) }}">
							@endforeach
						</div>
					</div>
					<hr>
					@endif

					<div class="row">
						<div class="col-lg-3">
							<h3>Description</h3>
						</div>
						<div class="col-lg-9">
							<h4>Paris in love</h4>
							<p>
								Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui.
							</p>
							<h4>What's include</h4>
							<p>
								Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.
							</p>
							<div class="row">
								<div class="col-md-6">
									<ul class="list_ok">
										<li>Lorem ipsum dolor sit amet</li>
										<li>No scripta electram necessitatibus sit</li>
										<li>Quidam percipitur instructior an eum</li>
										<li>Ut est saepe munere ceteros</li>
										<li>No scripta electram necessitatibus sit</li>
										<li>Quidam percipitur instructior an eum</li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul class="list_ok">
										<li>Lorem ipsum dolor sit amet</li>
										<li>No scripta electram necessitatibus sit</li>
										<li>Quidam percipitur instructior an eum</li>
										<li>No scripta electram necessitatibus sit</li>
									</ul>
								</div>
							</div>
							<!-- End row  -->
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-3">
							<h3>Schedule</h3>
						</div>
						<div class="col-lg-9">

							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th colspan="2">
												1st March to 31st October
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												Monday
											</td>
											<td>
												10.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												Tuesday
											</td>
											<td>
												09.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												Wednesday
											</td>
											<td>
												09.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												Thursday
											</td>
											<td>
												<span class="label label-danger">Closed</span>
											</td>
										</tr>
										<tr>
											<td>
												Friday
											</td>
											<td>
												09.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												Saturday
											</td>
											<td>
												09.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												Sunday
											</td>
											<td>
												10.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												<strong><em>Last Admission</em></strong>
											</td>
											<td>
												<strong>17.00</strong>
											</td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th colspan="2">
												1st November to 28th February
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												Monday
											</td>
											<td>
												10.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												Tuesday
											</td>
											<td>
												09.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												Wednesday
											</td>
											<td>
												09.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												Thursday
											</td>
											<td>
												<span class="label label-danger">Closed</span>
											</td>
										</tr>
										<tr>
											<td>
												Friday
											</td>
											<td>
												09.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												Saturday
											</td>
											<td>
												09.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												Sunday
											</td>
											<td>
												10.00 - 17.30
											</td>
										</tr>
										<tr>
											<td>
												<strong><em>Last Admission</em></strong>
											</td>
											<td>
												<strong>17.00</strong>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-3">
							<h3>Reviews </h3>
							<a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Leave a review</a>
						</div>
						<div class="col-lg-9">
							<div id="general_rating">11 Reviews
								<div class="rating">
									<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
								</div>
							</div>
							<!-- End general_rating -->
							<div class="row" id="rating_summary">
								<div class="col-md-6">
									<ul>
										<li>Position
											<div class="rating">
												<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
											</div>
										</li>
										<li>Tourist guide
											<div class="rating">
												<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i>
											</div>
										</li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul>
										<li>Price
											<div class="rating">
												<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
											</div>
										</li>
										<li>Quality
											<div class="rating">
												<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- End row -->
							<hr>
							<div class="review_strip_single">
								<img src="img/avatar1.jpg" alt="Image" class="rounded-circle">
								<small> - 10 March 2015 -</small>
								<h4>Jhon Doe</h4>
								<p>
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
								</p>
								<div class="rating">
									<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
								</div>
							</div>
							<!-- End review strip -->

							<div class="review_strip_single">
								<img src="img/avatar3.jpg" alt="Image" class="rounded-circle">
								<small> - 10 March 2015 -</small>
								<h4>Jhon Doe</h4>
								<p>
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
								</p>
								<div class="rating">
									<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
								</div>
							</div>
							<!-- End review strip -->

							<div class="review_strip_single last">
								<img src="img/avatar2.jpg" alt="Image" class="rounded-circle">
								<small> - 10 March 2015 -</small>
								<h4>Jhon Doe</h4>
								<p>
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
								</p>
								<div class="rating">
									<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
								</div>
							</div>
							<!-- End review strip -->
						</div>
					</div>
				</div>
				<!--End  single_tour_desc-->

				<aside class="col-lg-4">
					<p class="d-none d-xl-block d-lg-block d-xl-none">
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					<div class="box_style_1 expose">
						<h3 class="inner">- Booking -</h3>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label><i class="icon-calendar-7"></i> Select a date</label>
									<input class="date-pick form-control" data-date-format="M d, D" type="text">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><i class=" icon-clock"></i> Time</label>
									<input class="time-pick form-control" value="12:00 AM" type="text">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Adults</label>
									<div class="numbers-row">
										<input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Children</label>
									<div class="numbers-row">
										<input type="text" value="0" id="children" class="qty2 form-control" name="quantity">
									</div>
								</div>
							</div>
						</div>
						<br>
						<table class="table table_summary">
							<tbody>
								<tr>
									<td>
										Adults
									</td>
									<td class="text-right">
										2
									</td>
								</tr>
								<tr>
									<td>
										Children
									</td>
									<td class="text-right">
										0
									</td>
								</tr>
								<tr>
									<td>
										Total amount
									</td>
									<td class="text-right">
										3x $52
									</td>
								</tr>
								<tr class="total">
									<td>
										Total cost
									</td>
									<td class="text-right">
										$154
									</td>
								</tr>
							</tbody>
						</table>
						<a class="btn_full" href="cart.html">Book now</a>
						<a class="btn_full_outline" href="#"><i class=" icon-heart"></i> Add to whislist</a>
					</div>
					<!--/box_style_1 -->

					<div class="box_style_4">
						<i class="icon_set_1_icon-90"></i>
						<h4><span>Book</span> by phone</h4>
						<a href="tel://004542344599" class="phone">+45 423 445 99</a>
						<small>Monday to Friday 9.00am - 7.30pm</small>
					</div>

				</aside>
			</div>
			<!--End row -->
		</div>
		<!--End container -->
        
        <div id="overlay"></div>
		<!-- Mask on input focus -->
        
	</main>
	<!-- End main -->
@endsection