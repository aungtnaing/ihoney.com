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
			<form action="{{ route("categorys.update", $category->id) }}" method="POST" accept-charset="UTF-8">
					<input name="_method" type="hidden" value="PATCH">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="" name="name" placeholder="Enter Name" value="{{ $category->name }}" required>
					</div>

					<div class="form-group">
						<label for="name">mName</label>
						<input type="text" class="form-control" id="" name="mname" placeholder="Enter mName" value="{{ $category->mname }}" required>
					</div>

					<div class="form-group">
						<label for="name">Maincategory</label>
						<br>
						<select name="maincategory">
						@for ($i = 0; $i < count($maincategorys); $i++)
    						
							<option <?php if($maincategorys[$i][0] == $category->maincategory->id){echo 'selected="selected"'; }?> value="<?php echo $maincategorys[$i][0]; ?>"><?php echo $maincategorys[$i][1]; ?></option>
						@endfor

						</select>

					</div>

					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
			
		</div>


	</div>
</div>

@stop