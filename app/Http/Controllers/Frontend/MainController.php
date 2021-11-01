<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ForgotPasswordRequest;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserLoginRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Notifications\ForgotPasswordNotification;

class MainController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user','post.category')->take(4)->orderByDesc('id')->get();
        $posts = Post::with('category')->get();
        $random_posts = Post::inRandomOrder()->limit(4)->get();
        $mostview_posts = Post::with('category')->orderByDesc('view_count')->limit(6)->get();
        $categories = Category::get();
        return view('user.index',compact('comments','random_posts','posts','mostview_posts','categories'));
    }

    public function loginForm()
    {
        return view('user.auth.login');
    }

    public function login(UserLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $notification = [
                'message' => 'Xoş Gəlmisiniz ' . auth()->user()->name,
                'alert-type' => 'success'
            ];
            return redirect()->route('user.index')->with($notification);
        }
        return redirect()->back()->with('error', 'Email və ya Şifrə yanlışdır');
    }

    public function forgot_passwordForm()
    {
        return view('user.auth.forgot_password');
    }

    public function forgot_password(ForgotPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->notify(new ForgotPasswordNotification($user));
            return redirect()->back()->with('success', 'Şifrənizi dəyişmək üçün link email ünvanınıza göndərildi');
        }
        return redirect()->back()->with('error', 'Email ünvanı tapılmadı');
    }

    public function change_password(Request $request)
    {
        return $request;
        return view('user.auth.forgot_password_change', compact('user'));
    }

    public function registerForm()
    {
        return view('user.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $exists_user = User::where('email', $request->email)->first();
        if (!$exists_user) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $notification = [
                'message' => 'Xoş Gəlmisiniz',
                'alert-type' => 'success'
            ];
            return redirect()->route('user.index')->with($notification);
        }
        return redirect()->back()->with('email', 'Bu email sistemdə mövcuddur.');
    }
}
