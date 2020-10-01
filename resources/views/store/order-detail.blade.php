
@extends('store.template')

@section('content')

<div class="container text-center" >
	<div class="page-header">
  		<h1> <i class="fa fa-shopping-cart"></i> Detalle del pedido </h1> <hr>
	</div>


	<div class="page">
		<div class="table-responsive">
			<h3>Datos del usuario</h3>
			<table class="table table-striped table-hover table-bordered">
				<tr><td>Nombre: </td><td>{{ Auth::user()->name . " " . Auth::user()->last_name }}</td></tr>
				<tr><td>Correo: </td><td>{{ Auth::user()->email }}</td></tr>
				<tr><td>Dirección: </td><td>{{ Auth::user()->address }}</td></tr>
			</table>
		</div>
		<div class="table-responsive">
			<h3>Datos del pedido</h3>
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<th>Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
				</tr>
				@foreach($cart as $item)
					<tr>
						<td>{{ $item->name }}</td>
						<td>{{ number_format($item->price,2)}}</td>
						<td>{{$item->quantity}}</td>
						<td>{{ number_format($item->price * $item->quantity,2) }}</td>
					</tr>
				@endforeach
			</table><hr>
			<h3><span class="label label-success">
				Total: ${{ number_format($total, 2) }}
			</span>
			</h3><hr>
			
			<p>
				<a href="{{ route('cart-show') }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i>  Regresar</a>


			
				  <form action="/procesar-pago" method="POST">
    			      @csrf
 					 <script
					   src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
  					 data-preference-id="<?php echo $preference->id; ?>">
 					 </script>
					</form>
			
			

				
				
			</p>
		</div>
	</div>





</div>




@stop