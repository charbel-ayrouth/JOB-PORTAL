<?php

namespace App\Http\Controllers;

use App\Models\JobProvider;
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
        if ($request->hasfile('path')) {
            $file = $request->file('path');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/profilepic/', $filename);
            $user->path = $filename;
        }
        $user->save();
        $jp->save();
        return redirect()->route('JobProviderHome');
    }
    public function home(){
        return view('JobProvider.HomeJobProvider');
    }
}
