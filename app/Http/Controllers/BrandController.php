<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller {
    public function viewbrand() {
        $brand = Brand::all();
        return view( 'brand-view', [ 'brand' => $brand ] );
    }

    public function addbrand() {
        $brand = Brand::all();
        // $category = Category::all();
        // return view( 'category', ['type' => 'view']);
        return view( 'brand', [ 'type' => "view"] );
    }
}
