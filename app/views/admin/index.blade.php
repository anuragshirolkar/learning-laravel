@extends ('layouts.master')

@section ('title')
Admin
@stop

@section ('content')
<div id="admin-panel">
	<a href="{{ URL::route('tshirt.create') }}"><button class="btn btn-warning btn-xs">Add Tshirt</button></a>
	<a href="{{ URL::route('admin.addbook') }}"><button class="btn btn-warning btn-xs">Add Book</button></a>
</div>
@stop
