<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Admin\UserEditRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserEditRequest $request, User $user)
    {
        if ($request->image) {
            $image = $request->file('image');
            $image_name = $request->name . '-' . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/users/' . $image_name);
            $image_url = '/upload/users/' . $image_name;
            if ($user->image) {
                File::delete($user->image);
            }
            $user->image = $image_url;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->about = $request->about;
        $user->save();

        $notification = [
            'message' => 'İstifadəçi məlumatları redaktə edildi',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.users.index')->with($notification);
    }

    public function destroy(User $user)
    {
        $user->delete();
        $notification = array(
            'message' => 'İstifadəçi uğurla silindi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.users.index')->with($notification);
    }
}
