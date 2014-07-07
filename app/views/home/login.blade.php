@extends ('layouts.master')

@section ('title')
Login
@stop

@section ('content')
@if ($error = $errors->first('password'))
	<div class="alert alert-danger">
		{{ $error }}
	</div>
@endif
<form action="{{ URL::route('login.auth') }}" method="post" accept-charset="utf-8">
	<div class="form-group">
		<label for="username">Username</label>
		<input class="form-control" type="text" name="username" value="{{ Input::old('username') }}" id="username">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input class="form-control" type="password" name="password" id="password">
	</div>
	<button type="submit" class="btn btn-primary btn-sm">
		Login	
	</button> 


</form>

@stop
