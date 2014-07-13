@extends ('layouts.master')

@section ('title')
Admin | Edit Style
@stop

@section ('content')

<form action="{{ URL::route('style.update', $style->id) }}" method="post" accept-charset="utf-8">
	
	<div class="form-group">
		<label for="style">Style</label>
		<input type="text" name="style" value="{{ $style->style }}" id="style">
	</div>

<button class="btn btn-primary" type="submit">Submit</button>
</form>


@stop
