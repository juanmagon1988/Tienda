<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SaveProductRequest;//importo el request (lo escribi mal)
use App\Http\Controllers\Controller;
use App\Category;   // Importo los modelos
use App\Product;    // Importo los modelos

class ProductController extends Controller
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
        $products = Product::orderBy('id', 'desc')->paginate(5);
        //dd($products);

        return view ('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->pluck('name', 'id');
       // dd($categories);

     return view ('admin.products.create', compact('categories'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
       if ($request->hasFile('image')){                              

        $file= $request->file('image');                             //obtengo la imagen
        $name = time().$file->getClientOriginalName();              //Le antepongo al nombre la fecha para que no haya superposicion
        $file->move(public_path().'/images/', $name);               //La envio a la carpepa public/images

       }



        $data = [
            'name'          => $request->get('name'),
            'slug'          => str_slug($request->get('name')),
            'description'   => $request->get('description'),
            'extract'       => $request->get('extract'),
            'price'         => $request->get('price'),
            'image'         => $name,                               //esta en la direccion de la foto
            'visible'       => $request->has('visible') ? 1 : 0,
            'category_id'   => $request->get('category_id')
        ];

        $product = Product::create($data);

        
        
        return redirect()->route('products.index');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit(Product $product)
{
    $categories = Category::orderBy('id', 'asc')->pluck('name', 'id');
        
    return view('admin.products.edit', compact('categories', 'product'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Product $product, SaveProductRequest $request)
{
  $product->fill($request->except('image'));

    if ($request->hasFile('image')){                              

        $file= $request->file('image');                             //obtengo la imagen
        $nombre = time().$file->getClientOriginalName();              //Le antepongo al nombre la fecha para que no haya superposicion
        $product->image = $nombre;
        $file->move(public_path().'/images/', $nombre);               //La envio a la carpepa public/images

       }

    $product->slug = str_slug($request->get('name'));
    $product->visible = $request->has('visible') ? 1 : 0;
        
    $updated = $product->save();
        
    
        
    return redirect()->route('products.index');


    

}
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
   public function destroy(Product $product)
{
    $deleted = $product->delete();
       
    
        
    return redirect()->route('products.index');
}
}
