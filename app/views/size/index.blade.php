@extends ('layouts.master')

@section ('title')
Admin | Sizes
@stop

@section ('content')
<h3>Sizes</h3>
@foreach ($sizes as $size)
	{{ $size->description }}<a href="{{ URL::route('admin.editsize', array($size->id)) }}">Edit</a><br>
@endforeach
@stop

