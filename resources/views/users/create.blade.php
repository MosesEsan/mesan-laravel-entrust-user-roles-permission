@extends('layouts.app')

@section('content')
	<div class="span9">
		<div class="row-fluid">
			<div class="page-header">
				<h1>New User <small>User registration</small></h1>
			</div>

			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif



			<form action="{{ url('users') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<fieldset>
					<div class="control-group">
						<label class="control-label" for="name">Name</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="name" name="name"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">E-mail</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="email"  name="email"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input type="password" class="input-xlarge" id="password" name="password" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">Confirm Password</label>
						<div class="controls">
							<input type="password" class="input-xlarge" id="password" name="confirm-password" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="role">Role</label>
						<div class="controls">
							<select id="role" name="roles[]" multiple>
								@foreach ($roles as $key => $role)
									<option value="{{$key}}">{{$role}}</option>
								@endforeach
							</select>

						</div>
					</div>
					<div class="form-actions">
						<input type="submit" class="btn btn-success btn-large" value="Save User" />
						<a class="btn"  href="{{ url('/users') }}">Cancel</a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
@endsection
