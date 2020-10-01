<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use\App\Product;
use MercadoPago;
use\App\Order;
use\App\User;

realpath(__DIR__).'..\vendor\autoload.php';

class CartController extends Controller
{

	public function __construct(){

		if(!\Session::has('cart')) \Session::put('cart', array());  //si no existe la variable de sesion carrito, entonces la creo y lo que guardo en esa variable es un  array vacio
	}


	//show item

	public function show(){

		$cart =  \Session::get('cart'); 

		$total = $this->total(); //viene de la funcion total

		return view('store.cart', compact('cart', 'total')); 

		 
	}


    //add item
	
	public function add(Product $product){  //antes ubiera reciido el slug, pero con el route blid que esta en web.php directamente recibe el producto

		$cart = \Session::get('cart');  //recibo mi variable de sesion cart y la guardo en mi variable local $cart
		$product->quantity = 1;         //agrego la propiedad de cantidad y la defino en 1 para mi producto 
		$cart[$product->slug] = $product;  //luego ese objeto producto lo guardo dentro de mi array $cart en la posicion que me determina el slug

		\Session::put('cart', $cart); // actualizo mi variable de session 

		return redirect()->route('cart-show');
		 
	}

    
    //Delete item

	public function delete(product $product){

		$cart = \Session::get('cart');
		unset($cart[$product->slug]); 
		\Session::put('cart', $cart);

		return redirect()->route('cart-show');
	}


    //Update item

	public function update (product $product, $quantity){

		



		$cart= \Session::get('cart');
		$cart[$product->slug]->quantity= $quantity;
		\Session::put('cart', $cart);

		return redirect()->route('cart-show');
	}



    //Trash cart (limpiar el carro)
	
	public function trash (){
		\Session::forget('cart'); //borra lo que hay en la variable cart
		return redirect()->route('cart-show');
}
    

    //total

	private function total(){

		$cart= \Session::get('cart');
		$total=0;
		foreach ($cart as $item) {

			if($item->quantity >0 and floor($item->quantity) == $item->quantity)

			$total += $item->price * $item->quantity;	

			else
			$total=0;				
		}

		return $total;

	}	


	//detalle del pedido
	//en el if valido 	que haya algo en el carrito.. si lo que contiene la variable cart es menor o igual a 0 redirecciona al home
	public function orderDetail(){
		if(count(\Session::get('cart'))<=0) return redirect()->route('home');  
		
		$cart=\Session::get('cart');
		$total=$this->total();

//parte de mercado pago

MercadoPago\SDK::setAccessToken('TEST-4399090088869886-072616-2175d1db285d73215b1af061e9b5961b-277403573');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Compra';
$item->quantity = 1;
$item->unit_price = $total;
$preference->items = array($item);
$preference->save();

		return view ('store.order-detail', compact('cart', 'total', 'preference')); 
		 
	}



/*
METODO POSTHOME

metodo que guarda en la base de datos el pedido.
primero recibe el estado del pago (aprobado xej)
despues toma el id del pago
trae los datos del carrito y del usuario

despues guarda en la variable $productos el detalle del pedido por nombre y cantidad del producto
con implode convierte un array en string para guardarlo en la base de datos


luego verifica si el id del pago ya existe (por si actualizan la pagina), en la variable $payment_iddb va a buscar en 
la tabla order donde code (donde se almacenan los id de los pagos) sea igual a payment_id (el id que recibe por request)
si hay coincidencia va a crear un objeto, sino la hay no crea el objeto y en el if  va a decir que si $payment_iddb es diferente a un objeto crea uno y le asigna al valor code un false. acto seguido guarda los datos en la base de datos, caso contrario nunca entra al if (porque ya existe el registro)   
*/


public function postHome(Request $request){

$payment_status = $request->input('payment_status');
$payment_id = $request->input('payment_id');
$cart=\Session::get('cart');
$user = \Auth::user();
$total=$this->total();



$productos = array();
  foreach($cart as $item){ 
   
	array_push($productos, 'Producto: ', $item->name, ' Cantidad: ',  $item->quantity, ' ----- ');                      
               
   }

$productos2 = implode($productos);



$payment_iddb = Order::where('code', '=', $payment_id)->first();



if (!is_object($payment_iddb)) {

	$payment_iddb = new \stdClass();

	$payment_iddb->code = false;



	$data = [
            'name'          	=> $user->name,
            'last_name'         => $user->last_name,
            'email'  			=> $user->email,
            'address'       	=> $user->address,
            'phone'       		=> $user->phone,
            'status'         	=> $payment_status,
            'code'        		=> $payment_id,
            'description'       => $productos2,
            'total'        		=> $total
            
        ];

        $order = Order::create($data);


   
} 

return view ('store.procesar-pago', compact('payment_status', 'payment_id', 'cart', 'payment_iddb'));





}





		
}

