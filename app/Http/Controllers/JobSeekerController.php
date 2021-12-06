<?php

namespace App\Http\Controllers;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use App\Models\Job;


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
        User::where('id', auth()->id())->update([
            'path' => $IMGname
        ]);
        dd('you app has been filled');
    }
}

