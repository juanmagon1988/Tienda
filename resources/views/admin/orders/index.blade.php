@extends('admin.template')
 
@section('content')
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-shopping-cart"></i> PEDIDOS
              
            </h1>
        </div>
        
        <div class="page">
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Fecha</th>
                            <th>N° de orden</th>
                            <th>Nombre y apellido</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Estado de pago</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <a href="{{ route('orders.show', $order->id) }}"  class="btn btn-primary">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </a>
                                </td>
                               
                                <td><a href="{{ route ('orders.edit', $order) }}" class="btn btn-primary"><i class="fa fa-pencil-square"></i>
                                    </a>
                                </td>
                               

                               
                                   
                                       <td>
                                    {!! Form::open(['route' => ['orders.destroy', $order->id]]) !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>   




                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->code }}</td>
                                <td>{{ $order->name }} {{ $order->last_name }}</td>
                                <td>{{ $order->email }} </td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->status }}</td>
                                <td>${{ $order->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <hr>
            
            <?php echo $orders->render(); ?>
            
        </div>
    </div>
@stop

