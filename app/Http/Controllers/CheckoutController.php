<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Sale;

use Carbon\Carbon;

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
        $taxRate = 0.15;
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

        $tax = $subtotal*$taxRate;
        $total = $subtotal + $tax;
        $totals = [$subtotal, $tax, $total];
        return view('checkout',['message'=>$msg, 'totals'=>$totals, 'items'=>$userItems, 'info'=>$userInfo]);

    }


    public function success(Request $request)
    {
        // Upload order info to orders table
        $now = Carbon::now();
        $nowReadable = $now->toDateTimeString();
        $now = $now->format('YmdHis');

        $delivery = $request->post();

        $orderId = $request->user()->id.$now;
        $deliveryAddress = $delivery['address'].','.$delivery['province'].','.$delivery['postal_code'];

        if ($request->user()) {
            Order::create([
                'order_id' => $orderId,
                'customer_id' => $request->user()->id,
                'order_date' => $now,
                'delivery_date' => "",
                'delivery_address' => $deliveryAddress,
                'shipping_speed' => "standard",
                'billing_address' => "Just check customer_id to find their billing address :^)",
                'total' => $delivery['total'],

                'payment_card_number' => $request->card_number,
                'payment_card_expiry' => $request->card_expiry,
                'payment_card_cvv' => $request->card_cvv,
                'payment_card_name' => $request->card_full_name,
            ]);
        }

        // Upload sales info to sales table (items)
        $userItems = Cart::query()->with('product')->where('user_id', '=', $request->user()->id)->get();
        foreach ($userItems as $item) {
            Sale::create([
                'product_id' => $item->product->product_id,
                'order_id' => $orderId,
                'format' => "un",
                'quantity' => 1,
            ]);
        }

        // Empty cart
        Cart::where('user_id',$request->user()->id)->delete();


        // Not decrementing stock, because that would be up to our warehouse to manage that.
        $orderInfo = [$orderId, $deliveryAddress, $nowReadable];

        return view('order_confirmation', ['orderInfo'=>$orderInfo]);
    }
}
