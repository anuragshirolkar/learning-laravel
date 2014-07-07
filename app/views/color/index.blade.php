@extends ('layouts.master')

@section ('title')
Admin | Colors
@stop

@section ('content')
<div id="colors-container">
	@foreach ($colors as $color)
		<div id="color{{ $color->id }}" class="color-group">
			<a href="{{ URL::to('/admin/editcolor/'.$color->id) }}">
				<div class="pull-left" style="background-color:{{ $color->code }};height:20px; width:50px;margin-right:20px"></div>
				<p>{{ $color->color }}</p>
			</a>
		</div>
	@endforeach
</div>
@stop
