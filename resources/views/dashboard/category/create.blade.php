@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				
				<h3 class="panel-title">New Category</h3>
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
				<form action="{{ route("categorys.store") }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="" name="name" placeholder="Enter Category Name" value="{{ old('name') }}" required>
					</div>
					<div class="form-group">
						<label for="name">mName</label>
						<input type="text" class="form-control" id="" name="mname" placeholder="Enter Category mName" value="{{ old('mname') }}" required>
					</div>

					<div class="form-group">
						<label for="name">Maincategory</label>
						<br>
						<select name="maincategory">
						@foreach($maincategorys as $maincategory)
						<option value="{{ $maincategory->id }}">{{ $maincategory->name }}</option>
						@endforeach	
						</select>

					</div>
					
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
			
		</div>


	</div>
</div>

@stop