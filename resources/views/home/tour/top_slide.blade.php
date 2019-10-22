<?php
	$cate_single_tour = App\Models\Category::getImgBuyCate(isset($data) ? $data['cate_id'] : '')
?>
<section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset(getImageTopTour($cate_single_tour->image)) }}" data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-2">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1>{{$cate_single_tour->name}}</h1>
					<span>{{isset($data) ? $data['name'] : 0}}</span>
					<!--
					<span class="rating"><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small></span>
					-->
				</div>
				<div class="col-md-4">
					<div id="price_single_main">
						from/per person <span><sup>$</sup>{{isset($data) ? $data['unit_price'] : 0}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
