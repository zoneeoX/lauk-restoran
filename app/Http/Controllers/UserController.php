<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $userData = $request->validate([
            "first_name"=> 'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'password'=> 'required|min:5',
        ]);

        $userData['password'] = bcrypt($userData['password']);
        User::create($userData);
    }
}
