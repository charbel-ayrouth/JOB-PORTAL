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
    
public function createApplication(Request $request){

    $js=new JobSeeker;

    //$js->CV=$request->input('cv');

    
    $js->degree=$request->input('degree');
    $js->field=$request->input('field');
    $js->experience=$request->input('experience');
    $js->skills=$request->input('skills');
    if ($request->hasfile('cv')) {
        $file = $request->file('cv');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('uploads/cv/', $filename);
        $js->cv = $filename;
    }
    $user=new User;
    $user->name=$request->input('fname')+" "+$request->input('lname');
    $user->email=$request->input('email');
    //$user->path=$request->input('');
    if ($request->hasfile('path')) {
        $file = $request->file('path');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('uploads/profilepic/', $filename);
        $js->path = $filename;
    }

    $location=new Locations;
    $location->country=$request->input('country');
    $location->city=$request->input('city');
    $location->zipCode=$request->input('zipCode');
    $location->Address=$request->input('Address');

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
        $l=Locations::all();
        $u=User::all();

        $job=DB::select('select name, JobTitle, Country, city, zipCode from jobs, locations, users, job_providers where 
        users.id=job_providers.id and job_providers.id=jobs.Jobprovider_id and locations.id=jobs.location_id;');
        return view('Jobseeker.Homepage', compact('job'));
    }

}

