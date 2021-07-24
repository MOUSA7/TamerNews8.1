<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $cat = new Category();
        $cat->name = $request->name;
        $cat->save();
        return view('admin.categories.bodyCategories',['categories'=>Category::all()]);

        //
    }


    public function show($id)
    {
        dd('SHOW');
    }

    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        return view('admin.categories.edit',['cat'=>$cat]);
    }


    public function update(Request $request, $id)
    {
        $cat = Category::findOrFail($id);
        $cat->name = $request->name;
        $cat->save();
        return view('admin.categories.bodyCategories',['categories'=>Category::all()]);

    }

    public function destroy($id)
    {
        Category::destroy($id);
        return view('admin.categories.bodyCategories',['categories'=>Category::all()]);
    }

    public function search(){
        $search = \request()->get('q');
        $categories = Category::where('name','like','%'.$search.'%')->get();
        if ($categories->count()){
            return view('admin.categories.index')->with(['categories'=>$categories]);
        }else{
            return redirect()->route('admin.categories.index')->with(['status'=>'البحث خاطئ يرجى المحاولة فيما بعد !']);
        }
    }
}
