@extends('admin.template')
 
@section('content')
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-shopping-cart"></i> DETALLE DE PEDIDO
              
            </h1>
        </div>
        
        <div class="page">
            
            <div class="table-responsive">
                <p>DATOS DEL CLIENTE</p>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            
                         
                            

                            
                            <th>Nombre y apellido</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>



                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                               
                               
                            

                                <td>{{ $order->name }} {{ $order->last_name }}</td>
                                <td>{{ $order->email }} </td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->phone }}</td>



                                
                            </tr>
                       
                    </tbody>

                </table>


                <p>DATOS DE LA COMPRA</p>

                 <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            
                            <th>Fecha de compra</th>
                            <th>Fecha de actualización</th>
                            <th>N° de orden</th>
                            <th>Estado de pago</th>
                            <th>Valor</th>
                            <th>Detalle del pedido</th>
                        </tr>
                    </thead>
                    <tbody>
                             <tr>
                               
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td>{{ $order->code }}</td>
                                <td>{{ $order->status }}</td>
                                <td>${{ $order->total }}</td>
                                <td>{{ $order->description }}</td>
                            </tr>
                       
                    </tbody>
                </table>


                    <p>MODIFICAR PEDIDO</p>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            
                            <th>Editar</th>
                            <th>Eliminar</th>
                            

                          



                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                               
                               
                                <td><a href="{{ route ('orders.edit', $order) }}" class="btn btn-primary">
                                    <i class="fa fa-pencil-square"></i>
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




                                
                            </tr>
                       
                    </tbody>

                </table>



            </div>
            
            <p>
                  <a class="btn btn-primary" href="{{ route('orders.index') }}">
                 <i class="fa fa-chevron-circle-left"></i> Regresar
                 </a>
            </p>
           
            
        </div>































    </div>
@stop

