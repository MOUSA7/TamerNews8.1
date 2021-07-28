<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Replay;
use Illuminate\Http\Request;

class ReplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Comment $comment ,Request $request)
    {
//        dd('Done Controller');
//        dd($request->all());
//        dd($request->body);

        $replay = $comment->replays()->create([
            'body' => $request->input('body') ? \request()->input('body') : 'body',
            'user_id'=> auth()->user()->id,
            'comment_id'=> $request->comment_id,
            'is_active' => 1
        ]);
        return response()->json([
            'data' => $replay,
            'status'=>true,
            'msg' => 'Created Replies Successfully'
        ]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
