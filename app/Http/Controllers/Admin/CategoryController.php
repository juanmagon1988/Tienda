<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
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

        $categories = Category::all();
        //  dd($categories);

        return view ('admin.categories.index', compact('categories'));

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $this->validate($request, [                         //valido lo que ingreso
            'name'=>'required|unique:categories|max:255',
            'color'=>'required',
            ]);

        $category = category::create([                       //creo un nuevo registro en la ddbb
            'name'=> $request->get('name'),
            'slug'=> str_slug($request->get('name')),
            'description'=>$request->get('description'),
            'color'=>$request->get('color')
        ]);

        
        return redirect()->route('categories.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $Category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view ('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
     
        $category->fill($request->all());
        $category->slug = str_slug($request->get('name')); //como no tengo el slug en el formulario lo armo desde aca
        $updated = $category->save();

        return redirect()->route('categories.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $deleted = $category->delete();
        return redirect()->route('categories.index');        
    }
}
