<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\JobProvider;
use App\Models\JobSeeker;
use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
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
            // return 'view for job provider';
            $location_id = User::select('location_id')->where('id', $user->id)->first();
            $location = Locations::find($location_id)->first();
            $jobProvider = JobProvider::where('user_id', $user->id)->first();
            return view('profile.index', [
                'user' => $user,
                'location' => $location,
                'jobProvider' => $jobProvider,
            ]);
        }
    }
    public function edit($id)
    {
        $user = User::find($id);
        $location_id = User::select('location_id')->where('id', $user->id)->first();
        $location = Locations::find($location_id)->first();
        $countries = country::all();
        if ($user->role_id == 2) {
            $jobSeeker = JobSeeker::where('user_id', $user->id)->first();
            // return $jobSeeker;
            // return \view('profile.view');
            return view('profile.edit', [
                'id' => $id,
                'user' => $user,
                'location' => $location,
                'countries' => $countries,
            ]);
        } else {
            $jobProvider = JobProvider::where('user_id', $user->id)->first();
            return view('profile.edit', [
                'user' => $user,
                'location' => $location,
                'countries' => $countries,
            ]);
        }
    }
    public function update(Request $request)
    {
        User::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phonenumber' => $request->phonenumber,
            ]);
        $location_id = User::select('location_id')->where('id', auth()->id())->first();
        Locations::where('id', $location_id)
            ->update([
                'Country' => $request->countrySelected,
                'city' => $request->city,
                'zipCode' => $request->zipCode,
                'Address' => $request->Address,
            ]);
        return redirect()->route('profile');
    }
    public function profile(Request $request)
    {
        $user = User::find(auth()->id());
        $filename = $user->name . 'IMG.' . $request->pp->extension();
        $request->pp->move(public_path('storage/images'), $filename);
        User::find(auth()->id())->update(['path' => $filename]);
    }
}
