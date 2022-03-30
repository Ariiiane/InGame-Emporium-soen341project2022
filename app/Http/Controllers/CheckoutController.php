<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Cart;
use App\Models\User;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display billing details and order summary
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $userItems = [];
        $userInfo = [];
        $subtotal = 0;
        $tax_rate = 0.15;
        $msg = ["",""];

        if ($request->user()) {
            $userItems = Cart::query()->with('product')->where('user_id', '=', $request->user()->id)->get();
            $userInfo = User::query()->where('id', '=', $request->user()->id)->first();
            
            foreach ($userItems as $item) {
                $subtotal += $item->product->price;
            }
        } else {
            $msg = ["I do not know how you got here, but you have to be logged in to checkout!", "disabled"];
            $totals = ["XX.XX", "xx.xx", "XX.XX"];
            return view('checkout',['message'=>$msg, 'totals'=>$totals, 'items'=>$userItems, 'info'=>$userInfo]);
        }

        $tax = $subtotal*$tax_rate;
        $total = $subtotal + $tax;
        $totals = [$subtotal, $tax, $total];
        return view('checkout',['message'=>$msg, 'totals'=>$totals, 'items'=>$userItems, 'info'=>$userInfo]);
    }
}
