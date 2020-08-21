<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\cat_req\CategoryStoreVal;
use App\Http\Requests\cat_req\CategoryUpdate;

use App\Category;
use App\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreVal $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        session()->flash('success','Category Added Successfully');
        return redirect("category");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('categories.categories')->with('category',Category::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        session()->flash('success','Category Updated Successfully');
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $category = Category::find($id);
        if($category->posts->count() > 0){
            session()->flash('error','Category cannot be Deleted, Because it has some posts');
            return redirect('category');
        }
        $category->delete();
        session()->flash('success','Category Deleted Successfully');
        return redirect('category');
    }
}
