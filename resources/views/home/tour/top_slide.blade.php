<?php
	$data_science_on_top_tour = App\Models\CacheData::getOnTopTour('');
	$data_top_slide_tour = App\Models\CacheData::getImgBuyCate(isset($data) ? $data['cate_id'] : $data_science_on_top_tour->cate_id);
?>
<section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset(getImageTopTour($data_top_slide_tour->image)) }}" data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-2">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1>{{$data_top_slide_tour->name}}</h1>
					<span>{{isset($data) ? $data['name'] : $data_science_on_top_tour->name}}</span>
					<!--
					<span class="rating"><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small></span>
					-->
				</div>
				<div class="col-md-4">
					<?php $unit_price_top_slide = isset($data) ? $data['unit_price'] : $data_science_on_top_tour->unit_price; ?>
					@if($unit_price_top_slide > 0)
					<div id="price_single_main">
						from/per person <span><sup>$</sup>{{ number_format($unit_price_top_slide,0) }}</span>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
