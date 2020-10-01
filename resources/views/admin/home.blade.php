@extends('admin.template')


@section('content')


<div class="container text-center">
	<div class="page-header">
		<h1><i class="fa fa-rocket"></i> PANEL DE ADMINISTRACION</h1>
	</div>

	<h2>Bienvenido {{Auth::user()->name}} al panel de administración de tu tienda en linea</h2><hr>

	<div class="row">
		<div class="col-md-6">
			<div class="panel">
				<i class="fa fa-list-alt icon-home"></i>
				<a href="{{ route('categories.index') }}" class="btn btn-warning btn-block btn-home-admin">
					CATEGORIAS
				</a>
			</div>
		</div>	

		<div class="col-md-6">
		<div class="panel">
			<i class="fa fa-shopping-cart icon-home"></i>
			<a href="{{ route('products.index') }}" class="btn btn-warning btn-block btn-home-admin">
				PRODUCTOS
			</a>
		</div>
		</div>


	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="panel">
				<i class="fa fa-cc-visa  icon-home"></i>
				<a href="{{ route('orders.index') }}" class="btn btn-warning btn-block btn-home-admin">
					PEDIDOS
				</a>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel">
				<i class="fa fa-users icon-home"></i>
				<a href="{{ route('users.index') }}" class="btn btn-warning btn-block btn-home-admin">
					USUARIOS
				</a>
			</div>
		</div>

	</div>


</div>

@stop