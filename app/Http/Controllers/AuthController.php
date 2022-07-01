<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        $formData=request()->validate([
            "name"=>'required|max:100',
            "user_name"=>['required','max:10',Rule::unique('users', 'user_name')],
            "email"=>['required','email',Rule::unique('users', 'email')],
            "password"=>'required|min:8'
        ]);
       

        $user= User::create($formData);
      
        auth()->login($user);

        return redirect('/')->with('success', 'Welcome Dear '. $user->name);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', "Good Bye");
    }

    public function login()
    {
        return view('auth.login');
    }
    public function post_login()
    {
        $formData = request()->validate([
            'email'=>['required','max:255',Rule::exists('users', 'email')],
            'password'=>['required','min:8','max:100']
        ], [
            'email.required'=>'We need your email.',
            'password.min'=> 'Password should be more than 8 chracters'
        ]);

        if (auth()->attempt($formData)) {
            if (auth()->user()->is_admin) {
                return redirect('admin/blogs');
            } else {
                return redirect('/')->with('success', 'Welcome Back');
            }
        } else {
            return redirect()->back()->withErrors([
                'email'=>'User Credentials Wrong',
            ]);
        }
    }
}
