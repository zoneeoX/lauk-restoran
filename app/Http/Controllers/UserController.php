<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $userData = $request->validate([
            "first_name"=> 'required',
            'last_name'=> 'required',
            'email'=> ['required', 'email', Rule::unique('users', 'email')],
            'password'=> 'required|min:5',
        ]);

        $userData['password'] = bcrypt($userData['password']);
        $user = User::create($userData);
        
        Auth::login($user, true);

        return redirect('/');
    }

    public function login(Request $request){
        $userData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($userData)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors(['email'=> 'error emailnya salah.'])->onlyInput('email');


    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
