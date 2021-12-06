<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Models\User;


class JobSeekerController extends Controller
{
    public function index()
    {
        return view('jobSeeker.JobseekerApp');
    }

    public function createApplication(Request $request)
    {
        $request->validate([
            'cv' => 'required',
            'path' => 'required',
        ]);
        $user = User::find(auth()->id());
        // \dd($user);
        $cv = $request->cv;
        $image = $request->path;

        $CVname = $user->name . 'CV.' . $cv->extension();
        $IMGname = $user->name . 'IMG.' . $image->extension();

        $cv->move(public_path('storage/cv'), $CVname);
        $image->move(public_path('storage/images'), $IMGname);

        JobSeeker::Create([
            'degree' => $request->degree,
            'Field' => $request->field,
            'experience' => $request->experience,
            'skills' => $request->skills,
            'CV' => $CVname,
            'CoverLetter' => 'need to add it to the form',
            'user_id' => auth()->id(),
        ]);
        User::where('id', \auth()->user())->update([
            'path' => $IMGname
        ]);
        dd('you app has been filled');
    }
}
