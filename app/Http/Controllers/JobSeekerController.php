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
        $Jobs[] = Job::query()
            ->where('JobTitle', 'like', "%{$request->job}%")
            ->orWhere('Field', 'like', "%{$request->job}%")
            ->orWhere('Description', 'like', "%{$request->job}%")
            ->orWhere('Requirements', 'like', "%{$request->job}%")
            ->get();

        $l = Locations::query()
            ->where('Country', 'like', "%{$request->jobloc}%")
            ->orWhere('City', 'like', "%{$request->jobloc}%")
            ->orWhere('ZipCode', 'like', "%{$request->jobloc}%")
            ->get();

        foreach ($l as $value) {
            array_push($Jobs, Job::where('location_id', $value->id())->get());
        } 
        return view('Jobseeker.search', compact('Jobs'));
    }

    public function display()
    {

        $j = Job::all();
        $user = User::find(auth()->id());
        $user_location = Locations::find($user->location_id);
        $job_seeker = JobSeeker::where('user_id', auth()->id())->get()->first();

        $Jobs = [];
        foreach ($j as $key => $value) {
            $JobLocation = Locations::where('id', $value->location_id)->get()->first();
            if ($user_location->Country == $JobLocation->Country && $job_seeker->Field == $value->Field) {
                array_push($Jobs, $j);
            }
        }
        return view('Jobseeker.Homepage')->with('Jobs', $Jobs);
    }
//-----------------------------------Create application----------------------------------------
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
        return redirect()->route('JobSeekerApp');
    }
}
