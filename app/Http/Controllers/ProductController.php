<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Product;
use App\Models\Ad;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();

        return view('sample.products.index',['products'=>$products]);
    }

    public function get_products()
    {
        //
        $products = Product::all();

        return view('products.image',['products'=>$products]);
    }

    /**
     * Displays products belonging to a given department.
     */
    public function get_products_by_department(String $department)
    {
        $Ad = Ad::inRandomOrder()->first();
        if ($department == "All") 
        {
            $products = Product::inRandomOrder()->get();
        }
        else
        {
            $products = Product::where('department', $department)->get();
        }

        return view('products.image',['products'=>$products, 'department'=>$department, 'ad'=>$Ad]);

    }

    public function get_products_by_id(String $id) 
    {
        $Ad = Ad::inRandomOrder()->first();

        $product = Product::where('product_id', $id)->first();

        return view('products.item',['product'=>$product, 'ad'=>$Ad]);
    }

    public function get_products_for_dropwdown() 
    {
        $products = Product::all();

        return view('UploadAds',['products'=>$products]);
    }

    public function get_products_by_id(String $id)
    {
        $product = Product::where('product_id', $id)->first();

        return view('products.item',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sample.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'department' => 'required',
            'manufacturer' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'format' => 'required',
            'inventory' => 'required',
            'image_path' => 'required'
        ]);

        Product::create([
            'id' => rand(0,99),
            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description,
            'department' => $request->department,
            'manufacturer' => $request->manufacturer,
            'price' => $request->price,
            'unit' => $request->unit,
            'format' => $request->format,
            'inventory' => $request->inventory,
            'image_path' => $request->image_path,
        ]);

        return redirect()->route('seller')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('sample.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('sample.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'department' => 'required',
            'manufacturer' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'format' => 'required',
            'inventory' => 'required',
            'image_path' => 'required'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    }
}
