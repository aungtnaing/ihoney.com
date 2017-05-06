@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<a class="btn btn-info btn-large pull-right" href="{{ route("posts.create") }}">Add New post</a>
				
				<h3 class="panel-title">Posts</h3>
				
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							
							<th>Post</th>
							<th>Name</th>
							<th>Content</th>
							
							<th>Active</th>
							
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $post)
						<tr>   
							<td>{{ $post->id }}</td>
							<td><img src="{{ $post->photourl1 }}" width="150" height="100"></td>
							<td>{{ $post->name }}</td>
							<td>{{ $post->content }}</td>
							
							@if($post->active==1)
							<td><i class="fa fa-check"></i></td>
							@else
							<td></td>
							@endif
							
							<td>
								<a class="btn btn-info" href="{{ route("posts.edit", $post->id ) }}">Edit</a>
							</td>
							@if(Auth::user()->roleid==1)
							<td>
								<form method="POST" action="{{ route("posts.destroy", $post->id) }}" accept-charset="UTF-8">
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
			{!! $posts->render() !!}
		</div>


	</div>
</div>

@stop