<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Job;
use App\Models\User;



use App\Mail\AuthMail;
use App\Models\country;
use App\Models\JobSeeker;
use App\Models\Locations;
use App\Models\JobProvider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.LoginScreen');
    }
    public function indexSeeker()
    {
        $countries = country::all();
        return view('Auth.LoginScreen')->with('countries', $countries)->with('roleId', 2);
    }
    public function indexRecruiter()
    {
        $countries = country::all();
        return view('Auth.LoginScreen')->with('countries', $countries)->with('roleId', 3);
    }
    public function Login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'passwordLogin' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->passwordLogin])) {
            $user = User::find(auth()->id());
            if ($user->email_verified_at != null) {
                if ($user->role_id == 1) {
                    // return redirect()->route('');
                    dd('hi');
                } else if ($user->role_id == 2) {
                    // return redirect()->route('');
                    return redirect()->route('homepage_js');

                    //return \redirect()->route('profile');
                } else if ($user->role_id == 3) {
                    //return redirect()->route('JobProviderHome');
                    return redirect()->route('jpHome');
                }
            } else if ($user->email_verified_at != null) {
                return redirect()->back()->with(session()->flash('alert-danger', 'Please Verify your Email'));
            }
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Invalid Credentials! Please Try Again!'));
        }
    }
    public function register(Request $request)
    {
        $user = new User();
        $request->validate([
            'name' => 'required|unique:users,name|max:255',
            'email'=> 'required|unique:users,email|Email',
            'password' => 'required|confirmed|between:8,255',
            'phoneNumber'=> 'required',
            'countrySelected' => 'required|String',
            'city' => 'required|String',
            'gender' => 'required'
        ]);
        $location = new Locations();
        /*$location->create([
            'Country' => $request->countrySelected,
            'City' => $request->city,
            'ZipCode' => $request->zipcode,
            'Address' => $request->address,
        ]);*/
        $location->Country = $request->countrySelected;
        $location->City = $request->city;
        $location->ZipCode = $request->zipcode;
        $location->Address = $request->address;
        $location->save();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phoneNumber = $request->phoneNumber;
        $user->role_id = $request->roleId;
        $user->location_id = $location->id;
        $user->VerificationToken = Str::uuid()->toString();
        $user->gender = $request->gender;
        $user->save();
        if ($user != null) {
            Mail::to($request->email)->send(new AuthMail(['name' => $user->name, 'verificationToken' => $user->VerificationToken]));
            if($user->role_id == 2)
            {
               return redirect()->route('LoginPageSeeker')->with(session()->flash('alert-success', 'Your Account Has Been Created Please Check Email For Verification Link!'));
            }else if($user->role_id == 3){
                return redirect()->route('LoginPageRecruiter')->with(session()->flash('alert-success', 'Your Account Has Been Created Please Check Email For Verification Link!'));
            }
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something Went Wrong! Please Try Again!'));
            if($user->role_id == 2)
            {
               return redirect()->route('LoginPageSeeker')->with(session()->flash('alert-danger', 'Something Went Wrong! Please Try Again!'));
            }else if($user->role_id == 3){
                return redirect()->route('LoginPageRecruiter')->with(session()->flash('alert-danger', 'Something Went Wrong! Please Try Again!'));
            }
        }
    }
    public function VerifyUser()
    {
        $verification_Code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where('VerificationToken', $verification_Code)->first();
        if ($user != null) {
            $user->email_verified_at = Carbon::now();
            $user->save();
            if ($user->role_id == 2) {
                if (Auth::loginUsingId($user->id)) {
                    return redirect()->route('JobSeekerApp');
                } else {
                    return redirect()->back()->with(session()->flash('alert-danger', 'Something Went Wrong!!'));
                }
            } else if ($user->role_id == 3) {
                if (Auth::loginUsingId($user->id)) {
                    return redirect()->route('JobProviderApp');
                    //return redirect()->action([JobProviderController::class, 'displayjp']);
                } else {
                    return redirect()->back()->with(session()->flash('alert-danger', 'Something Went Wrong!!'));
                }
                // return redirect()->route('LoginPageRecruiter')->with(session()->flash('alert-success', 'Your Account Has Been Verified Please Login!'));
            }
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Invalid Verification Code!'));
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    //------------------Job Details--------------
    public function jobdetail($id){
        $JobDetails = Job::where('jid',$id)
                           ->join('job_providers','Jobprovider_id','=','job_providers.jid')
                           ->join('users','job_providers.user_id','=','users.id')
                           ->join('locations','users.location_id','=','locations.id')
                           ->select('jobs.id as job_id ','jobs.*','job_providers.*','users.*','locations.id as loc_id','locations.*')
                           ->get();
        return view('Auth.JobDetails')->with('JobDetails',$JobDetails);
        }
}
