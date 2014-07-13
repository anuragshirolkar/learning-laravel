@extends ('layouts.master')

@section ('title')
Admin | Sizes
@stop

@section ('content')
<h3>Sizes</h3>
@foreach ($sizes as $size)
	{{ $size->size }}<a href="{{ URL::route('size.edit', array($size->id)) }}">Edit</a><br>
@endforeach
@stop

