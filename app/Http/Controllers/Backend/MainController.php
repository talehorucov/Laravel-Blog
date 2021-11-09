<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserLoginRequest;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $user_count = User::count();
        $viewpost_count = Post::sum('view_count');
        $post_count = Post::count();
        $category_count = Category::count();
        $new_users = User::orderByDesc('id')->limit(5)->get();
        $new_posts = Post::with('user')->orderByDesc('id')->limit(15)->get();
        $new_comments = Comment::with('user')->orderByDesc('id')->limit(4)->get();
        $categories = Category::get();
        return view('admin.index', compact('user_count', 'viewpost_count', 'post_count', 'category_count', 'new_users', 'new_posts', 'new_comments', 'categories'));
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
