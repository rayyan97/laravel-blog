<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class SingleBlogController extends Controller
{
  public function index(Post $post){
    return view('single-post')->with('post',$post);
  }

  public function category(Category $category){
    return view('category')
    ->with('category',$category)
    ->with('posts',$category->posts()->searched()->simplePaginate(4))
    ->with('categories',Category::all())
    ->with('tags',Tag::all());
  }

  public function tag(Tag $tag){
    return view('tag')
    ->with('tag',$tag)
    ->with('posts',$tag->posts()->searched()->simplePaginate(4))
    ->with('categories',Category::all())
    ->with('tags',Tag::all());
  }

}
