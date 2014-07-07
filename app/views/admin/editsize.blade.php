@extends ('layouts.master')

@section ('title')
Admin | Edit Size
@stop

@section ('content')

<form action="{{ URL::route('size.update', $size->id) }}" method="post" accept-charset="utf-8">
	
	<div class="form-group">
		<label for="size">Size</label>
		<input type="text" name="size" value="{{ Input::old('size') }}" id="size">
	</div>

<button class="btn btn-primary" type="submit">Submit</button>
</form>

@stop
