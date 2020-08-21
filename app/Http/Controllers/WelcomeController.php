<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class WelcomeController extends Controller
{
    public function index(){

        //---------manual method for implementing search functionality--------
        // $search = request()->query('search');
        // if($search){
        //     $posts = Post::where('title','LIKE',"%{$search}%")->simplePaginate(4);
        // }
        // else{
        //     $posts= Post::simplePaginate(4);
        // }
        return view('welcome')
        ->with('posts',Post::searched()->simplePaginate(4))
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }
}
