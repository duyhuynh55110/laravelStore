@extends('admin.master')
@section('content')
<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Manage Products</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><a href="{!! route('admin.product.create') !!}"> <i class="icon-plus"></i> </a></span>
						<h5>Products</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th></th>
								<th>Name</th>
								<th>Category</th>
								<th>Producer</th>
								<th>Description</th>
								<th>Price (VND)</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach($products as $product)
								<tr class="">
									<td class="avatar"><img src="{!! url('/public/images/'.$product['img']) !!}" /></td>
									<td>{{$product['name']}}</td>
									<td>{{$product->type->name }}</td>
									<td>{{$product->manu->name }}</td>
									<td>{{$product['description']}}</td>
									<td>{{$product['price']}}</td>
									<td>
										<a href="{!! route('admin.product.edit',['id'=>$product['id']]) !!}" class="btn btn-success btn-mini">Edit</a>
										<a href="{!! route('admin.product.findDestroy',['id'=>$product['id']]) !!}" class="btn btn-danger btn-mini">Delete</a>
									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
						{!! $products->render() !!}
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END CONTENT -->
	@endsection

