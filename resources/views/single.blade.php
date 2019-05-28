@extends('master')
@section('banner')
	<style>
		 #flexiselDemo2 {
			 display: block;
		}
	</style>
	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>Single Page</h2>
		</div>
	</div>
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Single Page</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">
						<li data-thumb="{!!  url('/public/images/'.$product->img) !!}">
							<div class="thumb-image"> <img src="{!!  url('/public/images/'.$product->img) !!}" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
					</ul>
				</div>
				<!-- flexslider -->
				<script defer src="{!!  url('/public/js/jquery.flexslider.js') !!}"></script>
				<link rel="stylesheet" href="{!!  url('/public/images/css/flexslider.css') !!}" type="text/css" media="screen" />
				<script>
                    // Can also be used with $(document).ready()
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                        });
                    });
				</script>
				<!-- flexslider -->
				<!-- zooming-effect -->
				<script src="{!! url("/public/js/imagezoom.js") !!}"></script>
				<!-- //zooming-effect -->
			</div>
			<div class="col-md-8 single-right">
				<h3>{!! $product->name !!}</h3>
				<div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked>
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
				</div>
				<div class="description">
					<h5><i>Description</i></h5>
					<p>{!! $product->description !!}</p>
				</div>
				<div class="description">
					<h5><i>Type: </i></h5>
					<p>{!! $product->type->name !!}</p>
				</div>
				<div class="description">
					<h5><i>Manusfacture:</i></h5>
					<p>{!! $product->manu->name !!}</p>
				</div>
				<div class="simpleCart_shelfItem">
					<div class="description">
						<h5><i>Price:</i></h5>
						<p style="color: #000"> <i class="item_price">${!! $product->price !!}</i></p>
					</div>

					<form action="{!! route('addCart') !!}" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="{!! $product['id'] !!}" />
						<div class="color-quality-left" style="display: block;width: 100%;padding-bottom: 20px">
							<h5>Quality :</h5>
							<input type="number" name="quantity" value="1" />
						</div>
						<button type="submit" class="w3ls-cart">Add to cart</button>
					</form>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<!-- Related Products -->
	<div class="w3l_related_products">
		<div class="container">
			<h3>Related Products</h3>
			<div id="flexiselDemo2">
				@foreach($type_products as $type_product)
					<div class="col-md-4 agile_ecommerce_tab_left">
						<div class="hs-wrapper">
							<img src="{{ asset( '/public/images/'.$type_product['img'])  }}" alt=" " class="img-responsive" />
							<img src="{{ asset( '/public/images/'.$type_product['img'])  }}" alt=" " class="img-responsive" />
							<img src="{{ asset( '/public/images/'.$type_product['img'])  }}" alt=" " class="img-responsive" />
							<img src="{{ asset( '/public/images/'.$type_product['img'])  }}" alt=" " class="img-responsive" />
							<img src="{{ asset( '/public/images/'.$type_product['img'])  }}" alt=" " class="img-responsive" />
							<img src="{{ asset( '/public/images/'.$type_product['img'])  }}" alt=" " class="img-responsive" />
							<div class="w3_hs_bottom">
								<ul>
									<li>
										<a href="{!! route('chi-tiet',['id'=>$product['id']]) !!}" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</li>
								</ul>
							</div>
						</div>
						<h5><a href="{!! route('chi-tiet',['id'=>$type_product['id']]) !!}">{{ $type_product['name'] }}</a></h5>
						<div class="simpleCart_shelfItem">
							<p><i class="item_price">{{ '$'.$type_product['price'] }}</i></p>

							<form action="{!! route('addCart') !!}" method="post">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">
								<input type="hidden" name="id" value="{!! $type_product['id'] !!}" />
								<input type="hidden" name="quantity" value="1" />
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- //Related Products -->

	<!-- Related Products -->
	<div class="w3l_related_products">
		<div class="container">
			<h3>The same company</h3>
			<div id="flexiselDemo2">
				@foreach($manu_products as $manu_product)
					<div class="col-md-4 agile_ecommerce_tab_left">
						<div class="hs-wrapper">
							<img src="{{ asset( '/public/images/'.$manu_product['img'])  }}" alt=" " class="img-responsive" />
							<img src="{{ asset( '/public/images/'.$manu_product['img'])  }}" alt=" " class="img-responsive" />
							<img src="{{ asset( '/public/images/'.$manu_product['img'])  }}" alt=" " class="img-responsive" />
							<img src="{{ asset( '/public/images/'.$manu_product['img'])  }}" alt=" " class="img-responsive" />
							<img src="{{ asset( '/public/images/'.$manu_product['img'])  }}" alt=" " class="img-responsive" />
							<img src="{{ asset( '/public/images/'.$manu_product['img'])  }}" alt=" " class="img-responsive" />
							<div class="w3_hs_bottom">
								<ul>
									<li>
										<a href="{!! route('chi-tiet',['id'=>$product['id']]) !!}" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</li>
								</ul>
							</div>
						</div>
						<h5><a href="{!! route('chi-tiet',['id'=>$manu_product['id']]) !!}">{{ $manu_product['name'] }}</a></h5>
						<div class="simpleCart_shelfItem">
							<p><i class="item_price">{{ '$'.$manu_product['price'] }}</i></p>

							<form action="{!! route('addCart') !!}" method="post">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">
								<input type="hidden" name="id" value="{!! $manu_product['id'] !!}" />
								<input type="hidden" name="quantity" value="1" />
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- //Related Products -->

	<div class="modal video-modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModal6">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="images/34.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>Musical Kids Toy</h4>
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
								<p><span>$150</span> <i class="item_price">$100</i></p>
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="w3ls_item" value="Kids Toy">
									<input type="hidden" name="amount" value="100.00">
									<button type="submit" class="w3ls-cart">Add to cart</button>
								</form>
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
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="images/36.jpg" alt=" " class="img-responsive">
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>Dry Vacuum Cleaner</h4>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
								commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
								cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<div class="rating">
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star.png" alt=" " class="img-responsive">
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
							<img src="images/p3.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>Music MP3 Player </h4>
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
									<img src="images/star-.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/star.png" alt=" " class="img-responsive" />
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="modal_body_right_cart simpleCart_shelfItem">
								<p><span>$60</span> <i class="item_price">$58</i></p>
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" />
									<input type="hidden" name="w3ls_item" value="MP3 Player" />
									<input type="hidden" name="amount" value=" $58.00"/>
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
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="images/38.jpg" alt=" " class="img-responsive">
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>Kitchen &amp; Dining Accessories</h4>
							<p>Ut enim ad minim veniam, quis nostrud
								exercitation ullamco laboris nisi ut aliquip ex ea
								commodo consequat.Duis aute irure dolor in
								reprehenderit in voluptate velit esse cillum dolore
								eu fugiat nulla pariatur. Excepteur sint occaecat
								cupidatat non proident, sunt in culpa qui officia
								deserunt mollit anim id est laborum.</p>
							<div class="rating">
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star.png" alt=" " class="img-responsive">
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="modal_body_right_cart simpleCart_shelfItem">
								<p><span>$650</span> <i class="item_price">$645</i></p>
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="w3ls_item" value="Microwave Oven">
									<input type="hidden" name="amount" value="645.00">
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
	<!-- //single -->

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