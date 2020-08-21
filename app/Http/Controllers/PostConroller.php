<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\post_req\PostStore;
use App\Http\Requests\post_req\UpdatePost;
use Illuminate\Support\Facades\Storage;
// use App\Http\Middleware\CategoriesCount;

use App\Category;
use App\Tag;

class PostConroller extends Controller
{


    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category :: all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStore $request)
    {

     

        $image = $request->image->store('posts');
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->mycontent;
        $post->published_at = $request->published_at;
        $post->image = $image;
        $post->category_id = $request->categories;
        $post->user_id = auth()->user()->id;


        $post->save();
        if($request->tags){
            $post->tags()->attach($request->tags);
        }

      

        session()->flash('success','Post Addedd Successfullt');
        return redirect(route('post.index'));



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
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Post $post)
    {
       
    //    $data = $request->only(['title','description','mycontent','published_at','categories']);


    //    if($request->hasFile('image')){
    //     $image1 = $request->image->store('posts');
    //     Storage::delete($post->image);
    //     $data['image']=$image1;
    //    }
    //    $post->update($data);

        if($request->hasFile('image')){
            $image1 = $request->image->store('posts');
            Storage::delete($post->image);
            $post->title = $request->title;
            $post->description = $request->description;
            $post->content = $request->mycontent;
            $post->published_at = $request->published_at;
            $post->image=$image1;
            $post->category_id = $request->categories;

            if($request->tags){
                $post->tags()->sync($request->tags);
            }

            $post->save();
           
           
        }
      
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->mycontent;
        $post->published_at = $request->published_at;
        $post->category_id = $request->categories;

        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        $post->save();
      

        session()->flash('success','Post Updated Successfully');
        return redirect(route('post.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        if($post->trashed())
        {
            $post->forceDelete();
            Storage::delete($post->image);
        }
        else{
            $post->delete();
        }
        

        session()->flash('success','Post Deleted Successfully');
        return redirect(route('post.index'));


    }

    public function trashed()
    {
        $trashed= Post::onlyTrashed()->get();

        return view('posts.index')->with('posts',$trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();
       
        session()->flash('success','Post Restored Successfully');
        return redirect(route('post.index'));
    }
}
