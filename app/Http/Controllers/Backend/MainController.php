<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserLoginRequest;

class MainController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.index');
    }

    public function loginForm()
    {
        if (auth()->user() and auth()->user()->role_id != null) {
            return redirect()->route('admin.index');
        }
        return view('admin.auth.login');
    }

    public function login(UserLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user and $user->role_id != null) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $notification = [
                    'message' => 'Xoş Gəlmisiniz ' . auth()->user()->name,
                    'alert-type' => 'success'
                ];
                return redirect()->route('admin.index')->with($notification);
            }
            return redirect()->back()->with('error', 'Email və ya Şifrə yanlışdır');
        }
        return redirect()->back()->with('error', 'Email və ya Şifrə yanlışdır');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
