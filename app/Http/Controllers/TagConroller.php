<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\tag_req\TagStoreVal;
use App\Http\Requests\tag_req\TagUpdate;

use App\Tag;

class TagConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags',Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreVal $request)
    {
        $Tag = new Tag();
        $Tag->name = $request->name;
        $Tag->save();

        session()->flash('success','Tag Added Successfully');
        return redirect("tag");
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
        return view('tags.create')->with('tags',Tag::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdate $request, $id)
    {
        $Tag = Tag::find($id);
        $Tag->name = $request->name;
        $Tag->save();
        session()->flash('success','Tag Updated Successfully');
        return redirect('tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Tag = Tag::find($id);
        if($Tag->posts->count() > 0){
            session()->flash('error','Tag cannot be Deleted, Because it has some posts associated');
            return redirect('tag');
        }
        else{
            $Tag->delete();
            session()->flash('success','Tag Deleted Successfully');
            return redirect('tag');
        }
       
    }
}
