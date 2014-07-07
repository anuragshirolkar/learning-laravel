@extends ('layouts.master')

@section ('title')
Admin | Edit Color
@stop

@section ('content')

<form action="{{ URL::route('color.update', $color->id) }}" method="post" accept-charset="utf-8">
	<div class="form-group">
		<label for="color">Color</label>
		<input type="text" name="color" value="{{ $color->color }}" id="color">
	</div>
	<div class="form-group">
		<label for="code">Code</label>
		<input type="text" name="code" value="{{ $color->code }}" id="code">
	</div>
<button class="btn btn-primary" type="submit">Update</button>
</form>

@stop
