<?php

namespace App\Http\Controllers;

use App\Events\SendProductUpdated;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        return response()->json($products, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create([
            'name'       => $request['name'],
            'value'      => $request['value'],
            'quantity'   => $request['quantity'],
            'buy_value'  => $request['buyValue'],
            'percentage' => $request['percentage'],
            'sell_value' => $request['sellValue'],
            'code'       => $request['code']
        ]);

        return response()->json([
            'message' => "Salvo com sucesso",
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->value = $request->value;
        $product->quantity = $request->quantity;
        $product->buy_value = $request->buyValue;
        $product->percentage = $request->percentage;
        $product->sell_value = $request->sellValue;
        $product->save();
        event(new SendProductUpdated($product));
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::find($product->id)->delete();
        return response()->json([
            'message' => 'Deletado com sucesso',
            'success' => true
        ], 200);
    }

    public function randomCode()
    {
        $sixDigitCode = rand(100000, 999999);
        return $sixDigitCode;
    }

    public function sumOfValues()
    {
        $totalBuy = Product::sum('buy_value');
        $totalQuantity = Product::sum('quantity');

        return response()->json([
            'totalBuy' => $totalBuy,
            'totalQuantity' => $totalQuantity
        ]);
    }

    public function paginate(Request $request)
    {
        $products = Product::orderBy('id', 'DESC')->paginate($request->perPage);
        Log::debug($request);
        return $products;
    }
}
