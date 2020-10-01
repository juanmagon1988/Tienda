@extends('admin.template')

@section('content')
	<div class="container text-center">
		<div class="page-header">
		<h1>
			<i class="fa fa-shopping-cart"></i> PEDIDOS <small>[Editar pedido]</small>
		</h1>
		</div>

		<div class="row">
			<div class="col-md-offset-3 col-md-11">
				

			<div class="page">
				
			@if(count($errors)>0)
				@include('admin.partials.errors')
 			@endif


			
			{!!Form::model($order, array('route'=>array ('orders.update', $order)))!!}

			<input type="hidden" name="_method" value="PUT">

				<div class="form-group">
					<label for="name">Nombre: </label>
					{!!Form::text(
						'name', 
						null, 
						array('class'=>'form-control',
							'placeholder'=>'Ingresa el nombre...',
							'autofocus'=>'autofocus'	

						))
					!!}
				</div>

					<div class="form-group">
					<label for="name">Apellido: </label>
					{!!Form::text(
						'last_name', 
						null, 
						array('class'=>'form-control',
							'placeholder'=>'Ingresa el apellido...',
							'autofocus'=>'autofocus'	

						))
					!!}
				</div>


				<div class="form-group">
					<label for="name">Email: </label>
					{!!Form::text(
						'email', 
						null, 
						array('class'=>'form-control',
							'placeholder'=>'Ingresa el mail...',
							'autofocus'=>'autofocus'	

						))
					!!}
				</div>

				<div class="form-group">
					<label for="name">Dirección: </label>
					{!!Form::text(
						'address', 
						null, 
						array('class'=>'form-control',
							'placeholder'=>'Ingresa la dirección...',
							'autofocus'=>'autofocus'	

						))
					!!}
				</div>

				<div class="form-group">
					<label for="name">Teléfono: </label>
					{!!Form::text(
						'phone', 
						null, 
						array('class'=>'form-control',
							'placeholder'=>'Ingresa el teléfono...',
							'autofocus'=>'autofocus'	

						))
					!!}
				</div>



				<div class="form-group">
					<label for="description">Descripción: </label>
					{!!Form::textarea(
						'description',
						null,
						array(
						'class'=>'form-control'
						)
						)
						!!}

				</div>

			
				

				<div class="form-group">
					{!!Form::submit('Actualizar', array('class'=>'btn btn-primary'))!!}

					<a href="{{ route ('orders.index') }}" class="btn btn-warning">Cancelar</a>
				</div>	


				{!!Form::close()!!}


			</div>	


		</div>



		</div>

	</div>


@stop