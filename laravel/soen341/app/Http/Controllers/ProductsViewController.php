<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsViewController extends Controller {
   public function dbsample() {
      $products = DB::select('select * from products');
      return view('dbsample',['products'=>$products]);
   }
}