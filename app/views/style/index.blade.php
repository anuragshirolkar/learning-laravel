@extends ('layouts.master')

@section ('title')
Admin | Styles
@stop

@section ('content')

<h3>Styles</h3>
@foreach ($styles as $style)
	{{ $style->style }}<a href="{{ URL::route('style.edit', array($style->id)) }}">Edit</a><br>
@endforeach


@stop
