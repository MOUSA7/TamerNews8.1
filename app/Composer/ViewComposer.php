<?php

namespace App\Composer;


use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\View\View;

class ViewComposer{

    public function compose(View $view){
//        dd('Done');
        $categories = Category::all();
        $posts = Post::where('slider',1)->take(4)->where('deleted_at',null)->get();
        $settings = Setting::first();

        $view->with(['categories'=>$categories,
                     'posts'=>$posts,
                   'settings'=>$settings,
        ]);
    }
}
