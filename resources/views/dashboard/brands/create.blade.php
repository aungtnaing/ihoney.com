@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<h3 class="panel-title">New Brand</h3>
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif	
			</div>
			<div class="panel-body">
				<form action="{{ route("brands.store") }}" method="POST" enctype="multipart/form-data">
				 		
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-4"><div class="form-group">
							
							<input style="display:none;" id="file-input1" name="photourl1" type='file' onchange="readURL(this);" required/>                    
							 <label for="file-input1">
							<i class="lnr lnr-camera"></i>...Collection 900 x 677<br>
							<img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							</label>
						</div>
					</div>
					
				</div>

				<div class="form-group">
					<label for="name">Name<span class="text-error">*</span></label>
					<input type="text" width: 200px; class="form-control" id="" name="name" placeholder="Enter Name" value="{{ old('name') }}" required>
				</div>
				<div class="form-group">
					<label for="name">mName<span class="text-error">*</span></label>
					<input type="text" class="form-control" id="" name="mname" placeholder="Enter mName" value="{{ old('mname') }}" required>
				</div>

				
				<div class="form-group">
					<label for="name">Description:</label>
					<textarea name="description" placeholder="Enter your description" class="form-control" rows="3"></textarea>
				</div>
				<!-- <div class="form-group">
					<input type="checkbox" name="active" value="1" checked>Active<br>
				</div> -->

				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>

	</div>


</div>
</div>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah')
				.attr('src', e.target.result)
				.width(150)
				.height(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	
</script>
@stop