@extends ('layouts.master')

@section ('title')
Admin | Add Tshirt
@stop

@section ('stylesheets')
<link rel="stylesheet" href="{{ URL::asset('packages/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" type="text/css" media="screen" charset="utf-8">
@stop

@section ('content')
<!--<form action="{{ URL::route('admin.addtshirt') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">-->
{{ Form::open(['route'=>'admin.addtshirt', 'files'=>true]) }}
	<div class="form-group">
		<label for="title">Title</label>
		<input class="form-control" type="text" name="title" value="{{ Input::old('title') }}" id="title" required>
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<textarea class="form-control" type="text" name="description" value="{{ Input::old('description') }}" id="description"></textarea required>
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
		<label for="image">File input</label>
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
$('#sizes').append('<label for="size{{ $size->id }}">{{ $size->description }}</label><input id="size{{ $size->id }}" type="checkbox" name="sizes[]" value="{{ $size->id }}"><br>');
@endforeach
	
@foreach (Color::all() as $color)
$('#colors').append('<label for="color{{ $color->id }}"><div style="background-color:{{ $color->code }}">{{ $color->color }}</div></label><input id="color{{ $color->id }}" type="checkbox" name="colors[]" value="{{ $color->id }}"><br>');
@endforeach

</script>
@stop
