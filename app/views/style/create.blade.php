@extends ('layouts.master')

@section ('title')
Admin | Add Style
@stop

@section ('content')

<form action="{{ URL::route('style.store') }}" method="post" accept-charset="utf-8">
	
	<div class="form-group">
		<label for="style">Style</label>
		<input type="text" name="style" value="{{ Input::old('style') }}" id="style">
	</div>

<button class="btn btn-primary">Submit</button>
</form>

@stop
