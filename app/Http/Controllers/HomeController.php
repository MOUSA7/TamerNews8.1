<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('frontend.index');
    }

    public function logout(){
         Auth::logout();
        return redirect('/login');
    }
}
