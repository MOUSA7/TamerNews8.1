<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('dashboard');
    }

    public function dashboard(){
        return view('admin.index');
    }

    public function index()
    {
        return view('home');
    }

    public function home()
    {
//        $posts = Post::latest()->take(4)->get();
//        dd($posts);
        return view('frontend.index');
    }

    public function language($lang){
        $current = App::getLocale();
        $new = $current == 'ar'?'en':'ar';
        \session()->put('user_lang',$new);

        return redirect()->back();
    }

    public function logout(){
         Auth::logout();
        return redirect('/login');
    }


}
