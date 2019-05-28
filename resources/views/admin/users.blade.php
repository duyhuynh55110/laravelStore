@extends('admin.master')
@section('content')
<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="{!! route('admin.product.index') !!}" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Manage Users</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><a href="{!! route('admin.user.create') !!}"> <i class="icon-plus"></i> </a></span>
						<h5>Users</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Level</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							{{-- @php $users = []@endphp --}}
							@foreach($users as $user)
								<tr class="">
									<td>{{$user['id']}}</td>
									<td>{{$user['name']}}</td>
									<td>{{$user['email']}}</td>
									<td>{{$user['level']}}</td>
									<td>
										<a href="{!! route('admin.user.edit',['id'=>$user['id']]) !!}" class="btn btn-success btn-mini">Edit</a>
										<a href="{!! route('admin.user.findDestroy',['id'=>$user['id']]) !!}" class="btn btn-danger btn-mini">Delete</a>
									</td>
								</tr>
							@endforeach
						</tbody>
						</table>
						{{--<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
						</ul>--}}
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END CONTENT -->
	@endsection

