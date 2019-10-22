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
					<?php $value = Session::has('info_company_config') ? Session::get('info_company_config') : ''; ?>
					<div class="box_style_4">
						<i class="icon_set_1_icon-90"></i>
						<h4><span>Book</span> by phone</h4>
						<a href="tel://{{ !empty($value) ? $value->phone : '' }}" class="phone">+084 {{ !empty($value) ? $value->phone : '' }}</a>
						<small>Monday to Friday 9.00am - 7.30pm</small>
					</div>

				</aside>