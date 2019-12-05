<aside class="col-lg-3">
	<?php
		$data_list_all_tour_left_menu = App\Models\CacheData::getTourListAll();
		$destinations_list_left_menu = App\Models\Category::getSelect2Category(1);
		$tours_list_left_menu = App\Models\Category::getSelect2Category(1);
	?>
	@if(isset($tours_list_left_menu))
	<div class="box_style_cat">
		<ul id="cat_nav">
			<li><a href="{{ route('index.tour.list', ['id'=>0, 'name'=>'all']) }}" id="active"><i class="icon_set_1_icon-51"></i>All tours <span>({{ count($data_list_all_tour_left_menu) }})</span></a>
			</li>
			@foreach($tours_list_left_menu as $key=>$item_tour)
				<li>
					<a href="{{ route('index.tour.list', ['id'=>$item_tour->id, 'name'=>makeUnicode($item_tour->name)]) }}"><i class="icon_set_1_icon-{{$key + 1}}"></i> {!! $item_tour->name !!}<span> ({{ App\Models\Post::PostCountByCate($data_list_all_tour_left_menu, $item_tour->id) }})</span></a>
				</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div id="filters_col">
		<a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters</a>
		<div class="collapse show" id="collapseFilters">
			<div class="filter_type">
				<h6>Price</h6>
				<input type="text" id="range" name="range" value="">
			</div>
			<div class="filter_type">
				<h6>Rating</h6>
				<ul>
					<li>
						<label>
							<input type="checkbox"><span class="rating">
							<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i>
							</span>
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox"><span class="rating">
							<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i>
							</span>
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox"><span class="rating">
							<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
							</span>
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox"><span class="rating">
							<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
							</span>
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox"><span class="rating">
							<i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
							</span>
						</label>
					</li>
				</ul>
			</div>
			<div class="filter_type">
				<h6>Facility</h6>
				<ul>
					<li>
						<label>
							<input type="checkbox">Pet allowed
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox">Groups allowed
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox">Tour guides
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox">Access for disabled
						</label>
					</li>
				</ul>
			</div>
		</div>
		<!--End collapse -->
	</div>
	<?php $company_phone = Cache::has('info_company_config') ? Cache::get('info_company_config') : ''; ?>
	<div class="box_style_2">
		<i class="icon_set_1_icon-57"></i>
		<h4>Need <span>Help?</span></h4>
		<a href="tel://004542344599" class="phone">{{ !empty($company_phone) ? $company_phone->phone : '' }}</a>
		<small>Monday to Friday 9.00am - 7.30pm</small>
	</div>
</aside>
<!--End aside -->