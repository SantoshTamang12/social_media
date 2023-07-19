<?php

namespace App\Http\Controllers;

use App\Actions\Jetstream\CreateTeam;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Createpost;

class CommentController extends Controller
{
    public function index(){

    }

    public function comment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->id;
        $comment->comment = $request->comment;
        $comment->save();

        // return redirect()->route('getallcomment', $request->id);
        return redirect()->route('home');

        // next method
        // $comment1 = new Comment([
        //     'user_id' => auth()->user()->id,
        //     'post_id' => $request->id,
        //     'comment' => $request->comment,
        // ]);

        // $comment1->save();

        // other method
        // $data = $request->all();
        // $data['post_id'] = $request->id;
        // $comment3 = new Comment($data);
        // $comment3->save();
    }

    public function getallcomment(Request $request, $id)
    {
        $comments = Comment::where('post_id', $id)->get();

        return view('viewallcomment', compact('comments'));
        // return view('viewcomment')->with('data', $data);

    }
}
