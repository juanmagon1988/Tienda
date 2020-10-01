<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SaveOrderRequest;
use App\Http\Controllers\Controller;
use App\Category;   // Importo los modelos
use App\Product;    // Importo los modelos
use App\Order;   // Importo los modelos



class OrderController extends Controller
{




    public function __construct()   // middleware verifica que sea admin
    {
        $this->middleware('admin');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $orders = Order::orderBy('id', 'desc')->paginate(5);
        //dd($products);


        return view ('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->first(); 
       

        return view ('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view ('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order, SaveOrderRequest $request)
    {
        $order->fill($request->all());
       // $category->slug = str_slug($request->get('name')); //como no tengo el slug en el formulario lo armo desde aca
        $updated = $order->save();

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
         $deleted = $order->delete();
       
    
        
    return redirect()->route('orders.index');
}
    
}
