<?php

namespace App\Composer;


use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;

class ViewComposer{

    public function compose(View $view){
        $categories = Category::all();

        $posts = Post::latest()->take(4)->get();

        $view->with(['categories'=>$categories,
                     'posts'=>$posts,
        ]);
    }
}
