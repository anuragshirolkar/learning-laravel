@extends ('layouts.master')

@section ('title')
Admin | Add Color
@stop

@section ('content')
<form action="{{ URL::route('color.store') }}" method="post" accept-charset="utf-8">
	<div class="form-group">
		<label for="color">Color</label>
		<input type="text" name="color" value="{{ Input::old('color') }}" id="color">
	</div>
	<div class="form-group">
		<label for="code">Code</label>
		<input type="text" name="code" value="{{ Input::old('code') }}" id="code">
	</div>
<button class="btn btn-primary" type="submit">Submit</button>
</form>
@stop
