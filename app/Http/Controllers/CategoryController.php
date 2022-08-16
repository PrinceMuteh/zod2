<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        return view( 'Ecommerce/category-view' );
    }

    public function addcategory() {
        $icons = DB::table( 'icons' )->get();
        return view( 'Ecommerce/category', [ 'type' => 'view', 'icons' => $icons ] );
    }

    public function viewcategory() {
        $category = Category::all();
        // dd( $category );
        return view( 'Ecommerce/category-view', [ 'category' => $category ] );
    }

    public function addsub () {
        $category = Category::all();

        // $sub = DB::table( 'categories' )
        // ->select( 'categories.category_name', 'categories.id' )
        // ->get();
        return view( 'Ecommerce/sub-add', [ 'category' => $category ] );
    }

    public function viewsub  () {
        $sub = DB::table( 'sub_categories' )
        ->join( 'users', 'users.id', '=', 'sub_categories.users_id' )
        ->join( 'categories', 'categories.id', '=', 'sub_categories.category_id' )
        ->select( 'sub_categories.*', 'users.name', 'users.email', 'categories.*' )
        ->get();
        // dd( $sub );

        return view( 'Ecommerce/sub-view', [ 'sub' => $sub ] );
    }

    public function store( Request $request ) {
        // dd( $request->all() );
        $request->validate( [
            'category' => [ 'required', 'string' ],
            'categoryDescription' => [ 'required', 'string' ],
        ] );

        $lo = 'uploads/category/';
        $filename1 = $this->upload( $request, 'image', $lo );
        $filename1 =  url( '' ) . '/uploads/category/' . $filename1;

        $category = Category::create([
            'vendorId' => Auth()->user()->id,
            'category' => $request->category,
            'icon' => $request->icon,
            'categoryImage' => $filename1,
            'categoryDescription' => $request->categoryDescription,
        ]);
        return back()->with( 'success', 'Category added successful' );
        // return view( 'Ecommerce/category', [ 'success' => 'Category Added Successful', 'type' => 'image', 'id' => $category->id ] );
    }

    public function storesub( Request $request ) {
        // dd( $request->all() );
        $request->validate( [
            'sub_name' => [ 'required', 'string' ],
            'description' => [ 'required', 'string' ],
        ] );
        $sql = DB::table( 'sub_categories' )->insert( [
            'users_id' => Auth()->user()->id,
            'category_id' => $request->category,
            'sub_name' => $request->sub_name,
            'sub_description' =>  $request->description,
            'created_at' => now()
        ] );
        $category = Category::all();

        return view( 'Ecommerce/sub-add', [ 'category' => $category, 'success' => 'sub category Added Succefully' ] );

        // return view( 'category', [ 'success' => 'Category Added Successful', 'type' => 'image' ] );
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
        // File path
        $filepath = url( $location . $filename );
        return $filename;
    }
}
