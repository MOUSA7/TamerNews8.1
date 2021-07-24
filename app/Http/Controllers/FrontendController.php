<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function show($id){
        $post = Post::findOrFail($id);
        return view('frontend.show',compact('post'));
    }

    public function PostsCategory($id){
        $category = Category::findOrFail($id);

        return view('frontend.category_posts',compact('category'));
    }
    //
}
