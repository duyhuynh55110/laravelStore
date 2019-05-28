@extends('admin.master')
@section('content')

<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Edit Product</h1>
	</div>
	@include('admin.errorBlock')
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>Product Detail</h5>
					</div>
					<div class="widget-content nopadding">

						<!-- BEGIN USER FORM -->
						<form action="{{ route('admin.product.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
							<input type="hidden" name="id" value="{!! $product->id !!}">
							<input type="hidden" name="_method" value="PUT">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							<div class="control-group">
								<label class="control-label">Name :</label>
								<div class="controls">
									<input type="text" class="span11" placeholder="Product name" name="name" value="{!! old('name',$product['name']) !!}"/> *
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Choose a product type :</label>
								<div class="controls">
									<select name="type_id">
										@foreach($types as $type)
											<option value="{!! $type['id'] !!}" {!!($type['id'] == $product['type_id'])?'selected':'';!!}>{{ $type['name'] }}</option>
										@endforeach
									</select> *
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Choose a manufacture :</label>
								<div class="controls">
									<select name="manu_id">
										@foreach($manus as $manu)
											<option value="{!! $manu['id'] !!}" {!!($manu['id'] == $product['manu_id'])?'selected':'';!!}>{{ $manu['name'] }}</option>
										@endforeach
									</select> *
								</div>
								<div class="control-group">
									<label class="control-label">Choose an image :</label>
									<div class="controls">
										<input type="file" name="fileUpload" id="fileUpload">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"  >Description</label>
									<div class="controls">
										<textarea class="span11" placeholder="Description" name = "description">{!! old('description',$product['description']) !!}</textarea>
									</div>
									<div class="control-group">
										<label class="control-label">Price :</label>
										<div class="controls">
											<input type="text" class="span11" placeholder="price" name = "price" value="{!! old('price',$product['price']) !!}"/> *
										</div>

									</div>

									<div class="form-actions">
										<button type="submit" class="btn btn-success">Add</button>
									</div>
								</div>

						</form>
						<!-- END USER FORM -->


					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- END CONTENT -->

@endsection
