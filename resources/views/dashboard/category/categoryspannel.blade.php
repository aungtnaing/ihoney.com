@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<a class="btn btn-info btn-large pull-right" href="{{ route("categorys.create") }}">Add New Category</a>
				
				<h3 class="panel-title">Categories</h3>
				
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							
							<th>Name</th>
							<th>mName</th>
							<th>Maincategory</th>
							<th>mName</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($categorys as $category)
						<tr>   
							<td>{{ $category->id }}</td>
							<td>{{ $category->name }}</td>
							<td>{{ $category->mname }}</td>
							<td>{{ $category->maincategory->name }}</td>
							<td>{{ $category->maincategory->mname }}</td>
							<td>
								<a class="btn btn-info" href="{{ route("categorys.edit", $category->id ) }}">Edit</a>
							</td>
							@if(Auth::user()->roleid==1)
							<td>
								<form method="POST" action="{{ route("categorys.destroy", $category->id) }}" accept-charset="UTF-8">
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
			{!! $categorys->render() !!}
		</div>


	</div>
</div>

@stop