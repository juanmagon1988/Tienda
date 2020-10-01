<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Product;
use App\Category;
use App\Order;


class PanelController extends Controller
{


	 public function __construct()
    {
        $this->middleware('admin');
        
    }



    

public function panel(){



        return view ('admin.home');
    }



}
