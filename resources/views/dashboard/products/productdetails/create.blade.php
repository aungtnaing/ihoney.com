@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<h3 class="panel-title">New Product Detail</h3>
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
				<form action="{{ route("productdetails.store") }}" method="POST" enctype="multipart/form-data">
				 		
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-4"><div class="form-group">
							
							<input style="display:none;" id="file-input1" name="photourl1" type='file' onchange="readURL(this);" required/>                    
							 <label for="file-input1">
							<i class="lnr lnr-camera"></i>...Product 400 x 500<br>
							<img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							</label>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="form-group">
						<label for="name">product detailcode</label>
						<input type="text" width: 200px; class="form-control" id="" name="productdetailcode" placeholder="Enter product detailcode" value="{{ old('productdetailcode') }}">
					</div>
					<input type="hidden" name="productid" value="{{ $productid }}">
				</div>
				<div class="row">
					
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">sizes</label>
							<br>
							<select name="sizes">
							
								<option value="">none</option>
								<option value="freesize">freesize</option>
								<option value="s">s</option>
								<option value="m">m</option>
								<option value="l">l</option>
								<option value="xl">xl</option>
								<option value="xxl">xxl</option>
								<option value="xxxl">xxxl</option>
							</select>

						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">sizeno</label>
							<br>
							
							<input type="text" width: 200px; class="form-control" id="" name="sizeno" placeholder="Enter sizeno" value="{{ old('sizeno') }}">
						</div>
					</div>
				</div>

				
				<div class="form-group">
					<label for="name">Description:</label>
					<textarea name="description" placeholder="Enter your description" class="form-control" rows="3"></textarea>
				</div>
				
				<div class="form-group">
					<input type="checkbox" name="active" value="1" checked>Active<br>
				</div>
					
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