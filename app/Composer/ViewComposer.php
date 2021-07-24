<?php

namespace App\Composer;


use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;

class ViewComposer{

    public function compose(View $view){
        $categories = Category::all();
        $political = Post::whereHas('category',function ($query){
            $query->whereName('Political');
        })->limit(3)->latest()->get();

        $local = Post::whereHas('category',function ($query){
            $query->whereName('Local');
        })->limit(3)->latest()->get();

        $sport = Post::whereHas('category',function ($query){
            $query->whereName('Sports');
        })->limit(4)->latest()->get();

        $Inter = Post::whereHas('category',function ($query){
            $query->whereName('International');
        })->limit(3)->latest()->get();

        $view->with(['categories'=>$categories,
                     'political'=>$political,
                     'local'=>$local,
                     'sport'=>$sport,
                     'Inter'=>$Inter
        ]);
    }
}
