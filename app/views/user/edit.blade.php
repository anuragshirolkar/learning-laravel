@extends ('layouts.master')

@section ('title')
	{{ $user->username }}
@stop

@section ('content')
Enter your new username: <input id="username"><br>
Enter your new password: <input id="pass1"><br>
Reenter your new password: <input id="pass2"><br>
<button>Submit</button>
@stop
