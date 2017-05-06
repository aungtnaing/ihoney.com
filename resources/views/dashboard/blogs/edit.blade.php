@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->


<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			

			<div class="panel-heading">
				
				<h3 class="panel-title">Edit blog</h3>
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
				
				<form action="{{ route("blogs.update", $blog->id) }}" method="POST" enctype="multipart/form-data">
					<input name="_method" type="hidden" value="PATCH">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="form-group">

						<input style="display:none;" id="file-input1" name="photourl1" type='file' onchange="readURL(this);"/>                    

						<label for="file-input1"><i class="lnr lnr-camera"></i>...blog 800 x 500<br>
							@if($blog->photourl1!="")
							<img id="blah" src= "{{ $blog->photourl1 }}" width="100" height="100">
							@else
							<img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							@endif
						</label>
					</div>
					
					<div class="row">
						<div class="form-group">
							<label for="name">name</label>
							<input type="text" width: 200px; class="form-control" id="" name="name" placeholder="Enter name" value="{{ $blog->name }}">
						</div>

					</div>


					<div class="form-group">
						<label for="name">Content</label>
						<textarea name="content" placeholder="Enter your content" class="form-control" rows="5">{{ $blog->content }}</textarea>
					</div>

					
					<div class="col-sm-4">
						<div class="form-group">
							@if($blog->active==0)
							<input type="checkbox" name="active" value="">Active<br>	
							@else		
							<input type="checkbox" name="active" value="" checked>Active<br>
							@endif
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
				.height(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	
</script>
@stop