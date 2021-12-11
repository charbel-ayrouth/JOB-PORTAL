<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
use App\Models\Job;
use App\Models\JobProvider;
use Illuminate\Support\Facades\DB;

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
            $Jobs = Job::query()
                ->where('JobTitle', 'like', "%" . $request->job . "%")
                ->orWhere('Field', 'like',  "%" . $request->job . "%")
                ->orWhere('Description', 'like',  "%" . $request->job . "%")
                ->orWhere('Requirements', 'like',  "%" . $request->job . "%")
                ->join('locations', function ($join) {
                    $join->on('location_id', '=', 'locations.id');
                })
                ->where('Country', 'like',  $request->jobloc . "%")
                ->orWhere('City', 'like',  $request->jobloc . "%")
                ->get();
        } else if ($request->job == null && $request->jobloc == null) {
            return redirect()->route('homepage_js');
        } else if ($request->job != null && $request->jobloc == null) {
            $Jobs = Job::query()
                ->where('JobTitle', 'like', "%" . $request->job . "%")
                ->orWhere('Field', 'like',  "%" . $request->job . "%")
                ->orWhere('Description', 'like',  "%" . $request->job . "%")
                ->orWhere('Requirements', 'like',  "%" . $request->job . "%")
                ->join('locations', function ($join) {
                    $join->on('location_id', '=', 'locations.id');
                })
                ->get();
        } else {
            $Jobs = Job::query()
                ->join('locations', function ($join) {
                    $join->on('location_id', '=', 'locations.id');
                })
                ->where('Country', 'like',  "%" . $request->jobloc . "%")
                ->orWhere('City', 'like',  "%" . $request->jobloc . "%")
                ->get();
        }

        $providers = JobProvider::join('users', 'user_id', '=', 'users.id')->get()->all();

        return view('Jobseeker.Homepage')->with('providers', $providers)->with('Jobs', $Jobs);
    }

    public function display()
    {
        $job_seeker = JobSeeker::where('user_id', auth()->id())->get()->first();

        $Jobs = Job::join('locations', function ($join) {
            $join->on('location_id', '=', 'locations.id');
        })->where('locations.country', '=', Locations::find(User::find(auth()->id())->location_id)->Country)
            ->where('Field', 'like', "%" . $job_seeker->Field . "%")->get();

        // $providers = JobProvider::join('users','user_id','=','users.id')->get();
        $providers = DB::select('select * from job_providers as j,users as u where j.user_id=u.id');
        return view('Jobseeker.Homepage')->with('Jobs', $Jobs)->with('providers', $providers);
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
            'bio' => $request->bio,
        ]);
        return redirect()->route('homepage_js');
    }
}
