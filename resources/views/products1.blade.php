@extends('master')
@section('banner')
	<!-- banner -->
	<div class="banner banner2">
		<div class="container">
			<h2>Top Selling <span>Gadgets</span> Flat <i>25% Discount</i></h2> 
		</div>
	</div> 
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="{!! route("/") !!}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Products1</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs --> 
	<!-- mobiles -->
	<div class="mobiles w3l_related_products">
		<h3>Results Products</h3>
		<div class="container">
			<div class="w3ls_mobiles_grids">
				<div class="col-md-12 w3ls_mobiles_grid_right">
					<div class="w3ls_mobiles_grid_right_grid3">
						@foreach($products as $product)
							<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles">
								<div class="agile_ecommerce_tab_left mobiles_grid">
									<div class="hs-wrapper hs-wrapper2">
										<img src="{!! url('/public/images/'.$product->img) !!}" alt=" " class="img-responsive" />
										<img src="{!! url('/public/images/'.$product->img)  !!}" alt=" " class="img-responsive" />
										<img src="{!! url('/public/images/'.$product->img) !!}" alt=" " class="img-responsive" />
										<img src="{!! url('/public/images/'.$product->img)  !!}" alt=" " class="img-responsive" />
										<img src="{!! url('/public/images/'.$product->img)  !!}" alt=" " class="img-responsive" />
										<div class="w3_hs_bottom w3_hs_bottom_sub1">
											<ul>
												<li>
													<a href="#" data-toggle="modal" data-target="#myModal7"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
												</li>
											</ul>
										</div>
									</div>
									<h5><a href="{!! route('chi-tiet',['id'=>$product['id']]) !!}">{{ $product['name'] }}</a></h5>
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
							</div>
						@endforeach
						<div class="col-md-12">
							{!! $products->render() !!}
						</div>

					</div>

				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			<div class="col-md-6 w3agile_newsletter_left">
				<h3>Newsletter</h3>
				<p>Excepteur sint occaecat cupidatat non proident sunt.</p>
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