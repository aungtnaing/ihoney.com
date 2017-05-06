@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<h3 class="panel-title">Edit Main Category</h3>
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
			<form action="{{ route("maincategorys.update", $maincategory->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
					<input name="_method" type="hidden" value="PATCH">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="col-sm-4"><div class="form-group">
							
							<input style="display:none;" id="file-input1" name="photourl1" type='file' onchange="readURL(this);"/>                    
							 <label for="file-input1">
							<i class="lnr lnr-camera"></i>...Main Slide 1900 x 1200<br>
							@if($maincategory->photourl1!="")
               				<img id="blah" src= "{{ $maincategory->photourl1 }}" width="100" height="100">
               				@else
							<img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							@endif
							</label>
						</div>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="" name="name" placeholder="Enter Name" value="{{ $maincategory->name }}" required>
					</div>

					<div class="form-group">
						<label for="name">mName</label>
						<input type="text" class="form-control" id="" name="mname" placeholder="Enter mName" value="{{ $maincategory->mname }}" required>
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