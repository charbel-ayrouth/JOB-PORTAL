<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use phpDocumentor\Reflection\Location;

class JobSeekerController extends Controller
{
    public function index()
    {
        return view('jobSeeker.JobseekerApp');
    }

    public function createApplication(Request $request)
    {

        $js = new JobSeeker;

        //$js->CV=$request->input('cv');

        $js->degree = $request->input('degree');
        $js->field = $request->input('field');
        $js->experience = $request->input('experience');
        $js->skills = $request->input('skills');
        if ($request->hasfile('cv')) {
            $file = $request->file('cv');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/cv/', $filename);
            $js->cv = $filename;
        }
        if ($request->hasfile('path')) {
            $file = $request->file('path');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/profilepic/', $filename);
            $js->path = $filename;
        }
        $js->save();
        \dd('you app has been filled');
    }
}
