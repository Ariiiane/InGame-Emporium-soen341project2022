<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller {

   public function dbReadSample() {
      $products = DB::select('select * from products');
      return view('dbReadSample',['products'=>$products]);
   }

}