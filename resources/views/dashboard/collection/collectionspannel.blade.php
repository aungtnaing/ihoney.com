@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<a class="btn btn-info btn-large pull-right" href="{{ route("collections.create") }}">Add New newcollection</a>
				
				<h3 class="panel-title">Collections</h3>
				
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							
							<th>Collections</th>
							<th>Name</th>
							<th>mName</th>
							<th>Description</th>
							
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($collections as $collection)
						<tr>   
							<td>{{ $collection->id }}</td>
							<td><img src="{{ $collection->photourl1 }}" width="150" height="100"></td>
							<td>{{ $collection->name }}</td>
							<td>{{ $collection->mname }}</td>
							<td>{{ $collection->description }}</td>
							
							<td>
								<a class="btn btn-info" href="{{ route("collections.edit", $collection->id ) }}">Edit</a>
							</td>
							@if(Auth::user()->roleid==1)
							<td>
								<form method="POST" action="{{ route("collections.destroy", $collection->id) }}" accept-charset="UTF-8">
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
				{!! $collections->render() !!}
		</div>


	</div>
</div>

@stop