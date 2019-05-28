@extends('master')
@section('banner')
	<!-- banner -->
	<div class="banner">
		<div class="container">
			<h3>Electronic Store, <span>Special Offers</span></h3>
		</div>
	</div>
	<!-- //banner -->
	<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="col-md-12 wthree_banner_bottom_right">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						@foreach($types as  $key => $type)
							<li role="presentation" class="{!! ($key == 0)?'active':'' !!}"><a href="#{!! $type['id'] !!}" role="tab" id="tv-tab" data-toggle="tab" aria-controls="tv">{!! $type->name !!}</a></li>
						@endforeach
					</ul>
					<div id="myTabContent" class="tab-content">
						@foreach($types as $key => $type)
							<div role="tabpanel" class="tab-pane {!! ($key == 0)?'active':'fade' !!}" id="{!! $type['id'] !!}" aria-labelledby="audio-tab">
								<div class="agile_ecommerce_tabs">
									@foreach($products[$type['id']] as $product)
										<div class="col-md-4 agile_ecommerce_tab_left">
											<div class="hs-wrapper">
												<img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
												<img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
												<img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
												<img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
												<img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
												<img src="{{ asset( '/public/images/'.$product['img'])  }}" alt=" " class="img-responsive" />
												<div class="w3_hs_bottom">
													<ul>
														<li>
															<a href="{!! route('chi-tiet',['id'=>$product['id']]) !!}" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
														</li>
													</ul>
												</div>
											</div>
											<h5><a href="{!! route('chi-tiet',['id'=>$product['id']]) !!}">{{ $product['name'] }}</a></h5>

											<!--Chuc nang gio hang-->
											<div class="simpleCart_shelfItem">
												<p><i class="item_price">{{ '$'.$product['price'] }}</i></p>

												<form action="{!! route('addCart') !!}" method="post">
													<input type="hidden" name="_token" value="{!! csrf_token() !!}">
													<input type="hidden" name="id" value="{!! $product['id'] !!}" />
													<input type="hidden" name="quantity" value="1" />
													<button type="submit" class="w3ls-cart">Add to cart</button>
												</form>
											</div>
										</div>
									@endforeach
									<div class="clearfix"> </div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<!-- //banner-bottom -->

		<!-- modal-video -->
		<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<section>
						<div class="modal-body">
							<div class="col-md-5 modal_body_left">
								<img src="images/3.jpg" alt=" " class="img-responsive" />
							</div>
							<div class="col-md-7 modal_body_right">
								<h4>The Best Mobile Phone 3GB</h4>
								<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
								<div class="rating">
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="modal_body_right_cart simpleCart_shelfItem">
									<p><span>$380</span> <i class="item_price">$350</i></p>
									<form action="#" method="post">
										<input type="hidden" name="cmd" value="_cart">
										<input type="hidden" name="add" value="1">
										<input type="hidden" name="w3ls_item" value="Mobile Phone1">
										<input type="hidden" name="amount" value="350.00">
										<button type="submit" class="w3ls-cart">Add to cart</button>
									</form>
								</div>
								<h5>Color</h5>
								<div class="color-quality">
									<ul>
										<li><a href="#"><span></span></a></li>
										<li><a href="#" class="brown"><span></span></a></li>
										<li><a href="#" class="purple"><span></span></a></li>
										<li><a href="#" class="gray"><span></span></a></li>
									</ul>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="modal video-modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<section>
						<div class="modal-body">
							<div class="col-md-5 modal_body_left">
								<img src="images/9.jpg" alt=" " class="img-responsive" />
							</div>
							<div class="col-md-7 modal_body_right">
								<h4>Multimedia Home Accessories</h4>
								<p>Ut enim ad minim veniam, quis nostrud
									exercitation ullamco laboris nisi ut aliquip ex ea
									commodo consequat.Duis aute irure dolor in
									reprehenderit in voluptate velit esse cillum dolore
									eu fugiat nulla pariatur. Excepteur sint occaecat
									cupidatat non proident, sunt in culpa qui officia
									deserunt mollit anim id est laborum.</p>
								<div class="rating">
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="modal_body_right_cart simpleCart_shelfItem">
									<p><span>$180</span> <i class="item_price">$150</i></p>
									<form action="#" method="post">
										<input type="hidden" name="cmd" value="_cart">
										<input type="hidden" name="add" value="1">
										<input type="hidden" name="w3ls_item" value="Headphones">
										<input type="hidden" name="amount" value="150.00">
										<button type="submit" class="w3ls-cart">Add to cart</button>
									</form>
								</div>
								<h5>Color</h5>
								<div class="color-quality">
									<ul>
										<li><a href="#"><span></span></a></li>
										<li><a href="#" class="brown"><span></span></a></li>
										<li><a href="#" class="purple"><span></span></a></li>
										<li><a href="#" class="gray"><span></span></a></li>
									</ul>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="modal video-modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<section>
						<div class="modal-body">
							<div class="col-md-5 modal_body_left">
								<img src="images/11.jpg" alt=" " class="img-responsive" />
							</div>
							<div class="col-md-7 modal_body_right">
								<h4>Quad Core Colorful Laptop</h4>
								<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in
									reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia  deserunt.</p>
								<div class="rating">
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="modal_body_right_cart simpleCart_shelfItem">
									<p><span>$880</span> <i class="item_price">$850</i></p>
									<form action="#" method="post">
										<input type="hidden" name="cmd" value="_cart">
										<input type="hidden" name="add" value="1">
										<input type="hidden" name="w3ls_item" value="Laptop">
										<input type="hidden" name="amount" value="850.00">
										<button type="submit" class="w3ls-cart">Add to cart</button>
									</form>
								</div>
								<h5>Color</h5>
								<div class="color-quality">
									<ul>
										<li><a href="#"><span></span></a></li>
										<li><a href="#" class="brown"><span></span></a></li>
										<li><a href="#" class="purple"><span></span></a></li>
										<li><a href="#" class="gray"><span></span></a></li>
									</ul>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="modal video-modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal3">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<section>
						<div class="modal-body">
							<div class="col-md-5 modal_body_left">
								<img src="images/14.jpg" alt=" " class="img-responsive" />
							</div>
							<div class="col-md-7 modal_body_right">
								<h4>Cool Single Door Refrigerator </h4>
								<p>Duis aute irure dolor inreprehenderit in voluptate velit esse cillum dolore
									eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<div class="rating">
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="modal_body_right_cart simpleCart_shelfItem">
									<p><span>$950</span> <i class="item_price">$820</i></p>
									<form action="#" method="post">
										<input type="hidden" name="cmd" value="_cart">
										<input type="hidden" name="add" value="1">
										<input type="hidden" name="w3ls_item" value="Mobile Phone1">
										<input type="hidden" name="amount" value="820.00">
										<button type="submit" class="w3ls-cart">Add to cart</button>
									</form>
								</div>
								<h5>Color</h5>
								<div class="color-quality">
									<ul>
										<li><a href="#"><span></span></a></li>
										<li><a href="#" class="brown"><span></span></a></li>
										<li><a href="#" class="purple"><span></span></a></li>
										<li><a href="#" class="gray"><span></span></a></li>
									</ul>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="modal video-modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModal4">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<section>
						<div class="modal-body">
							<div class="col-md-5 modal_body_left">
								<img src="images/17.jpg" alt=" " class="img-responsive" />
							</div>
							<div class="col-md-7 modal_body_right">
								<h4>New Model Mixer Grinder</h4>
								<p>Excepteur sint occaecat laboris nisi ut aliquip ex ea
									commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
									eu fugiat nulla pariatur cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<div class="rating">
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="modal_body_right_cart simpleCart_shelfItem">
									<p><span>$460</span> <i class="item_price">$450</i></p>
									<form action="#" method="post">
										<input type="hidden" name="cmd" value="_cart">
										<input type="hidden" name="add" value="1">
										<input type="hidden" name="w3ls_item" value="Mobile Phone1">
										<input type="hidden" name="amount" value="450.00">
										<button type="submit" class="w3ls-cart">Add to cart</button>
									</form>
								</div>
								<h5>Color</h5>
								<div class="color-quality">
									<ul>
										<li><a href="#"><span></span></a></li>
										<li><a href="#" class="brown"><span></span></a></li>
										<li><a href="#" class="purple"><span></span></a></li>
										<li><a href="#" class="gray"><span></span></a></li>
									</ul>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="modal video-modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModal5">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<section>
						<div class="modal-body">
							<div class="col-md-5 modal_body_left">
								<img src="images/36.jpg" alt=" " class="img-responsive" />
							</div>
							<div class="col-md-7 modal_body_right">
								<h4>Dry Vacuum Cleaner</h4>
								<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
									cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<div class="rating">
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="modal_body_right_cart simpleCart_shelfItem">
									<p><span>$960</span> <i class="item_price">$920</i></p>
									<form action="#" method="post">
										<input type="hidden" name="cmd" value="_cart">
										<input type="hidden" name="add" value="1">
										<input type="hidden" name="w3ls_item" value="Vacuum Cleaner">
										<input type="hidden" name="amount" value="920.00">
										<button type="submit" class="w3ls-cart">Add to cart</button>
									</form>
								</div>
								<h5>Color</h5>
								<div class="color-quality">
									<ul>
										<li><a href="#"><span></span></a></li>
										<li><a href="#" class="brown"><span></span></a></li>
										<li><a href="#" class="purple"><span></span></a></li>
										<li><a href="#" class="gray"><span></span></a></li>
									</ul>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="modal video-modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModal6">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<section>
						<div class="modal-body">
							<div class="col-md-5 modal_body_left">
								<img src="images/37.jpg" alt=" " class="img-responsive" />
							</div>
							<div class="col-md-7 modal_body_right">
								<h4>Kitchen & Dining Accessories</h4>
								<p>Ut enim ad minim veniam, quis nostrud
									exercitation ullamco laboris nisi ut aliquip ex ea
									commodo consequat.Duis aute irure dolor in
									reprehenderit in voluptate velit esse cillum dolore
									eu fugiat nulla pariatur. Excepteur sint occaecat
									cupidatat non proident, sunt in culpa qui officia
									deserunt mollit anim id est laborum.</p>
								<div class="rating">
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star-.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/star.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="modal_body_right_cart simpleCart_shelfItem">
									<p><span>$280</span> <i class="item_price">$250</i></p>
									<form action="#" method="post">
										<input type="hidden" name="cmd" value="_cart">
										<input type="hidden" name="add" value="1">
										<input type="hidden" name="w3ls_item" value="Induction Stove">
										<input type="hidden" name="amount" value="250.00">
										<button type="submit" class="w3ls-cart">Add to cart</button>
									</form>
								</div>
								<h5>Color</h5>
								<div class="color-quality">
									<ul>
										<li><a href="#"><span></span></a></li>
										<li><a href="#" class="brown"><span></span></a></li>
										<li><a href="#" class="purple"><span></span></a></li>
										<li><a href="#" class="gray"><span></span></a></li>
									</ul>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<!-- //modal-video -->
		<!-- special-deals -->
		<div class="special-deals">
			<div class="container">
				<h2>Special Deals</h2>
				<div class="w3agile_special_deals_grids">
					<div class="col-md-7 w3agile_special_deals_grid_left">
						<div class="w3agile_special_deals_grid_left_grid">
							<img src="{!! url("public/images/21.jpg") !!}" alt=" " class="img-responsive" />
							<div class="w3agile_special_deals_grid_left_grid_pos1">
								<h5>30%<span>Off/-</span></h5>
							</div>
							<div class="w3agile_special_deals_grid_left_grid_pos">
								<h4>We Offer <span>Best Products</span></h4>
							</div>
						</div>
						<div class="wmuSlider example1">
							<div class="wmuSliderWrapper">
								<article style="position: absolute; width: 100%; opacity: 0;">
									<div class="banner-wrap">
										<div class="w3agile_special_deals_grid_left_grid1">
											<img src="{!! url("public/images/t1.png") !!}" alt=" " class="img-responsive" />
											<p>Quis autem vel eum iure reprehenderit qui in ea voluptate
												velit esse quam nihil molestiae consequatur, vel illum qui dolorem
												eum fugiat quo voluptas nulla pariatur</p>
											<h4>Laura</h4>
										</div>
									</div>
								</article>
								<article style="position: absolute; width: 100%; opacity: 0;">
									<div class="banner-wrap">
										<div class="w3agile_special_deals_grid_left_grid1">
											<img src="images/t2.png" alt=" " class="img-responsive" />
											<p>Quis autem vel eum iure reprehenderit qui in ea voluptate
												velit esse quam nihil molestiae consequatur, vel illum qui dolorem
												eum fugiat quo voluptas nulla pariatur</p>
											<h4>Michael</h4>
										</div>
									</div>
								</article>
								<article style="position: absolute; width: 100%; opacity: 0;">
									<div class="banner-wrap">
										<div class="w3agile_special_deals_grid_left_grid1">
											<img src="images/t3.png" alt=" " class="img-responsive" />
											<p>Quis autem vel eum iure reprehenderit qui in ea voluptate
												velit esse quam nihil molestiae consequatur, vel illum qui dolorem
												eum fugiat quo voluptas nulla pariatur</p>
											<h4>Rosy</h4>
										</div>
									</div>
								</article>
							</div>
						</div>
						<script src="{!! url("public/js/jquery.wmuSlider.js") !!}" ></script>
						<script>
							$('.example1').wmuSlider();
						</script>
					</div>
					<div class="col-md-5 w3agile_special_deals_grid_right">
						<img src="{!! url("public/images/20.jpg") !!}" alt=" " class="img-responsive" />
						<div class="w3agile_special_deals_grid_right_pos">
							<h4>Women's <span>Special</span></h4>
							<h5>save up <span>to</span> 30%</h5>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //special-deals -->
		<!-- new-products -->
		<div class="new-products">
			<div class="container">
				<h3>New Products</h3>
				<div class="agileinfo_new_products_grids">
					@foreach($newest_products as $newest_product)
						<div class="col-md-4 agile_ecommerce_tab_left">
							<div class="hs-wrapper">
								<img src="{{ asset( '/public/images/'.$newest_product['img'])  }}" alt=" " class="img-responsive" />
								<img src="{{ asset( '/public/images/'.$newest_product['img'])  }}" alt=" " class="img-responsive" />
								<img src="{{ asset( '/public/images/'.$newest_product['img'])  }}" alt=" " class="img-responsive" />
								<img src="{{ asset( '/public/images/'.$newest_product['img'])  }}" alt=" " class="img-responsive" />
								<img src="{{ asset( '/public/images/'.$newest_product['img'])  }}" alt=" " class="img-responsive" />
								<img src="{{ asset( '/public/images/'.$newest_product['img'])  }}" alt=" " class="img-responsive" />
								<div class="w3_hs_bottom">
									<ul>
										<li>
											<a href="{!! route('chi-tiet',['id'=>$product['id']]) !!}" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
										</li>
									</ul>
								</div>
							</div>
							<h5><a href="{!! route('chi-tiet',['id'=>$newest_product['id']]) !!}">{{ $newest_product['name'] }}</a></h5>
							<div class="simpleCart_shelfItem">
								<p><i class="item_price">{{ '$'.$newest_product['price'] }}</i></p>

								<form action="{!! route('addCart') !!}" method="post">
									<input type="hidden" name="_token" value="{!! csrf_token() !!}">
									<input type="hidden" name="id" value="{!! $newest_product['id'] !!}" />
									<input type="hidden" name="quantity" value="1" />
									<button type="submit" class="w3ls-cart">Add to cart</button>
								</form>
							</div>
						</div>
					@endforeach
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //new-products -->

		<!-- newsletter -->
		<div class="newsletter">
			<div class="container">
				<div class="col-md-6 w3agile_newsletter_left">
					<h3>Newsletter</h3>
					<p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
				</div>
				<div class="col-md-6 w3agile_newsletter_right">
					<form action="#" method="post">
						<input type="email" name="Email" placeholder="Email" required="">
						<input type="submit" value="" />
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- //newsletter -->
@stop