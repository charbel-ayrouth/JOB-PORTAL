<?php

namespace App\Http\Controllers;

use App\Mail\JobInterest;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use App\Models\Job;
use App\Models\JobProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class JobSeekerController extends Controller
{
    public function index()
    {
        return view('jobSeeker.JobseekerApp');
    }

    //------------------------------------Home page Search----------------------------------------
    public function searchjob(Request $request)
    {
        if ($request->job != null && $request->jobloc != null) {
            $Jobs = Job::join('job_providers','Jobprovider_id','=','job_providers.jid')
                ->join('users','job_providers.user_id','=','users.id')
                ->where(function ($q) use($request) {
                $q->where('JobTitle', 'LIKE', "%" . $request->job . "%")
                ->orWhere('Field', 'LIKE',  "%" . $request->job . "%")
                ->orWhere('Description', 'LIKE',  "%" . $request->job . "%")
                ->orWhere('Requirements', 'LIKE',  "%" . $request->job . "%")
                ->orWhere('users.name','LIKE','%'.$request->job.'%')
                ->orWhere('users.email','LIKE','%'.$request->job.'%');
                })
                ->join('locations','users.location_id','=','locations.id')
                ->where(function ($q) use($request) {
                    $q->Where('locations.Country','LIKE','%'.$request->jobloc.'%')
                    ->orWhere('locations.city','LIKE','%'.$request->jobloc.'%')
                    ->orWhere('locations.zipCode','LIKE','%'.$request->jobloc.'%')
                    ->orWhere('locations.Address','LIKE','%'.$request->jobloc.'%');
                })
                ->select('jobs.id as jobid','jobs.*','job_providers.jid as jid','job_providers.*','users.id as uid','users.*','locations.id as lid','locations.*')
                ->get();
        } else if ($request->job == null && $request->jobloc == null) {
            return redirect()->route('homepage_js');
        } else if ($request->job != null && $request->jobloc == null) {
            $Jobs = Job::where('JobTitle', 'LIKE', "%" . $request->job . "%")
                    ->orWhere('Field', 'LIKE',  "%" . $request->job . "%")
                    ->orWhere('Description', 'LIKE',  "%" . $request->job . "%")
                    ->orWhere('Requirements', 'LIKE',  "%" . $request->job . "%")
                    ->join('job_providers','Jobprovider_id','=','job_providers.jid')
                    ->join('users','job_providers.user_id','=','users.id')
                    ->orWhere('users.name','LIKE','%'.$request->job.'%')
                    ->orWhere('users.email','LIKE','%'.$request->job.'%')
                    ->join('locations','users.location_id','=','locations.id')
                    ->select('jobs.id as jobid','jobs.*','job_providers.jid as jid','job_providers.*','users.id as uid','users.*','locations.id as lid','locations.*')
                    ->get();
        } else {
            $Jobs = Job::query()
                ->join('job_providers','Jobprovider_id','=','job_providers.jid')
                ->join('users','job_providers.user_id','=','users.id')
                ->join('locations', function ($join) {
                    $join->on('jobs.location_id', '=', 'locations.id');
                })
                ->where('Country', 'like',  "%" . $request->jobloc . "%")
                ->orWhere('City', 'like',  "%" . $request->jobloc . "%")
                ->orWhere('locations.zipCode','LIKE','%'.$request->jobloc.'%')
                ->orWhere('locations.Address','LIKE','%'.$request->jobloc.'%')
                ->select('jobs.id as jobid','jobs.*','job_providers.jid as jid','job_providers.*','users.id as uid','users.*','locations.id as lid','locations.*')
                ->get();
        }


        return view('Jobseeker.Homepage')->with('Jobs', $Jobs);
    }

    public function display()
    {
        $job_seeker = JobSeeker::where('user_id', auth()->id())
                    ->join('users','user_id','=','users.id')
                    ->join('locations','users.location_id','=','locations.id')
                    ->select('job_seekers.id as jid','job_seekers.*','users.id as uid','users.*','locations.id as lid','locations.*')
                    ->get()->first();
        $Jobs = Job::join('locations','location_id','=','locations.id')
                     ->where('locations.Country','=',$job_seeker->Country)
                     ->join('job_providers','Jobprovider_id','=','job_providers.jid')
                     ->where('job_providers.CompanyField','Like','%'.$job_seeker->Filed.'%')
                     ->join('users','job_providers.user_id','=','users.id')
                     ->select('jobs.id as jobid','jobs.*','users.id as uid','users.*','locations.id as lid','locations.*','job_providers.*')
                     ->get();
        return view('Jobseeker.Homepage')->with('Jobs', $Jobs);
    }
    //-----------------------------------Create application----------------------------------------
    public function createApplication(Request $request)
    {
        $request->validate([
            'cv' => 'required',
            'CoverLetter' => 'required',
        ]);
        $user = User::find(auth()->id());
        // \dd($user);
        $cv = $request->cv;
        $CoverLetter = $request->CoverLetter;

        $CVname = $user->name . 'CV.' . $cv->extension();
        $CoverLettername = $user->name . 'CoverLetter.' . $CoverLetter->extension();

        $cv->move(public_path('storage/cv'), $CVname);
        $CoverLetter->move(public_path('storage/cl'), $CoverLettername);

        JobSeeker::Create([
            'degree' => $request->degree,
            'Field' => $request->field,
            'experience' => $request->experience,
            'skills' => $request->skills,
            'CV' => $CVname,
            'CoverLetter' => $CoverLettername,
            'user_id' => auth()->id(),
            'bio' => 'need to add bio in form'
        ]);
        return redirect()->route('homepage_js');
    }
    //------------------Job Details--------------
    public function jobdetail($id){
        $JobDetails = Job::where('jid',$id)
                           ->join('job_providers','Jobprovider_id','=','job_providers.jid')
                           ->join('users','job_providers.user_id','=','users.id')
                           ->join('locations','users.location_id','=','locations.id')
                           ->select('jobs.id as job_id','jobs.*','job_providers.*','users.*','locations.id as loc_id','locations.*')
                           ->get()->first();
        return view('Jobseeker.JobDetails')->with('JobDetails',$JobDetails);
    }
    
    public function sendEmail(Request $request){
        set_time_limit(0);
        $Job_provider = Jobprovider::where('job_providers.jid','=',$request->jid)
                                  ->join('users','user_id','=','users.id')
                                  ->select('job_providers.jid as jid','job_providers.*','users.id as uid','users.*')
                                  ->get()->first();
        $Job_seeker = JobSeeker::where('user_id','=',auth()->id())
                                    ->join('users','user_id','=','users.id')
                                    ->select('users.id as uid','users.*','job_seekers.*')
                                    ->get()->first();
        Mail::to($Job_provider->email)->send(new JobInterest($Job_provider,$Job_seeker));
        return redirect()->back()->with('message','Email Sent!');
    }
}
