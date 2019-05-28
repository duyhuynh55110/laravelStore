@extends('admin.master')
@section('content')
<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="{!!  route('admin.manu.index')  !!}}" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Manage Manufactures</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><a href="{!! route('admin.manu.create') !!}"><i class="icon-plus"></i></a></span>
						<h5>Products</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach($manus as $manu)
							<tr class="">
								<td>{!! $manu->id !!}</td>
								<td>{!! $manu->name !!}</td>
								<td><img src="{!! url('/public/images/manus/'.$manu->img) !!}" style="width:100px"></td>
								<td>
									<a href="{!! route('admin.manu.edit',["id"=>$manu->id]) !!}" class="btn btn-success btn-mini">Edit</a>
									<a href="{!! route('admin.manu.findDestroy',["id"=>$manu->id]) !!}" class="btn btn-danger btn-mini">Delete</a>
									
								</td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END CONTENT -->
@endsection

