@extends('layouts.app')

@section('content')
	<div class="span9">
		<div class="row-fluid">
			<div class="page-header">
				<h1>Users <small>All users</small></h1>
			</div>
			<table class="table table-striped table-bordered table-condensed">
				<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>E-mail</th>
					<th>Role</th>
					<th></th>
				</tr>
				</thead>
				<tbody>

				@foreach ($data as $key => $user)

					<tr class="list-users">
						<td>{{ ++$i }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>
							@if(!empty($user->roles))
								@foreach($user->roles as $v)
									<label class="label label-success">{{ $v->display_name }}</label>
								@endforeach
							@endif
						</td>

						<td>
							{{--<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>--}}
							<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

							<form action="{{ url('users/'.$user->id) }}" method="POST" style="display: inline-block">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}

								<button type="submit" id="delete-task-{{ $user->id }}" class="btn btn-danger">
									<i class="fa fa-btn fa-trash"></i>Delete
								</button>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{--<div class="pagination">--}}
			{{--<ul>--}}
			{{--<li><a href="#">Prev</a></li>--}}
			{{--<li class="active">--}}
			{{--<a href="#">1</a>--}}
			{{--</li>--}}
			{{--<li><a href="#">2</a></li>--}}
			{{--<li><a href="#">3</a></li>--}}
			{{--<li><a href="#">4</a></li>--}}
			{{--<li><a href="#">Next</a></li>--}}
			{{--</ul>--}}
			{{--</div>--}}
			<a href="{{ route('users.create') }}" class="btn btn-success">New User</a>
		</div>
	</div>
@endsection
