<?php

namespace App\Http\Controllers;

use App\Models\country;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request){
        $countries = country::all();
        return view('Auth.LoginScreen')->with('countries',$countries)->with('roleId',$request->roleId);
    }
}
