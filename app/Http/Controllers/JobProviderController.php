<?php

namespace App\Http\Controllers;
use App\Models\JobProvider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Locations;
class JobProviderController extends Controller
{
    public function createApplication(Request $request){

        $jp=new JobProvider;
    
        
        $jp->CompanyField=$request->input('companyfield');
        $jp->CompanyTitle=$request->input('Companytitle');
        $jp->CompanyDescription=$request->input('description');

        $user=new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        if ($request->hasfile('path')) {
            $file = $request->file('path');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/profilepic/', $filename);
            $jp->cv = $filename;
        }
        $user->phoneNumber=$request->input('phone');
        $location=new Locations;
        $location->country=$request->input('country');
        $location->city=$request->input('city');
        $location->zipCode=$request->input('zipCode');
        $location->Address=$request->input('Address');
    
    }
}
