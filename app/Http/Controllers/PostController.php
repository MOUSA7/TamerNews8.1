<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

//    public function __construct()
//    {
//        $this->authorizeResource(Post::class, 'posts');
//    }

    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(8);

        return view('admin.posts.index',compact('posts'));
        //
    }


    public function create()
    {
        $categories = Category::all();
//        $this->authorize('create');
        return view('admin.posts.create',compact('categories'));
        //
    }


    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        $inputs['status'] = 0;
        $post = Post::create($inputs);
        if ($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $path = $file->move('images',$name);
            $photo =$post->photo()->save(
                Photo::make(['path'=>'images/'.$name])
            );
            $post->photo_id = $photo->id;
            $post->update(['photo_id'=>$post->photo_id]);
        }
        return redirect('admin/posts');
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show',compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
//        $this->authorize('update',$post);
        $categories = Category::all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update([
           'title'=>\request()->title,
           'content'=>\request()->input('content'),
            'category_id'=>\request()->category_id

        ]);
        if ($request->hasFile('photo_id')){
            $file = $request->file('photo_id');
            $name = time().$file->getClientOriginalName();
            $path = $file->move('images',$name);

            if ($post->photo){
                unlink(public_path().$post->photo->file);
                $post->photo->path=$path ;
                $post->photo->save();
            }else{
               $post->photo()->save(Photo::make(['path'=>'images/'.$name]));
            }

        }
        $post->save();
        return redirect('admin/posts');

    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('delete',$post);
        unlink(public_path().$post->photo->file);
        $post->delete();
        return redirect()->back();
        //
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash',compact('posts'));
    }

    public function search(){
        $start = \request()->start;
        $end   = \request()->end;
//        dd($end);
        $posts = Post::onlyTrashed()->whereBetween('created_at',[$start,$end])->get();

        if ($posts->count()) {
            return view('admin.posts.trash')->with(['posts' => $posts]);
        }else{
            return redirect()->route('admin.posts.trash')->with(['status'=>'Not Found Any Result To Display this Page']);
        }
    }

    public function approve($id){
        Post::findOrFail($id)->update(['status'=>1]);
        return redirect()->back();
    }

    public function draft($id){
        Post::findOrFail($id)->update(['status'=>0]);
        return redirect()->back();
    }

    public function control(){
        $posts = Post::orderBy('created_at','desc')->paginate(8);
        return view('admin.posts.control',compact('posts'));
    }

}
