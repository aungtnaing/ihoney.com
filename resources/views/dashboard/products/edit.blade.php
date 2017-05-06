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
				<div class="panel">
					<div class="panel-heading">

						<a class="btn btn-info btn-large pull-right" href="{{ url('/productdetailcreate', $product->id) }}">Add New Product Detail</a>

						<h3 class="panel-title">Product Details (color, sizes)</h3>

					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>

									<th>Product Details</th>
									<th>Code</th>
									<th>Sizes</th>
									<th>Sizeno</th>
									<th>Description</th>
									<th>Active</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($productdetails as $productdetail)
								<tr>   
									<td>{{ $productdetail->id }}</td>
									<td><img src="{{ $productdetail->photourl1 }}" width="50" height="50"></td>
									<td>{{ $productdetail->productdetailcode }}</td>
									<td>{{ $productdetail->sizes }}</td>
									<td>{{ $productdetail->sizeno }}</td>
									<td>{{ $productdetail->description }}</td>
									@if($productdetail->active==1)
									<td><i class="fa fa-check"></i></td>
									@else
									<td></td>
									@endif
									<td><a class="btn btn-info" href="{{ route("productdetails.edit", $productdetail->id ) }}">Edit</a></td>
									@if(Auth::user()->roleid==1)
									<td>
										<form method="POST" action="{{ route("productdetails.destroy", $productdetail->id) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input class="btn btn-danger" type="submit" value="Delete">
										</form>
									</td>
									@endif
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				
				<form action="{{ route("products.update", $product->id) }}" method="POST" enctype="multipart/form-data">
					<input name="_method" type="hidden" value="PATCH">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">

								<label for="name">Name<span class="text-error">*</span></label>
								<input type="text" width: 200px; class="form-control" id="" name="name" placeholder="Enter Name" value="{{ $product->name }}" required>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="name">mName<span class="text-error">*</span></label>
								<input type="text" class="form-control" id="" name="mname" placeholder="Enter mName" value="{{ $product->mname }}" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="name">Product Code<span class="text-error">*</span></label>
								<input type="text" class="form-control" id="" name="productcode" placeholder="Enter productcode" value="{{ $product->productcode }}" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4"><div class="form-group">
							
							<input style="display:none;" id="file-input1" name="photourl1" type='file' onchange="readURL(this);"/>                    
							
							<label for="file-input1"><i class="lnr lnr-camera"></i>...Main 400 x 500<br>
								@if($product->photourl1!="")
								<img id="blah" src= "{{ $product->photourl1 }}" width="100" height="100">
								@else
								<img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
								@endif
							</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input style="display:none;" id="file-input2" name="photourl2" type='file' onchange="readURL2(this);" />                    
							<label for="file-input2"><i class="lnr lnr-camera"></i>...Details 400 x 500<br>
								@if($product->photourl2!="")
								<img id="blah2" src= "{{ $product->photourl2 }}" width="100" height="100">
								@else
								<img id="blah2" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
								@endif
							</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input style="display:none;" id="file-input3" name="photourl3" type='file' onchange="readURL3(this);" />                    
							<label for="file-input3"><i class="lnr lnr-camera"></i>...Details 400 x 500<br>
								@if($product->photourl3!="")
								<img id="blah3" src= "{{ $product->photourl3 }}" width="100" height="100">
								@else
								<img id="blah3" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
								@endif
							</label>
						</div>
					</div>
				</div>


				<div class="row">
					
					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">category</label>
							<br>
							<select name="category" style="width: 250px">
								@foreach($categorys as $category)
								@if($product->categoryid!=$category->id)
								<option value="{{ $category->id }}">{{ $category->name }} : {{ $category->maincategory->name }}</option>
								@else
								<option value="{{ $category->id }}" selected="selected">{{ $category->name }} : {{ $category->maincategory->name }}</option>
								@endif
								@endforeach	
							</select>

						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">shop</label>
							<br>
							<select name="shop" style="width: 250px">
								<option value="0">none</option>
								@foreach($shops as $shop)
								@if($product->ourshopid!=$shop->id)
								<option value="{{ $shop->id }}">{{ $shop->name }}</option>
								@else
								<option value="{{ $shop->id }}" selected="selected">{{ $shop->name }}</option>
								@endif
								@endforeach	
							</select>

						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">collection</label>
							<br>
							<select name="collection" style="width: 250px">
								<option value="0">none</option>
								@foreach($collections as $collection)
								@if($product->collectionid!=$collection->id)
								<option value="{{ $collection->id }}">{{ $collection->name }}</option>
								@else
								<option value="{{ $collection->id }}" selected="selected">{{ $collection->name }}</option>
								@endif
								@endforeach	
							</select>

						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">brand</label>
							<br>
							<select name="brand" style="width: 250px">
								<option value="0">none</option>
								@foreach($brands as $brand)
								@if($product->brandid!=$brand->id)
								<option value="{{ $brand->id }}">{{ $brand->name }}</option>
								@else
								<option value="{{ $brand->id }}" selected="selected">{{ $brand->name }}</option>
								@endif
								@endforeach	
							</select>

						</div>
					</div>
				</div>

				
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">kyats Old Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<0||value>10000000?1:value" name="omprice" type="number" value="{{ $product->omprice }}">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">kyats Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<0||value>10000000?1:value" name="mprice" type="number" value="{{ $product->mprice }}">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">Baht Old Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<0||value>10000000?1:value" name="otprice" type="number" value="{{ $product->otprice }}">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">Baht Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<0||value>10000000?1:value" name="tprice" type="number" value="{{ $product->tprice }}">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">$ Old Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<0||value>10000000?1:value" name="oiprice" type="number" value="{{ $product->oiprice }}">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">$ Price</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<0||value>10000000?1:value" name="iprice" type="number" value="{{ $product->iprice }}">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="name">Discount</label>
							<br>
							<input onkeyup="value=isNaN(parseFloat(value))||value<0||value>99?1:value" name="discount" type="number" value="{{ $product->discount }}">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="name">Description:</label>
					<textarea name="description" placeholder="Enter your description" class="form-control" rows="3">{{ $product->description }}</textarea>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							@if($product->active==0)
							<input type="checkbox" name="active" value="">Active<br>	
							@else		
							<input type="checkbox" name="active" value="" checked>Active<br>
							@endif
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							@if($product->new==0)
							<input type="checkbox" name="new" value="">New<br>	
							@else		
							<input type="checkbox" name="new" value="" checked>New<br>
							@endif
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							@if($product->specialselection==0)
							<input type="checkbox" name="specialselection" value="">Specialselection<br>	
							@else		
							<input type="checkbox" name="specialselection" value="" checked>Specialselection<br>
							@endif
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							@if($product->bestseller==0)
							<input type="checkbox" name="bestseller" value="">Bestseller<br>	
							@else		
							<input type="checkbox" name="bestseller" value="" checked>Bestseller<br>
							@endif
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							@if($product->lovely==0)
							<input type="checkbox" name="lovely" value="">Lovely<br>	
							@else		
							<input type="checkbox" name="lovely" value="" checked>Lovely<br>
							@endif
						</div>
					</div>
				</div>

				<button type="submit" class="btn btn-default">Submit</button>

				

			</form>



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

	function readURL2(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah2')
				.attr('src', e.target.result)
				.width(150)
				.height(150);
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
				.height(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
@stop