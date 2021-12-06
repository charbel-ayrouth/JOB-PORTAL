<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Models\User;
use File;

class JobSeekerController extends Controller
{
    public function index()
    {
        return view('jobSeeker.JobseekerApp');
    }

    public function createApplication(Request $request)
    {
        // $js = new JobSeeker;
        //$js->CV=$request->input('cv');
        // $js->degree = $request->input('degree');
        // $js->field = $request->input('field');
        // $js->experience = $request->input('experience');
        // $js->skills = $request->input('skills');
        // if ($request->hasfile('cv')) {
        //     $file = $request->file('cv');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extention;
        //     $file->move('uploads/cv/', $filename);
        //     $js->cv = $filename;
        // }
        // if ($request->hasfile('path')) {
        //     $file = $request->file('path');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extention;
        //     $file->move('uploads/profilepic/', $filename);
        //     $js->path = $filename;
        // }
        // $js->save();
        $user = User::find(auth()->id());
        // \dd($user);
        $cv = $request->cv;
        $image = $request->path;
        $CVname = $user . '.' . $cv->extension();
        $IMGname = $user . '.' . $image->extension();
        // $extention = $file->getClientOriginalExtension();
        // $filename = time() . '.' . $extention;
        $cv->move(public_path('storage/cv'), $CVname);
        $image->move(public_path('storage/images'), $IMGname);
        // $file->move('uploads/profilepic/', $filename);
        JobSeeker::Create([
            'degree' => $request->input('degree'),
            'field' => $request->input('field'),
            'experience' => $request->input('experience'),
            'skills' => $request->input('skills'),
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
