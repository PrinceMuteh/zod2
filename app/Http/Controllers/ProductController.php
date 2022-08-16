<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use GuzzleHttp\Handler\Proxy;
use Carbon\Carbon;

class ProductController extends Controller {
public $curentTime = Carbon::parse(now())->timezone('Africa/Lagos')->toDateTimeString();
    public function index() {
        $category = Category::all();
        return view( 'Ecommerce/addProduct', [ 'category' => $category, 'type' => 'view' ] );
    }

    public function view() {
        $data = Product::all();
        // dd( $data );
        return view( 'Ecommerce/product-view', [ 'product' =>  $data ] );
    }

    public function upload_image() {
        return view( 'upload-image' );
    }

    public function store( StoreProductRequest $request ) {
        $rand = rand( 00000000001, 99999999999 );
        $request->request->add( [ 'sku' => $rand ] );
        // dd( $request->all() );
        $product = Product::create( $request->all() );
        if ( $product ) {
            return view( 'Ecommerce/addProduct', [ 'success' => 'Product Added Successful', 'type' => 'image',"sku" => $rand] );
        } else {
            return back()->with( 'Emessage', 'An Error Occured' );
        }
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
    }
}
