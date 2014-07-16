@extends ('layouts.master')

@section ('title')
{{ $tshirt->title }}
@stop



@section ('content') 
<div class="row container">
	@if ($errors->has('cart_update'))
		<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		{{ $errors->first('cart_update') }}
		</div>
	@endif
	<div class="col-md-6">
		<img src="{{ asset('img/tshirts/'.$tshirt->image) }}" width="100%">
	</div>
	<div class="col-md-6">
		<h2>{{ $tshirt->title }}</h2>
		<p>{{ $tshirt->description }}</p>
		<h4>Rs. {{ $tshirt->price }}</h4>
		<form action="{{ URL::route('cart.create') }}" method="post" accept-charset="utf-8">
		<input type="hidden" value="{{ $tshirt->id }}" name="tshirtid">
		<label style="width:100px" for="size">Choose size</label>
		<select class="form-control" id="size" name="size">
		@foreach (explode(',', $tshirt->sizes) as $size)
			<option value="{{ $size }}" {{ (Input::old('size') == $size ? 'selected' : "") }}>{{ $size }}</option>
		@endforeach
		</select>
		@if (sizeof(explode(',', $tshirt->colors)) > 1)
		<label style="width:100px" for="color">Choose Color</label>
		<select class="form-control" id="color" name="color">
		@foreach (explode(',', $tshirt->colors) as $color)
			<option value="{{ $color }}" {{ (Input::old('color') == $color ? 'selected' : "") }}>{{ $color }}</option>
		@endforeach
		@else
		Color Available : {{ $tshirt->colors }}
		@endif
		</select><br>
		<label  style="width:100px" for="quantity">Quantity</label>
		<input name="quantity" type="number" min="1" style="width:50px;" value="{{ (Input::old('quantity') == NULL) ? 1 : Input::old('quantity') }}"><br><br>
		<button class="btn btn-primary" type="submit">Add to cart</button>
		</form>
		Tags : {{ $tshirt->tags }}

	</div>
</div>

@stop
