@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<a class="btn btn-info btn-large pull-right" href="{{ route("mainslides.create") }}">Add New Mainslide</a>
				
				<h3 class="panel-title">Main Slide</h3>
				
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							
							<th>Main Slide</th>
							<th>Name</th>
							<th>Title</th>
							<th>Special</th>
							<th>Active</th>
							<th>SlideNo</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($mainslides as $mainslide)
						<tr>   
							<td>{{ $mainslide->id }}</td>
							<td><img src="{{ $mainslide->photourl1 }}" width="150" height="100"></td>
							<td>{{ $mainslide->name }}</td>
							<td>{{ $mainslide->title }}</td>
							<td>{{ $mainslide->special }}</td>
							@if($mainslide->active==1)
							<td><i class="fa fa-check"></i></td>
							@else
							<td></td>
							@endif
							<td>{{ $mainslide->slideno }}</td>
							<td>
								<a class="btn btn-info" href="{{ route("mainslides.edit", $mainslide->id ) }}">Edit</a>
							</td>
							@if(Auth::user()->roleid==1)
							<td>
								<form method="POST" action="{{ route("mainslides.destroy", $mainslide->id) }}" accept-charset="UTF-8">
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
			{!! $mainslides->render() !!}
		</div>


	</div>
</div>

@stop