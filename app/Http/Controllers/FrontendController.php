<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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



    public function contact(){
//        dd('asd');
        return view('frontend.contact');
    }
    //
}
