<?php

namespace App\Http\Controllers;

use App\Mail\JobSeekerIntereset;
use App\Models\Job;
use App\Models\JobProvider;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use Illuminate\Support\Facades\Mail;

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
        // $user = User::find(auth()->id());
        // $filename = $user->name . 'IMG.' . $request->path->extension();
        // $request->path->move(public_path('storage/images'), $filename);
        // User::find(auth()->id())->update(['path' => $filename]);
        $jp->save();
        return redirect()->route('JobProviderHome');
    }
    public function home()
    {
        return view('JobProvider.HomeJobProvider');
    }

    public function display()
    {

        $companyField = JobProvider::where('user_id', auth()->id())->get()->first()->CompanyField;
        $job_seekers = JobSeeker::where('Field', 'like', $companyField)->get();
        dd($job_seekers);
        return view('JobProvider.HomeJobProvider')->with('job_seekers', $job_seekers);
    }
    public function search(Request $request)
    {
        if($request->job !=null && $request->jobloc == null)
        {
            $Job_seekers = JobSeeker::where('Field','LIKE','%'.$request->job.'%')
                                // ->where('degree','LIKE','%'.$request->job.'%')
                                ->join('users','user_id','=','users.id')
                                ->orWhere('users.email','LIKE','%'.$request->job.'%')
                                ->orWhere('users.name','LIKE','%'.$request->job.'%')
                                ->join('locations','users.location_id','=','locations.id')
                                ->select('job_seekers.id as jid','job_seekers.*','users.id as uid','users.*','locations.id as lid','locations.*')
                                ->get();
        }else if($request->job == null && $request->jobloc == null)
        {
            $Job_seekers = JobSeeker::join('users','user_id','=','users.id')
                                ->join('locations','users.location_id','=','locations.id')
                                ->orWhere('locations.Country','LIKE','%'.$request->jobloc.'%')
                                ->orWhere('locations.city','LIKE','%'.$request->jobloc.'%')
                                ->orWhere('locations.zipCode','LIKE','%'.$request->jobloc.'%')
                                ->orWhere('locations.Address','LIKE','%'.$request->jobloc.'%')
                                ->select('job_seekers.id as jid','job_seekers.*','users.id as uid','users.*','locations.id as lid','locations.*')
                                ->get();
        }else{
            $Job_seekers = JobSeeker::where('Field','LIKE','%'.$request->job.'%')
                                // ->where('degree','LIKE','%'.$request->job.'%')   
                                ->join('users','user_id','=','users.id')
                                ->where(function ($q) use($request) {
                                    $q->Where('users.email','LIKE','%'.$request->job.'%')
                                      ->orWhere('users.name','LIKE','%'.$request->job.'%');
                                })->join('locations','users.location_id','=','locations.id')
                                ->orWhere(function ($q) use($request) {
                                    $q->Where('locations.Country','LIKE','%'.$request->jobloc.'%')
                                    ->orWhere('locations.city','LIKE','%'.$request->jobloc.'%')
                                    ->orWhere('locations.zipCode','LIKE','%'.$request->jobloc.'%')
                                    ->orWhere('locations.Address','LIKE','%'.$request->jobloc.'%');
                                })
                                ->select('job_seekers.id as jid','job_seekers.*','users.id as uid','users.*','locations.id as lid','locations.*')
                                ->get();
        }
        return view('jobProvider.HomeJobProvider')->with('Job_seekers', $Job_seekers);
    }

    //-------------------------display----------
    public function displayjp()
    {   
        $Jobprovider = JobProvider::where('user_id',auth()->id())
                             ->join('users','user_id','=','users.id')
                             ->join('locations','users.location_id','=','locations.id')
                             ->get()
                             ->first();
        $Job_seekers = JobSeeker::where('Field','Like','%'.$Jobprovider->CompanyField.'%')
                                  ->join('users','user_id','=','users.id')
                                  ->join('locations','users.location_id','=','locations.id')
                                  ->where('locations.Country','=',$Jobprovider->Country)
                                  ->select('job_seekers.id as jid','job_seekers.*','users.id as uid','users.*','locations.id as lid','locations.*')
                                  ->get();
        return view('jobProvider.HomeJobProvider')->with('Job_seekers', $Job_seekers);
    }

    public function seekerDetails($jid){
        $Job_seeker = JobSeeker::where('job_seekers.id','=',$jid)
                                  ->join('users','user_id','=','users.id')
                                  ->join('locations','users.location_id','=','locations.id')
                                  ->select('job_seekers.id as jid','job_seekers.*','users.id as uid','users.*','locations.id as lid','locations.*')
                                  ->get()->first();
        return view('jobProvider.JobSeekerDetails')->with('Job_seeker', $Job_seeker);
    }

    public function sendEmail(Request $request){
        $Job_seeker = JobSeeker::where('job_seekers.id','=',$request->jid)
                                  ->join('users','user_id','=','users.id')
                                  ->select('job_seekers.id as jid','job_seekers.*','users.id as uid','users.*')
                                  ->get()->first();
        $job_provider = JobProvider::where('user_id','=',auth()->id())
                                    ->join('users','user_id','=','users.id')
                                    ->select('users.id as uid','users.*','job_providers.*')
                                    ->get()->first();
        Mail::to($Job_seeker->email)->send(new JobSeekerIntereset($job_provider,$Job_seeker));
        return redirect()->back()->with('message','Email Sent!');
    }
}
