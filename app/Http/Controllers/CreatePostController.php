<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Createpost;


class CreatePostController extends Controller
{
    public function createpost(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image',
        ]);

        $createpost = new createpost;
        $createpost->user_id = auth()->user()->id;
        $createpost->message = $request->message;
        if (!empty($request->image)) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('postimage/'), $filename);
            $data['image'] = 'public/postimage/' . $filename;
            $createpost->image = $filename;
        }
        $createpost->save();
        // dd($createpost);
        return redirect()->route('home')->with('message', 'Post upload Successfully..');
    }


    public function showpost()
    {
        // $userdata = Auth::user()->id;
        // $users= Createpost::where('user_id','=', $userdata)
        // ->get();
        $users = Auth::user()->posts;

        return view('viewmypost', compact('users'));
        // dd($users);
    }

    public function updatepost($id)
    {
        $value = Createpost::find($id);
        // dd($value);
        return view('editpost', compact('value'));
    }

    public function editpost(Request $request, $id)
    {
        $data = Createpost::find($id);
        $data->message = $request->message;
        $data->image = $request->image;
        if (!empty($request->image)) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('postimage/'), $filename);
            $data['image'] = 'public/postimage/' . $filename;
            $data->image = $filename;
        }
        $data->update();
        return redirect('viewmypost')->with('message', ' Post updated Successfully..');
        // return redirect()->route('viewprofile',[$id])->with('message','Post updated Successfully..');

    }

    public function deletepost($id)
    {
        $deletepost = Createpost::find($id);
        $deletepost->delete();
        return redirect('viewmypost')->with('message', '  Deleted Successfully');
    }
}
