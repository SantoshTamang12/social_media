<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function liked(Request $request)
    {
        $postId = $request->post_id;
        $like = Like::where(['post_id' => $postId, 'user_id' => auth()->user()->id])->first();
        if($like)
        {
            $like->delete();
        } else {
        $newLike = new Like([
            'post_id' => $postId,
            'user_id' => auth()->user()->id
        ]);
        $newLike->save();
        }

        return redirect()->route('home');
    }
}
