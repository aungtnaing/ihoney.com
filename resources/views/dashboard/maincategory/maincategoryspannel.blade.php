@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<a class="btn btn-info btn-large pull-right" href="{{ route("maincategorys.create") }}">Add New Main Category</a>
				
				<h3 class="panel-title">Main Categories</h3>
				
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							
							<th>bg photo</th>
							<th>Name</th>
							<th>mName</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($maincategorys as $maincategory)
						<tr>   
							<td>{{ $maincategory->id }}</td>
							<td><img src="{{ $maincategory->photourl1 }}" width="150" height="100"></td>
							<td>{{ $maincategory->name }}</td>
							<td>{{ $maincategory->mname }}</td>
							<td>
								<a class="btn btn-info" href="{{ route("maincategorys.edit", $maincategory->id ) }}">Edit</a>
							</td>
							@if(Auth::user()->roleid==1)
							<td>
								<form method="POST" action="{{ route("maincategorys.destroy", $maincategory->id) }}" accept-charset="UTF-8">
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
			{!! $maincategorys->render() !!}
		</div>


	</div>
</div>

@stop