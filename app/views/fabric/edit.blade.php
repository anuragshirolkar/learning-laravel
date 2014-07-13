@extends ('layouts.master')

@section ('title')
Admin | Edit Fabric
@stop

@section ('content')

<form action="{{ URL::route('fabric.update', $fabric->id) }}" method="post" accept-charset="utf-8">
	
	<div class="form-group">
		<label for="name">Fabric Name</label>
		<input type="text" name="name" value="{{ $fabric->name }}" id="name">
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<textarea type="text" name="description" id="description">{{ $fabric->description }}</textarea>
	</div>

<button class="btn btn-primary" type="submit">Submit</button>
</form>


@stop
