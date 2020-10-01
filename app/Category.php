<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = 'categories';   //quiero que la tabla se llame categories

    protected $fillable = ['name', 'slug', 'description', 'color']; //indico los campos que vamos a estar trabajando en nuestro formulrio


    public $timestamps = false;  // esto porque no voy a usar los createdup y updatead


    public function products(){ //para cada categoria puede haber muchos productos

    	return $this->hasMany('App\Product');
    }


}
