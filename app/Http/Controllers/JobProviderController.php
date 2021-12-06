<?php

namespace App\Http\Controllers;

use App\Models\JobProvider;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;

class JobProviderController extends Controller
{
    public function index()
    {
        return view('jobProvider.JobProviderApp');
    }

    public function createApplication(Request $request)
    {
        $jp = new JobProvider;
        $jp->CompanyField = $request->input('companyfield');
        $jp->CompanyTitle = $request->input('companytitle');
        $jp->CompanyDescription = $request->input('description');
        $jp->user_id = auth()->id();
        $user = User::find(auth()->id());
        $filename = $user->name . 'IMG.' .$request->path->extension();
        $request->path->move(public_path('storage/images'), $filename);
        User::find(auth()->id())->update(['path'=>$filename]);
        $jp->save();
        return redirect()->route('JobProviderHome');
    }
    public function home()
    {
        return view('JobProvider.HomeJobProvider');
    }
    
    public function display(){

        $companyField = JobProvider::where('user_id',auth()->id())->get()->first()->CompanyField;
        $job_seekers = JobSeeker::where('Field','like',$companyField)->get();

        return view('JobProvider.HomeJobProvider')->with('job_seekers',$job_seekers);
    }
    public function search(Request $request)
    {
        
        $request->job;
        
        $seekers[]= JobSeeker::where('Field','like',$request->search)
            ->orWhere('degree','like',$request->search);

        array_push($seekers[],User::where('name','like',$request->search)
        ->orWhere('email','like',$request->search));
        
        $l=Locations::query()
        ->where('Country', 'like', "%{$request->jobloc}%")
        ->orWhere('City', 'like', "%{$request->jobloc}%")
        ->orWhere('ZipCode', 'like', "%{$request->jobloc}%")
        ->get();

        foreach ($l as $value){
            array_push($seekers,Job::where('location_id',$value->id())->get());
        }
        return view('Jobseeker.search', compact('seekers'));
    }

}
