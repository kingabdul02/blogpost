<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

/**
 *
 */
class AdminController extends Controller
{
    public function getIndex()
    {
      $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
      return view('admin.index', ['posts' => $posts]);
    }

    public function getLogin()
    {
      return view('admin.login');
    }

    public function postLogin(Request $request)
     {
       $this->validate($request, [
         'email' => 'required',
         'password' => 'required'
       ]);

       if (!auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
         return redirect()->back()->with(['fail' => 'Could not log you in!']);
       }
         return redirect()->route('admin.index');
     }

    public function getLogout()
    {
      Auth::logout();
      return redirect()->route('blog.index');
    }
}
