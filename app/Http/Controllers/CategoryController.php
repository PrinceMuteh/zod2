<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("category-view");
    }
    public function addcategory()
    {
        return view("category");
    }
    public function viewcategory()
    {
        $category = Category::all();
        // dd($category);
    return view("category-view",['category' => $category]);
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
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreCategoryRequest $request)
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => ['required', 'string'],
            'category_description' => ['required', 'string'],
        ]);

        // dd(Auth()->user()->id);
        // $request->request->add(['user_id' => Auth()->user()->id]);
        // dd($request->all());
        $flight = Category::create([
            'name' => 'London to Paris',
            'user_id' => Auth()->user()->id,
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ]);

        // $product = Category::create(array_merge( $request->validated() , ['user_id' => Auth()->user()->id]));
        return back()->with("success", "successful");
        // return  view( 'category-view', ['category' => $category] )->with("success", "Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
