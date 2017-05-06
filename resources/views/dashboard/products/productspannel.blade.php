@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<a class="btn btn-info btn-large pull-right" href="{{ route("products.create") }}">Add New Product</a>
				
				<h3 class="panel-title">Products</h3>
				
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							
							<th>Product</th>
							<th>Name</th>
							<th>mName</th>
							<th>Category</th>
							<th>Price</th>
							<th>Brand</th>
							<th>Collection</th>
							<th>Shop</th>
							<th>Discount</th>
							<th>Active</th>
							<th>New</th>
							<th>Specialselection</th>
							<th>Bestseller</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>   
							<td>{{ $product->id }}</td>
							<td><img src="{{ $product->photourl1 }}" width="150" height="100"></td>
							<td>{{ $product->name }}</td>
							<td>{{ $product->mname }}</td>
							<td>{{ $product->category->name }}</td>
							<td>{{ $product->mprice }} ks</td>
							@if($product->brandid==0)
							<td></td>
							@else
							<td>{{ $product->brand->name }}</td>
							@endif
							@if($product->collectionid==0)
							<td></td>
							@else
							<td>{{ $product->collection->name }}</td>
							@endif
							@if($product->shopid==0)
							<td></td>
							@else
							<td>{{ $product->shop->name }}</td>
							@endif
							<td>{{ $product->discount }} %</td>
							@if($product->active==1)
							<td><i class="fa fa-check"></i></td>
							@else
							<td></td>
							@endif
							@if($product->new==1)
							<td><i class="fa fa-check"></i></td>
							@else
							<td></td>
							@endif
							@if($product->specialselection==1)
							<td><i class="fa fa-check"></i></td>
							@else
							<td></td>
							@endif
							@if($product->bestseller==1)
							<td><i class="fa fa-check"></i></td>
							@else
							<td></td>
							@endif
						
							<td><a class="btn btn-info" href="{{ route("products.edit", $product->id ) }}">Edit</a></td>
							@if(Auth::user()->roleid==1)
							<td>
								<form method="POST" action="{{ route("products.destroy", $product->id) }}" accept-charset="UTF-8">
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
				{!! $products->render() !!}
		</div>


	</div>
</div>

@stop