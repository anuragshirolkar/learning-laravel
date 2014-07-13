@extends ('layouts.master')

@section ('title')
Admin | Add Tshirt
@stop

@section ('stylesheets')
<link rel="stylesheet" href="{{ URL::asset('packages/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" type="text/css" media="screen" charset="utf-8">
@stop

@section ('content')
<form method="POST" action="{{ URL::route('tshirt.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Title</label>
		<input class="form-control" type="text" name="title" value="{{ Input::old('title') }}" id="title" required>
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<textarea class="form-control" type="text" name="description" id="description">{{ Input::old('description') }}</textarea required>
	</div>
	<div class="form-group">
		<label for="tags">Tags</label>
		<input class="form-control" type="text" name="tags" placeholder="Enter Tags" value="{{ Input::old('tags') }}" id="tags" required>
	</div> 
	<div class="form-group">
		<label for="sizes">Sizes</label>
		<div id="sizes"></div>
	</div>
	<div class="form-group">
		<label for="styles">Styles</label>
		<div id="styles"></div>
	</div>
	<div class="form-group">
		<label for="fabrics">Fabrics</label>
		<div id="fabrics"></div>
	</div>
	<div class="form-group">
		<label for="wash_care">Wash Care</label>
		<input class="form-control" type="text" name="wash_care" value="{{ Input::old('wash_care') }}" id="wash_care" required>
	</div>
	<div class="form-group">
		<label for="price">Price</label>
		<input class="form-control" type="text" name="price" value="{{ Input::old('price') }}" id="price" required>
	</div> 
	<div class="form-group">
		<label for="colors">Colors</label>
		<div id="colors"></div>
	</div>
	<div class="form-group">
		<label for="image">Upload Image</label>
		<input type="file" id="image" name="image">
	</div> 
	<button class="btn btn-primary" type="submit">Submit</button>
</form>

@stop

@section ('scripts')


<script src="{{ URL::asset('packages/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('packages/bootstrap2/js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('packages/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

<script type="text/javascript" charset="utf-8">


$('#tags').tagsinput({
  typeahead: {
    source: function(query) {
      return $.get("{{ URL::route('data.tagslist') }}");
    }
  }
});

@foreach (Size::all() as $size)
	$('#sizes').append('<label for="size{{ $size->id }}">{{ $size->size }}</label><input id="size{{ $size->id }}" type="checkbox" name="sizes[]" value="{{ $size->size }}"><br>');
@endforeach

@foreach (Style::all() as $style)
	$('#styles').append('<label for="style{{ $style->id }}">{{ $style->style }}</label><input id="style{{ $style->id }}" type="checkbox" name="styles[]" value="{{ $style->style }}"><br>');
@endforeach

@foreach (Fabric::all() as $fabric)
	$('#fabrics').append('<label for="fabric{{ $fabric->id }}">{{ $fabric->name }}</label><input id="fabric{{ $fabric->id }}" type="checkbox" name="fabrics[]" value="{{ $fabric->name }}"><br>');
@endforeach

@foreach (Color::all() as $color)
	$('#colors').append('<label for="color{{ $color->id }}"><div style="background-color:{{ $color->code }}">{{ $color->color }}</div></label><input id="color{{ $color->id }}" type="checkbox" name="colors[]" value="{{ $color->color }}"><br>');
@endforeach

</script>
@stop
