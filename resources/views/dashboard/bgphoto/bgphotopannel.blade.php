@extends('dashboard.default')
@section('content')
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<h3 class="panel-title">bg Photo</h3>
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
				<form action="{{ route("dashboard.update", $bgphoto->id) }}" method="POST" enctype="multipart/form-data">
					<input name="_method" type="hidden" value="PATCH">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-4"><div class="form-group">
							
							<input style="display:none;" id="file-input1" name="logo" type='file' onchange="readURL(this);"/>                    
							<label for="file-input1">
								<i class="lnr lnr-camera"></i>...Logo 240 x 50<br>
								@if($bgphoto->logo!="")
								<img id="blah" src= "{{ $bgphoto->logo }}" width="240" height="50">
								@else
								<img id="blah" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
								@endif
							</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input style="display:none;" id="file-input2" name="newarrivels" type='file' onchange="readURL2(this);" />                    
							<label for="file-input2">
								<i class="lnr lnr-camera"></i>...New Arrivels 900 x 677<br>
								@if($bgphoto->newarrivels!="")
								<img id="blah2" src= "{{ $bgphoto->newarrivels }}" width="100" height="100">
								@else
								<img id="blah2" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
								@endif
							</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input style="display:none;" id="file-input3" name="collections" type='file' onchange="readURL3(this);" />                    
							<label for="file-input3">
								<i class="lnr lnr-camera"></i>...Collections 900 x 677<br>
								@if($bgphoto->collections!="")
								<img id="blah3" src= "{{ $bgphoto->collections }}" width="100" height="100">
								@else
								<img id="blah3" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
								@endif
							</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-4"><div class="form-group">

						<input style="display:none;" id="file-input4" name="lovelys" type='file' onchange="readURL4(this);"/>                    
						<label for="file-input4">
							<i class="lnr lnr-camera"></i>...lovely 900 x 677<br>
							@if($bgphoto->lovelys!="")
							<img id="blah4" src= "{{ $bgphoto->lovelys }}" width="100" height="100">
							@else
							<img id="blah4" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							@endif
						</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input style="display:none;" id="file-input5" name="specialselection" type='file' onchange="readURL5(this);" />                    
						<label for="file-input5">
							<i class="lnr lnr-camera"></i>...Our Special Selection 1600 x 933<br>
							@if($bgphoto->specialselection!="")
							<img id="blah5" src= "{{ $bgphoto->specialselection }}" width="100" height="100">
							@else
							<img id="blah5" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							@endif
						</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input style="display:none;" id="file-input6" name="newcollection" type='file' onchange="readURL6(this);" />                    
						<label for="file-input6">
							<i class="lnr lnr-camera"></i>...New collection 1600 x 933<br>
							@if($bgphoto->newcollection!="")
							<img id="blah6" src= "{{ $bgphoto->newcollection }}" width="100" height="100">
							@else
							<img id="blah6" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
							@endif
						</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4"><div class="form-group">

					<input style="display:none;" id="file-input7" name="businesspartner" type='file' onchange="readURL7(this);"/>                    
					<label for="file-input7">
						<i class="lnr lnr-camera"></i>...businesspartner 1600 x 933<br>
						@if($bgphoto->businesspartner!="")
						<img id="blah7" src= "{{ $bgphoto->businesspartner }}" width="100" height="100">
						@else
						<img id="blah7" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
						@endif
					</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<input style="display:none;" id="file-input8" name="footer" type='file' onchange="readURL8(this);" />                    
					<label for="file-input8">
						<i class="lnr lnr-camera"></i>...footer 1600 x 933<br>
						@if($bgphoto->footer!="")
						<img id="blah8" src= "{{ $bgphoto->footer }}" width="100" height="100">
						@else
						<img id="blah8" src="//placehold.it/100" class="avatar img-circle" alt="avatar" alt="your image" />
						@endif
					</label>
				</div>
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

	function readURL4(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah4')
				.attr('src', e.target.result)
				.width(150)
				.height(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	function readURL5(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah5')
				.attr('src', e.target.result)
				.width(150)
				.height(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	function readURL6(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah6')
				.attr('src', e.target.result)
				.width(150)
				.height(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	function readURL7(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah7')
				.attr('src', e.target.result)
				.width(150)
				.height(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	function readURL8(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah8')
				.attr('src', e.target.result)
				.width(150)
				.height(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

@stop
