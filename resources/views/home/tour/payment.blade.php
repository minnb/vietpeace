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
					<li>{{isset($data) ? $data['name'] : 'Checkout'}}</li>
				</ul>
			</div>
		</div>
		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<?php
			$galleryImg = [];
			if(isset($data)){
				$gallery = $data['gallery'] != '' ? json_decode($data['gallery'],true)['arr_images'] : ''; 
				if(is_array($gallery) && count($gallery) > 0 ){
					foreach($gallery as $item){
						if(File::exists($item)){
							array_push($galleryImg, $item);
						}
					}
				}
			}
			$attributes = [];
			$items = '';
			if(!Cart::isEmpty()){
				$items = Cart::getContent();
				$array_atr= [];
				foreach($items as $key=>$item){
					array_push($array_atr,$item->attributes);
				}
				$attributes = end($array_atr);
			}
		?>
		<div class="container margin_60">
			<div class="row">
				<div class="col-lg-8 add_bottom_15">
					<div class="form_title">
						<h3><strong></strong>Your Details</h3>
						<p>
							
						</p>
					</div>
					<div class="step">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Country</label>
									<select class="form-control" name="country" id="country">
										<option value="" selected>Select your country</option>
										<option value="Europe">Europe</option>
										<option value="United states">United states</option>
										<option value="Asia">Asia</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>First name</label>
									<input type="text" class="form-control" id="firstname_booking" name="firstname_booking">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Last name</label>
									<input type="text" class="form-control" id="lastname_booking" name="lastname_booking">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Email</label>
									<input type="email" id="email_booking" name="email_booking" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Telephone</label>
									<input type="text" id="telephone_booking" name="telephone_booking" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div id="policy">
						<h4>Cancellation policy</h4>
						<div class="form-group">
							<label>
								<input type="checkbox" name="policy_terms" id="policy_terms"> I accept terms and conditions and general policy.</label>
						</div>
						<a href="confirmation.html" class="btn_1 green medium">Book now</a>
					</div>
				</div>
				<aside class="col-lg-4">
					<form action="{!! route('index.tour.payment.post') !!}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
					<div class="box_style_1">
						<h3 class="inner">- Summary -</h3>
						<table class="table table_summary">
							<tbody>
								<tr>
									<td>
										Adults
									</td>
									<td class="text-right">
										{{ isset($attributes['adults']) ? $attributes['adults'] : 0}}
									</td>
								</tr>
								<tr>
									<td>
										Children
									</td>
									<td class="text-right">
										{{ isset($attributes['children']) ? $attributes['children'] : 0}}
									</td>
								</tr>
								<tr class="total">
									<td>
										Total cost
									</td>
									<td class="text-right">
										{{ Cart::getSubTotal() }}
									</td>
								</tr>
							</tbody>
						</table>
						<button type="submit" class="btn_full">Book now</button>
						<a class="btn_full_outline" href="{{ url('/') }}"><i class="icon-right"></i> Continue booking</a>
					</div>
					<?php $company_phone = Cache::has('info_company_config') ? Cache::get('info_company_config') : ''; ?>
					<div class="box_style_4">
						<i class="icon_set_1_icon-57"></i>
						<h4>Need <span>Help?</span></h4>
						<a href="tel://004542344599" class="phone">{{ !empty($company_phone) ? $company_phone->phone : '' }}</a>
						<small>Monday to Friday 9.00am - 7.30pm</small>
					</div>
					</form>
				</aside>
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