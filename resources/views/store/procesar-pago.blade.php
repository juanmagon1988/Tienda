
@extends('store.template')

@section('content')

<div class="container text-center" >
    

    <div class="page-header">
        @if ($payment_status == 'approved')
                  <h1>El pago fue exitoso!  </h1>

        @else
                   <h1>Algo salio mal! </h1>
        @endif

    </div>




    <div class="page">
        <div class="table-responsive">
            <h3>Datos del pedito</h3>
            <table class="table table-striped table-hover table-bordered">
                <tr><td>Código de la transacción: </td><td>{{$payment_id}}</td></tr>
                <tr><td>Nombre: </td><td>{{ Auth::user()->name . " " . Auth::user()->last_name }}</td></tr>
                <tr><td>Correo: </td><td>{{ Auth::user()->email }}</td></tr>
                <tr><td>Dirección de envío: </td><td>{{ Auth::user()->address }}</td></tr>
            </table>
        </div>
        <div class="table-responsive">
            <h3>Detalles del pedido</h3>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>Producto</th>
                    
                    <th>Cantidad</th>
                    
                </tr>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        
                        <td>{{$item->quantity}}</td>
                        
                    </tr>
                @endforeach
            </table><hr>
            
            
            <p>
                <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i>  Regresar</a>


            
            

                
                
            </p>
        </div>
    </div>





</div>




@stop