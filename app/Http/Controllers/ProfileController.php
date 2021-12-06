<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());
        $location_id = User::select('location_id')->where('id', $user->id)->first();
        $location = Locations::find($location_id)->first();
        return view('profile.index', [
            'user' => $user,
            'location' => $location,
        ]);
    }
}
