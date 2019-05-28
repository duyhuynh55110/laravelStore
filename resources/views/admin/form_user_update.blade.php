@extends('admin.master')
@section('content')

	<!-- BEGIN CONTENT -->
	<div id="content">
		<div id="content-header">
			<div id="breadcrumb"> <a href="{!! route('admin.user.index') !!}" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
			<h1>Edit User</h1>
		</div>
		@include('admin.errorBlock')
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>User Detail</h5>
						</div>
						<div class="widget-content nopadding">

							<!-- BEGIN USER FORM -->
							<form action="{!! route('admin.user.update')  !!}" method="post" class="form-horizontal" enctype="multipart/form-data">
								<input type="hidden" value="{!! $user->id !!}" name="id">
								<input type="hidden" name="_method" value="PUT">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">
								<div class="control-group">
									<label class="control-label">Name:</label>
									<div class="controls">
										<input type="text" class="span11" placeholder="User name" name="name" value="{!! old('name',$user->name) !!}"/> *
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email:</label>
									<div class="controls">
										<input type="text" class="span11" placeholder="User email" name="email" value="{!! old('email',$user->email) !!}"/> *
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<input type="password" class="span11" placeholder="User pass" name="password" value=""/> *
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Confirm Password:</label>
									<div class="controls">
										<input type="password" class="span11" placeholder="User comfirm pass" name="password_confirmation" value=""/> *
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-success">Add</button>
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
