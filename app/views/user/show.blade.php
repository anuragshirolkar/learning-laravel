@extends ('layouts.master')

@section ('title')
{{ $user->username }}
@stop

@section ('content')
<h3>This is the profile of <strong>{{ $user->username }}</strong>!!</h3>
His id is : <strong>{{ $user->id }}</strong>.
@stop
