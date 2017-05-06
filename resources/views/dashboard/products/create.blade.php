@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<h3 class="panel-title">New Product</h3>
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
				<form action="{{ route("products.store") }}" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-4"><div class="form-group">
							
							<input style="display:none;" id="file-input1" name="photourl1" type='file' onchange="readURL(this);" required/>                    
							<label for="file-input1">
								<i class="lnr lnr-camera"></i>...Main 400 x 500<br>
								<img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							</label>
						</div>
					</div>
					<div class="col-sm-4"><div class="form-group">
						<input style="display:none;" id="file-input2" name="photourl2" type='file' onchange="readURL2(this);" />                    
						<label for="file-input2">
							<i class="lnr lnr-camera"></i>...Details 400 x 500<br>
							<img id="blah2" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
						</label>
					</div></div>
					<div class="col-sm-4"><div class="form-group">
						<input style="display:none;" id="file-input3" name="photourl3" type='file' onchange="readURL3(this);" />                    
						<label for="file-input3">
							<i class="lnr lnr-camera"></i>...Details 400 x 500<br>
							<img id="blah3" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
						</label>
					</div></div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">

							<label for="name">Name<span class="text-error">*</span></label>
							<input type="text" width: 200px; class="form-control" id="" name="name" placeholder="Enter Name" value="{{ old('name') }}" required>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">mName<span class="text-error">*</span></label>
							<input type="text" class="form-control" id="" name="mname" placeholder="Enter mName" value="{{ old('mname') }}" required>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">Product Code<span class="text-error">*</span></label>
							<input type="text" class="form-control" id="" name="productcode" placeholder="Enter productcode" value="{{ old('productcode') }}" required>
						</div>
					</div>
				</div>
				<div class="row">
					
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">category</label>
							<br>
							<select name="category">
								@foreach($categorys as $category)
								<option value="{{ $category->id }}">{{ $category->name }} : {{ $category->maincategory->name }}</option>
								@endforeach	
							</select>

						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">shop</label>
							<br>
							<select name="shop">
								<option value="0">none</option>
								@foreach($shops as $shop)
								<option value="{{ $shop->id }}">{{ $shop->name }}</option>
								@endforeach	
							</select>

						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">collection</label>
							<br>
							<select name="collection">
								<option value="0">none</option>
								@foreach($collections as $collection)
								<option value="{{ $collection->id }}">{{ $collection->name }}</option>
								@endforeach	
							</select>

						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">brand</label>
							<br>
							<select name="brand">
							<option value="0">none</option>
								@foreach($brands as $brand)
								<option value="{{ $brand->id }}">{{ $brand->name }}</option>
								@endforeach	
							</select>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">kyats Old Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<=0||value>10000000?0:value" name="omprice" type="number" value="0">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">kyats Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<0||value>10000000?0:value" name="mprice" type="number" value="1">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">Baht Old Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<=0||value>10000000?0:value" name="otprice" type="number" value="0">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">Baht Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<=0||value>10000000?0:value" name="tprice" type="number" value="0">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">$ Old Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<=0||value>10000000?0:value" name="oiprice" type="number" value="0">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">$ Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<=0||value>10000000?0:value" name="iprice" type="number" value="0">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Discount</label>
					<br>
					<input onkeyup="value=isNaN(parseFloat(value))||value<=0||value>99?0:value" name="discount" type="number" value="0">
				</div>
				<div class="form-group">
					<label for="name">Description:</label>
					<textarea name="description" placeholder="Enter your description" class="form-control" rows="3"></textarea>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="checkbox" name="active" value="1" checked>Active<br>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						<input type="checkbox" name="new" value="1" checked>New<br>
						</div>
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
				.height(100);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	function readURL2(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah2')
				.attr('src', e.target.result)
				.width(150)
				.height(100);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	function readURL3(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah3')
				.attr('src', e.target.result)
				.width(150)
				.height(100);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
@stop