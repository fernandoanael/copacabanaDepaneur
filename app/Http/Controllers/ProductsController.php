<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product as Product;
use App\Stock as Stock;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.productsIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.productsNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $this->validate($request, [
            'name'  =>  'required|max:100',
            'price' =>  'required|numeric',
            'cost'  =>  'required|numeric',
            'stock' =>  'required|numeric'
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->cost = $request->cost;

        $product->save();

        $product = Product::all()->last();

        $stock = new Stock();

        $stock->product_id = $product->id;
        $stock->quantity = $request->stock;

        $stock->save();

        Session::flash('success', $product->name .' registered!');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product =  Product::where('id',$id)->with('Stock')->get();
        $product = Product::find($id);
        return view('pages.productsSingle',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $stock = $product->stock;
        
        $this->validate($request,[
            'name'  => 'required|max:100',
            'price' => 'required|numeric',
            'cost'  => 'required|numeric',
            'stock' =>  'required|numeric'
        ]);
        
        $product->name  = $request->name;
        $product->price = $request->price;
        $product->cost  = $request->cost;
        $stock->quantity = $request->stock;

        $product->save();
        $stock->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $name = $product->name;

        $stock = $product->stock();

        if($product->delete() && $stock->delete()){
            Session::flash('success', $name . ' and the related stock was deleted');
            return redirect()->route('products.index');
        }else{
            Session::flash('error', 'Something went Wrong, check tinker');
            return redirect()->route('products.index');
        }

        return $errors;

    }
}
