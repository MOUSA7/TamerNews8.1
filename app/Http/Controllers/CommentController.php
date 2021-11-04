<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::orderBy('created_at','desc')->paginate(5);
        return view('admin.comments.index',compact('comments'));
    }


    public function create()
    {

    }

    public function store(Post $post,CommentRequest $request)
    {

        $data = $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id
        ]);
        dd($data);

        return response()->json([
            'data'=>$data,
            'status'=>200,
            'msg'=>'Created Successfully'
        ]);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        dd($comment->user->name?:'Dataa');
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        dd('done');
    }


    public function destroy($id)
    {
        //
    }
}
