<aside class="col-lg-4">
	<!--
	<p class="d-none d-xl-block d-lg-block d-xl-none">
		<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
	</p>
	-->
	<div class="box_style_1 expose">
		<form action="{!! route('index.tour.book.post', ['id'=>fencrypt($single_tour_id)]) !!}" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
			<h3 class="inner">- Booking -</h3>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><i class="icon-calendar-7"></i> Select a date</label>
						<input name="book_date" class="date-pick form-control" data-date-format="yyyy-mm-dd" type="text">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label><i class=" icon-clock"></i> Time</label>
						<input name="book_time" class="time-pick form-control" value="12:00 AM" type="text">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label>Adults</label>
						<div class="numbers-row">
							<input type="text" value="1" id="adults" class="qty2 form-control" name="quantity_adults">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label>Children</label>
						<div class="numbers-row">
							<input type="text" value="0" id="children" class="qty2 form-control" name="quantity_children">
						</div>
					</div>
				</div>
			</div>
			<br>
			<button type="submit" class="btn_full">Book now</button>
			<a class="btn_full_outline" href="#"><i class=" icon-heart"></i> Add to whislist</a>
		</form>
	</div>
	<!--/box_style_1 -->
	<?php $company_phone = Cache::has('info_company_config') ? Cache::get('info_company_config') : ''; ?>
	<div class="box_style_4">
		<i class="icon_set_1_icon-90"></i>
		<h4><span>Book</span> by phone</h4>
		<a href="tel://{{ !empty($company_phone) ? $company_phone->phone : '' }}" class="phone">{{ !empty($company_phone) ? $company_phone->phone : '' }}</a>
		<small>Monday to Friday 9.00am - 7.30pm</small>
	</div>
</aside>