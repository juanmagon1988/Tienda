<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StoreController extends Controller
{
   public function index () {

   	$products = Product::all();

   //	dd($products);
   	return view ('store.index', compact('products'));
   }



   public function show ($slug) {

   	$product = Product::where('slug', $slug)->first();   //va a buscar en la tabla productos donde el slug sea igual al que recibio como argumento.. como pueden ser varios que nos devuelva el primero 

   	//dd($product);

   	return view ('store.show', compact('product'));

   }

}
