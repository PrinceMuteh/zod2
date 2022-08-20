<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Category;
use GuzzleHttp\Handler\Proxy;
use Carbon\Carbon;
use Nette\Utils\Image;
// use Image;

class ProductController extends Controller {
    // public $curentTime = Carbon::parse( now() )->timezone( 'Africa/Lagos' )->toDateTimeString();

    public function index() {
        $category = Category::all();
        return view( 'Ecommerce/addProduct', [ 'category' => $category, 'type' => 'view' ] );
    }

    public function view() {
        if ( Auth()->user()->type == 'Super' ) {
            $data = Product::all();
        } else {
            $data = Product::where( 'vendorId', Auth()->user()->id )->get();
        }
        // dd( $data );
        return view( 'Ecommerce/product-view', [ 'product' =>  $data ] );
    }

    public function singleview( $id ) {
        $category = Category::all();

        $data = Product::find( $id );
        return view( 'Ecommerce/product-single', [ 'category' => $category, 'product' =>  $data, 'type' => 'view' ] );
    }

    public function upload_image() {
        return view( 'upload-image' );
    }

    public function store( StoreProductRequest $request ) {
        $rand = rand( 00000000001, 99999999999 );
        $lo = 'uploads/category/';
        $filename1 = $this->upload( $request, 'image', $lo );
        $filename1 =  url( '' ) . '/uploads/category/' . $filename1;

        $request->request->add( [ 'sku' => $rand, 'pImage' => $filename1 ] );
        $request->request->add( [ 'vendorId' => Auth()->user()->id, 'rate' => '0' ] );
        $request->request->add( [ 'todayDeal' => 'No', 'publish' => 'No', 'bestOfWeek' => 'No', 'popular' => 'No' ] );
        $input = $request->all();
        $input[ 'size' ] = json_encode( $input[ 'size' ] );
        $input[ 'featured' ] = json_encode( $input[ 'featured' ] );
        $input[ 'colors' ] = json_encode( $input[ 'color' ] );
        // dd( $input );
        $product = Product::create( $input );
        if ( $product ) {
            return view( 'Ecommerce/addProduct', [ 'success' => 'Product Added Successful', 'type' => 'image', 'sku' => $rand, 'id' => $product->id ] );
        } else {
            return back()->with( 'Emessage', 'An Error Occured' );
        }
    }

    public function productUpdate( Request $request ) {
        $rand = rand( 00000000001, 99999999999 );
        if ( $request->file( 'image' ) ) {
            $lo = 'uploads/category/';
            $filename1 = $this->upload( $request, 'image', $lo );
            $filename1 =  url( '' ) . '/uploads/category/' . $filename1;
            $request->request->add( [ 'sku' => $rand, 'pImage' => $filename1 ] );
        }
        $request->request->add( [ 'vendorId' => Auth()->user()->id, 'rate' => '0' ] );
        $request->request->add( [ 'todayDeal' => 'No', 'publish' => 'No', 'bestOfWeek' => 'No', 'popular' => 'No' ] );
        $input = $request->all();
        $input[ 'size' ] = json_encode( $input[ 'size' ] );
        $input[ 'featured' ] = json_encode( $input[ 'featured' ] );
        $input[ 'colors' ] = json_encode( $input[ 'color' ] );
        $product =  Product::where( 'id', $request->id ) ->update( $input );
        if ( $product ) {
            return view( 'Ecommerce/addProduct', [ 'success' => 'Product Added Successful', 'type' => 'image', 'sku' => $rand, 'id' => $product->id ] );
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

    public static function upload( Request $request, $file, $location ) {
        $file = $request->file( $file );
        $filename = time() . '_' . $file->getClientOriginalName();
        // File extension
        $extension = $file->getClientOriginalExtension();
        // File upload location
        $locate = $location;
        // Upload file
        $file->move( $location, strtolower( $filename ) );

        // tryin gto convert image to webp
        // $image = Image::make( $file )->encode( 'webp', 90 )->resize( 200, 250 )->save( public_path( $location, strtolower( $filename ). '.webp' ) );
        // File path
        // $filepath = url( $location . $filename );
        return $filename;
    }
}
