@extends ('layouts.master')

@section ('title')
Admin | Fabrics
@stop

@section ('content')


<h3>Fabrics</h3>
@foreach ($fabrics as $fabric)
	{{ $fabric->name}}<a href="{{ URL::route('fabric.edit', array($fabric->id)) }}">Edit</a><br>
	{{ $fabric->description }}<br><br>
@endforeach



@stop
