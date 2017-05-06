@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<a class="btn btn-info btn-large pull-right" href="{{ route("brands.create") }}">Add New brand</a>
				
				<h3 class="panel-title">Brands</h3>
				
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							
							<th>Brands</th>
							<th>Name</th>
							<th>mName</th>
						
							<th>Description</th>
							
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($brands as $brand)
						<tr>   
							<td>{{ $brand->id }}</td>
							<td><img src="{{ $brand->photourl1 }}" width="150" height="100"></td>
							<td>{{ $brand->name }}</td>
							<td>{{ $brand->mname }}</td>
							
							<td>{{ $brand->description }}</td>
							
							<td>
								<a class="btn btn-info" href="{{ route("brands.edit", $brand->id ) }}">Edit</a>
							</td>
							@if(Auth::user()->roleid==1)
							<td>
								<form method="POST" action="{{ route("brands.destroy", $brand->id) }}" accept-charset="UTF-8">
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
				{!! $brands->render() !!}
		</div>


	</div>
</div>

@stop