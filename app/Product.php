<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';   //quiero que la tabla se llame products

    protected $fillable = ['name', 'slug', 'description', 'extract', 'image', 'visible', 'price', 'category_id']; //indico los campos que vamos a estar trabajando en nuestro formulrio



    //Relacion con categoría
    public function category(){
    	return $this->belongsTo('App\Category'); //cada producto pertenece a una categoria

    }

}
