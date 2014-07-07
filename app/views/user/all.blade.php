<html>
	<title>All Users</title>
	<body>
		<div id="title">
			<h2>This is the list of all users.<h2>
		</div>
		@foreach ($users as $user)
		<div>
			The id is : <a href="/users/{{ $user->id }}">{{ $user->id  }}</a>
			<br>
			The name is : <a href="/users/{{ $user->id }}">{{ $user->username  }}</a>
			<br>
			<br>
		</div>
		@endforeach
	</body>
</html>
