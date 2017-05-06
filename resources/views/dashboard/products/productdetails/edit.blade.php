@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->


<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			

			<div class="panel-heading">
				
				<h3 class="panel-title">Edit Product</h3>
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
				
				<form action="{{ route("productdetails.update", $productdetail->id) }}" method="POST" enctype="multipart/form-data">
					<input name="_method" type="hidden" value="PATCH">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="form-group">

						<input style="display:none;" id="file-input1" name="photourl1" type='file' onchange="readURL(this);"/>                    

						<label for="file-input1"><i class="lnr lnr-camera"></i>...Main 400 x 500<br>
							@if($productdetail->photourl1!="")
							<img id="blah" src= "{{ $productdetail->photourl1 }}" width="100" height="100">
							@else
							<img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							@endif
						</label>
					</div>
					
					<div class="row">
						<div class="form-group">
							<label for="name">product detailcode</label>
							<input type="text" width: 200px; class="form-control" id="" name="productdetailcode" placeholder="Enter product detailcode" value="{{ $productdetail->productdetailcode }}">
						</div>
						
					</div>
					<div class="row">

						<div class="col-sm-4">
							<div class="form-group">
								<label for="name">sizes</label>
								<br>
								<select name="sizes">
									<option value="{{ $productdetail->sizes }}" selected="selected">{{ $productdetail->sizes }}</option>
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

								<input type="text" width: 200px; class="form-control" id="" name="sizeno" placeholder="Enter sizeno" value="{{ $productdetail->sizeno }}">
							</div>
						</div>
					</div>


					<div class="form-group">
						<label for="name">Description:</label>
						<textarea name="description" placeholder="Enter your description" class="form-control" rows="3">{{ $productdetail->description }}</textarea>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							@if($productdetail->active==0)
							<input type="checkbox" name="active" value="">Active<br>	
							@else		
							<input type="checkbox" name="active" value="" checked>Active<br>
							@endif
						</div>
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