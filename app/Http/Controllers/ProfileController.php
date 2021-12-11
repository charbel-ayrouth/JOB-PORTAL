<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\Job;
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
            $Jobprovider_id = $jobProvider->jid;
            $jobs = Job::where('Jobprovider_id', $Jobprovider_id)->get();
            return view('profile.index', [
                'user' => $user,
                'location' => $location,
                'jobProvider' => $jobProvider,
                'jobs' => $jobs,
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
            return view('profile.edit', [
                'id' => $id,
                'user' => $user,
                'location' => $location,
                'countries' => $countries,
                'jobSeeker' => $jobSeeker,
            ]);
        } else {
            $jobProvider = JobProvider::where('user_id', $user->id)->first();
            return view('profile.edit', [
                'user' => $user,
                'location' => $location,
                'countries' => $countries,
                'jobProvider' => $jobProvider,
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
        $user = User::find($request->id);
        if ($user->role_id == 2) {
            if ($request->file()) {
                $CV = $request->CV;
                $CoverLetter = $request->CoverLetter;
                $CVname = time() . '_' . $CV->extension();
                $CoverLettername = time() . '-' . $CoverLetter->extension();
                $CV->move(public_path('storage/cv'), $CVname);
                $CoverLetter->move(public_path('storage/cl'), $CoverLettername);

                JobSeeker::where('user_id', $request->id)
                    ->update([
                        'degree' => $request->degree,
                        'field' => $request->field,
                        'experience' => $request->experience,
                        'skills' => $request->skills,
                        'bio' => $request->bio,
                        'CV' => $CVname,
                        'CoverLetter' => $CoverLettername,
                    ]);
            } else {
                JobSeeker::where('user_id', $request->id)
                    ->update([
                        'degree' => $request->degree,
                        'field' => $request->field,
                        'experience' => $request->experience,
                        'skills' => $request->skills,
                        'bio' => $request->bio,
                    ]);
            }
        } else {
            JobProvider::where('user_id', $request->id)
                ->update([
                    'CompanyField' => $request->CompanyField,
                    'CompanyTitle' => $request->CompanyTitle,
                    'CompanyDescription' => $request->CompanyDescription,
                ]);
        }
        return redirect()->route('profile', ['id' => $request->id]);
    }

    public function profile(Request $request)
    {
        $img = $request->pp;
        $filename = time() . 'IMG.' . $img->extension();
        $img->move(public_path('storage/images'), $filename);
        User::where('id', auth()->id())
            ->update(['path' => $filename]);
        return redirect()->route('profile', ['id' => $request->id]);
    }

    public function job($id, $jid)
    {
        $user = User::find($id);
        $job = Job::where('id', $jid)->first();
        return view('profile.job_edit', [
            'job' => $job,
            'user' => $user,
        ]);
    }

    public function jobUpdate($id, $jid, Request $request)
    {
        Job::where('id', $jid)
            ->update([
                'JobTitle' => $request->JobTitle,
                'Field' => $request->Field,
                'type' => $request->type,
                'Requirements' => $request->Requirements,
                'Description' => $request->Description,
            ]);
        return redirect()->route('profile', ['id' => $request->id]);
    }
}
