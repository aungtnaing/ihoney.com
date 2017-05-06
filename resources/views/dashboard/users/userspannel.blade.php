@extends('dashboard.default')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">

		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Customers</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							
							<th>Name</th>
							<th>Email</th>
							<th>Ph1</th>
							<th>Ph2</th>
							<th>Address</th>
							<th>Fb</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						 @foreach($users as $user)
                        <tr>   
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                             <td>{{ $user->ph1 }}</td>
                            <td>{{ $user->ph2 }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->fburl }}</td>
                            @if(Auth::user()->roleid==1)
                           
                            <td>
                                <form method="POST" action="#" accept-charset="UTF-8">
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
			{!! $users->render() !!}
		</div>


	</div>
</div>

@stop