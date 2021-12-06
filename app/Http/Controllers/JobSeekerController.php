<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\JobProvider;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use App\Models\Job;
use phpDocumentor\Reflection\Location;

class JobSeekerController extends Controller
{
    public function index()
    {
        return view('jobSeeker.JobseekerApp');
    }

//------------------------------------Home page Search----------------------------------------
public function searchjob(Request $request)
    {
        
        $s =$request->search;
        
        $j=Job::query()
            ->where('JobTitle', 'like', "%{$s}%")
            ->orWhere('Field', 'like', "%{$s}%")
            ->orWhere('Description', 'like', "%{$s}%")
            ->orWhere('Requirements', 'like', "%{$s}%")
            ->get();
        
        $l=Locations::query()
        ->where('Country', 'like', "%{$s}%")
        ->orWhere('City', 'like', "%{$s}%")
        ->orWhere('ZipCode', 'like', "%{$s}%")
        ->get();
        return view('Jobseeker.search', compact('j','l'));
    }

    public function display(){

        $j=Job::all();
        $user = User::find(auth()->id());
        $user_location = Locations::find($user->location_id);
        $job_seeker = JobSeeker::where('user_id',auth()->id())->get()->first();

        $Jobs=[];
        foreach ($j as $key => $value) {
            $JobLocation = Locations::where('id',$value->location_id)->get()->first();
            if($user_location->Country == $JobLocation->Country && $job_seeker->Field == $value->Field)
            {
                array_push($Jobs,$j);
            }    
        }
        return view('Jobseeker.Homepage')->with('Jobs',$Jobs);
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

