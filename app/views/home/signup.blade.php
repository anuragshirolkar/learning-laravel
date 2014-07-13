@extends ('layouts.master')

@section ('title')
Sign Up
@stop

@section ('content')
<form role="form" action="{{ URL::route('signup.register') }}" method="post">
	@if ($errors->has())
	<div id="errors">
		@foreach ($errors->all() as $error)
		{{ $error }}<br>
		@endforeach
	</div>
	@endif
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="name" value="{{ Input::old('name') }}" id="name">
	</div>
	<div class="form-group">
		<label for="inputusername">Username</label>
		<input type="text" class="form-control" id="inputusername" name="username" value="{{ Input::old('username') }}" required>
	</div>
	<div class="form-group">
		<label for="inputUsernameEmail">Email</label>
		<input type="email" class="form-control" id="inputUsernameEmail" name="email" value="{{ Input::old('email') }}" required>
	</div>
	<div class="form-group">
		<label for="inputPassword">Password</label>
		<input type="password" class="form-control" id="inputPassword" name="password" required>
	</div>
	<div class="form-group">
		<label for="phone">Phone Number</label>
		<input type="text" class="form-control" name="phone" value="{{ Input::old('phone') }}" id="phone"required>
	</div>
	<div class="form-group">
		<label for="address">Address</label>
		<input type="text" name="address" class="form-control" value="{{ Input::old('address') }}" id="address" required>
	</div>
	<div class="form-group">
		<label for="town">Town/City</label>
		<input type="text" name="town" class="form-control" value="{{ Input::old('town') }}" id="town" required>
	</div>
	<div class="form-group">
		<label for="state">State</label>
		{{ Form::select('state', ['Maharashtra' => 'Maharashtra',  'Bihar' => 'Bihar']) }}
	</div>
	<div class="form-group">
		<label for="pincode">Postcode/Zip</label>
		<input type="text" class="form-control" id="pincode" value="{{ Input::old('pincode') }}" name="pincode" required>
	</div>
	<button type="submit" class="btn btn-primary btn-sm">
		Register
	</button>
</form>
@stop
