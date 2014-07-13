@extends ('layouts.master')

@section ('title')
Shop
@stop

@section ('content')

<form action="{{ URL::route('shop') }}" method="get" accept-charset="utf-8">

@foreach ($styles as $style)
<label for="style{{ $style->id }}">{{ $style->style }}</label><input {{ (in_array($style->id, $filters) ? "checked='checked'" : '') }} id="style{{ $style->id }}" type="checkbox" name="filters[]" value="{{ $style->id }}"><br>
@endforeach

<button class="btn btn-primary" type="submit">Filter</button>
</form>

@foreach ($tshirts as $tshirt)
<img src="{{ asset('img/tshirts/'.$tshirt->image) }}" width="300" height="400">
{{ $tshirt->styles }}<br>
@endforeach
@stop
