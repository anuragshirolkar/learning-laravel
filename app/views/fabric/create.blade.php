@extends ('layouts.master')

@section ('title')
Admin | Add Fabric
@stop

@section ('content')

<form action="{{ URL::route('fabric.store') }}" method="post" accept-charset="utf-8">
	
	<div class="form-group">
		<label for="name">Fabric Name</label>
		<input type="text" name="name" value="{{ Input::old('name') }}" id="name">
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<textarea type="text" name="description" value="{{ Input::old('description') }}" id="description"></textarea>
	</div>

<button class="btn btn-primary">Submit</button>
</form>

@stop
