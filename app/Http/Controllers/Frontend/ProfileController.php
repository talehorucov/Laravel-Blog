<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile.index');
    }

    public function edit()
    {
        return view('user.profile.edit');
    }

    public function update(Request $request, User $user)
    {
        if ($request->image) {
            $image = $request->file('image');
            $image_name = $request->name . '-' . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/users/' . $image_name);
            $image_url = 'upload/users/' . $image_name;
            if ($user->image) {
                unlink($user->image);
            }
            $user->image = $image_url;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->about = $request->about;
        $user->save();
        $notification = [
            'message' => 'Məlumatlarınız redaktə edildi',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.profile.index')->with($notification);
    }
}
