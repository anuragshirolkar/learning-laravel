<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"0>
		@section ('package-stylesheets')
			<link rel="stylesheet" href="{{ URL::asset('/packages/bootstrap/css/bootstrap.css') }}" type="text/css" media="screen" charset="utf-8">
		@show
		<link rel="stylesheet" href="{{ URL::asset('/css/master.css') }}" type="text/css" media="screen" charset="utf-8">
		@yield ('stylesheets')
		@yield ('header')
		<title>@yield ('title')</title>
	</head>
	<body>
		<div id="title" style="height:50px; width:100%; background-color:#eee; border-bottom:1px solid #ccc; text-align:center; line-height:50px">
			<h2>This is a website!!</h2>
		</div>
		@yield ('content')

	</body>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);
		body{
			font-family: 'Lato';
		}
	</style>
	@section ('package-scripts')
		<script src="{{ URL::asset('packages/jquery/jquery.min.js') }}"></script>
		<script src="{{ URL::asset('packages/bootstrap/js/bootstrap.js') }}"></script> 
	@show
	@yield ('scripts')
	@yield ('footer')

</html>
