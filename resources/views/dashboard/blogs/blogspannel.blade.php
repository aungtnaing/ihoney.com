@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<a class="btn btn-info btn-large pull-right" href="{{ route("blogs.create") }}">Add New blog</a>
				
				<h3 class="panel-title">blogs</h3>
				
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							
							<th>Blog</th>
							<th>Name</th>
							<th>Content</th>
							
							<th>Active</th>
							
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($blogs as $blog)
						<tr>   
							<td>{{ $blog->id }}</td>
							<td><img src="{{ $blog->photourl1 }}" width="150" height="100"></td>
							<td>{{ $blog->name }}</td>
							<td>{{ $blog->content }}</td>
							
							@if($blog->active==1)
							<td><i class="fa fa-check"></i></td>
							@else
							<td></td>
							@endif
							
							<td>
								<a class="btn btn-info" href="{{ route("blogs.edit", $blog->id ) }}">Edit</a>
							</td>
							@if(Auth::user()->roleid==1)
							<td>
								<form method="blog" action="{{ route("blogs.destroy", $blog->id) }}" accept-charset="UTF-8">
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
			{!! $blogs->render() !!}
		</div>


	</div>
</div>

@stop