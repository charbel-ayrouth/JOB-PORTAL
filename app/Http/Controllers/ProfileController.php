<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());
        dd($user);
        // $location = Locations::find($location_id)->first();
        return view('profile.index');
    }
}
