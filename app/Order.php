<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $table = 'orders';   //quiero que la tabla se llame orders

    protected $fillable = ['name', 'last_name', 'email', 'address', 'phone', 'status', 'code', 'description', 'total']; //indico los campos que vamos a estar trabajando en nuestro formulrio


}
