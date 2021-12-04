<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        dd($request);
        if (auth()->attempt($request->only('email', 'password'))) {
            $user = User::find(auth()->id())->first();
            dd($user);
        };
    }
}
