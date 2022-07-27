<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use GuzzleHttp\Handler\Proxy;

class ProductController extends Controller {

    public function index() {

        return view( 'ecommerce-view-product' );
    }

    public function view() {
        // dd( 'hello' );
        $data = Product::all();
        // return $data;
        return view( 'ecommerce-view-product', [ 'product' =>  $data ] );
    }

    public function store( StoreProductRequest $request ) {
        // dd( $request );

        $product = Product::create( $request->validated() );

        // return $product;
        return back()->with( 'success', 'Product Added Successful' );
        // return  view( 'ecommerce-product-detail' );
    }

    public function show( Product $product ) {
        return new ProductResource( $product );

    }

    public function edit( Product $product ) {
        //
    }

    public function update( UpdateProductRequest $request, Product $product ) {
        $product->update( $request->validated() );
    }

    public function destroy( Product $product ) {
        $product->delete();

        // return response()->noContent();
    }
}
