<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());
        if ($user->role_id == 2) {
            $location_id = User::select('location_id')->where('id', $user->id)->first();
            $location = Locations::find($location_id)->first();
            $jobSeeker = JobSeeker::where('user_id', $user->id)->first();
            return view('profile.index', [
                'user' => $user,
                'location' => $location,
                'jobSeeker' => $jobSeeker,
            ]);
        } else {
            return 'view for job provider';
        }
    }
}
