@extends ('layouts.master')

@section ('title')
Cart
@stop

@section ('content')

<style>
td{
	padding: 20px;
}
</style>

<h2>Cart</h2>
<h3>Tshirts</h3>
<table id="cart-table">
	<tr>
		<td>Preview</td>
		<td>Product</td>
		<td>Quantity</td>
		<td>Total</td>
		<td></td>
	</tr>
	@foreach ($cart->tshirts as $tshirt)
	<tr>
		<td>
			<img src="{{ asset('img/tshirts/'.$tshirts[$tshirt['id']]->image) }}" height="100px">
		</td>
		<td>
			<h3>{{ $tshirts[$tshirt['id']]->title }}</h3>
			<strong>Size: </strong>{{ $tshirt['size'] }}<br>
			<Strong>Rs. </strong>{{ $tshirts[$tshirt['id']]->price }}
		</td>
		<td><input type="number" min="1" value="{{ $tshirt['quantity'] }}" style="width:50px;"></td>
		<td>{{ $tshirt['quantity']*$tshirts[$tshirt['id']]->price }}</td>
		<td>&times</td>
	</tr>
	@endforeach
</table>
@stop
