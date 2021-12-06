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
        $jp->CompanyTitle = $request->input('Companytitle');
        $jp->CompanyDescription = $request->input('description');
        if ($request->hasfile('path')) {
            $file = $request->file('path');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/profilepic/', $filename);
            $jp->cv = $filename;
        }
        $jp->save();
    }
}
