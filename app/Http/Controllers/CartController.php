<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Product $product)
    {
        if ($request->user()) {
            Cart::create([
                'user_id' => $request->user()->id,
                'product_id' => $product->id
            ]);
        }

        return redirect('/browsing/' . $product->department);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $userItems = [];
        $total = 0;

        if ($request->user()) {
            $userItems = Cart::query()->with('product')->where('user_id', '=', $request->user()->id)->get();

            foreach ($userItems as $item) {
                $total += $item->product->price;
            }
        }

        return view('cart', ['cartItems' => $userItems, 'total' => $total]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');
    }
}
