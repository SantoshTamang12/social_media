<?php

namespace App\Http\Controllers;

use App\Models\Updateuser;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{


    public function profile($id)
    {
        $value = User::where('id', $id)->first();
        // dd($value);
        return view('viewprofile', compact('value'));
    }

    public function update($id)
    {
        $value = User::findOrFail($id);
        // dd($value);
        return view('updateprofile');

    }
    public function editprofile(Request $request, $id)
    {
        // dd($request->all());
        $data=User::find($id);
        $data->name=$request->name;
        $data->number=$request->number;
        $data->bio=$request->bio;
        $data->link=$request->link;
        $data->image=$request->image;
        if (!empty($request->image)) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('profile/'), $filename);
            $data['image'] = 'public/profile/' . $filename;
            $data->image = $filename;
        }
        $data->update();
        // return redirect()->back()->with('message',' Profile updated Successfully..');
        return redirect()->route('profile', $id)->with('message','Profile Updated Successfully..');
        // dd($data);

    }
}
