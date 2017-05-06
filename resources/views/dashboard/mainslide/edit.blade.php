@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<h3 class="panel-title">Edit Main Slide</h3>
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
				<form action="{{ route("mainslides.update", $mainslide->id) }}" method="POST" enctype="multipart/form-data">
				 	<input name="_method" type="hidden" value="PATCH">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-4"><div class="form-group">
							
							<input style="display:none;" id="file-input1" name="photourl1" type='file' onchange="readURL(this);"/>                    
							 <label for="file-input1">
							<i class="lnr lnr-camera"></i>...Main Slide 1900 x 1200</label><br>
							@if($mainslide->photourl1!="")
               				<img id="blah" src= "{{ $mainslide->photourl1 }}" width="100" height="100">
               				@else
							<img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							@endif
							</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input style="display:none;" id="file-input2" name="photourl2" type='file' onchange="readURL2(this);" />                    
							<label for="file-input2">
							<i class="lnr lnr-camera"></i>...Details 900 x 677<br>
							@if($mainslide->photourl2!="")
	               			<img id="blah2" src= "{{ $mainslide->photourl2 }}" width="100" height="100">
	               			@else
							<img id="blah2" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							@endif
							</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input style="display:none;" id="file-input3" name="photourl3" type='file' onchange="readURL3(this);" />                    
							<label for="file-input3">
							<i class="lnr lnr-camera"></i>...Details 900 x 677<br>
							@if($mainslide->photourl3!="")
	               			<img id="blah3" src= "{{ $mainslide->photourl3 }}" width="100" height="100">
	               			@else
							<img id="blah3" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							@endif
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="name">Name<span class="text-error">*</span></label>
					<input type="text" width: 200px; class="form-control" id="" name="name" placeholder="Enter Name" value="{{ $mainslide->name }}" required>
				</div>
				<div class="form-group">
					<label for="name">Title<span class="text-error">*</span></label>
					<input type="text" class="form-control" id="" name="title" placeholder="Enter Title" value="{{ $mainslide->title }}" required>
				</div>

				<div class="form-group">
					<label for="name">Special<span class="text-error">*</span></label>
					<input type="text" class="form-control" id="" name="special" placeholder="Enter Special" value="{{ $mainslide->special }}" required>
				</div>
				<div class="form-group">
					<label for="name">Slideno</label>
					<input onkeyup="value=isNaN(parseFloat(value))||value<0||value>10?1:value" name="slideno" type="number" value="{{ $mainslide->slideno }}">
				</div>
				<div class="form-group">
					<label for="name">fburl</label>
					<input type="text" class="form-control" id="" name="fburl" placeholder="Enter fblink" value="{{ $mainslide->fburl }}">
				</div>
				<div class="form-group">
					<label for="name">wwwurl</label>
					<input type="text" class="form-control" id="" name="wwwurl" placeholder="Enter www link" value="{{ $mainslide->wwwurl }}">
				</div>

				<div class="form-group">
					<label for="name">Phone1:</label>

					<input class="form-control" name="ph1" placeholder="Enter Your phone1" type="text" value="{{ $mainslide->ph1 }}">

				</div>
				<div class="form-group">
					<label for="name">Phone2:</label>
					<input class="form-control" name="ph2" placeholder="Enter Your phone2" type="text" value="{{ $mainslide->ph2 }}">
				</div>
				<div class="form-group">
					<label for="name">Address:</label>
					<textarea name="address" placeholder="Enter your address" class="form-control" rows="3">{{ $mainslide->address }}</textarea>
				</div>
				<div class="form-group">
					<label for="name">Description:</label>
					<textarea name="description" placeholder="Enter your description" class="form-control" rows="3">{{ $mainslide->description }}</textarea>
				</div>
				<div class="form-group">
					@if($mainslide->active==0)
					<input type="checkbox" name="active" value="">Active<br>	
					@else		
					<input type="checkbox" name="active" value="" checked>Active<br>
					@endif
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

	function readURL2(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah2')
				.attr('src', e.target.result)
				.width(150)
				.height(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	function readURL3(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah3')
				.attr('src', e.target.result)
				.width(150)
				.height(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
@stop