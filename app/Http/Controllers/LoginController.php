<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(Request $request){
        dd($request);
       if(auth()->attempt($request->only('email','password')))
       {
           dd('heelo');
            $user = User::find(auth()->id())->first();
            if($user->role_id == 1)
            {
                // return redirect()->route('');
                dd('hi');
            }else if($user->role_id == 2){
                
                // return redirect()->route('');
                dd('hi2');
            }else if($user->role_id == 3){
                
                // return redirect()->route('');
                dd('hi3');
           }else{
               dd('hhh');
                return redirect()->back()->with(session()->flash('alert-danger','Something Went Wrong! Please Try Again!'));
            }
        };
    }
}