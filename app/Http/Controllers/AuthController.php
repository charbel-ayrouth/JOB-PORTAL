<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\country;
use App\Models\Locations;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index(){
        $countries = country::all();
        return view('Auth.LoginScreen')->with('countries',$countries);
    }
    public function Login(Request $request){
       if(auth()->attempt($request->only('email','password')))
       {
            $user = User::find(auth()->id())->first();
            if($user->role_id == 1)
            {
                // return redirect()->route('');
                dd('hi');
            }else if($user->role_id == 2){
                
                // return redirect()->route('');
                dd('hi2');
            }else if($user->role_id == 3){
                
                // return redirect()->route('');
                dd('hi3');
           }else{
               dd('hhh');
                return redirect()->back()->with(session()->flash('alert-danger','Something Went Wrong! Please Try Again!'));
            }
        };
    }
    public function register(Request $request)
    {
        $user = new User();
        
        // $this->validate($request,[
        //     'name' => 'required|unique:users,name|max:255',
        //     'email'=> 'required|unique:users,email|Email',
        //     'passwordUser' => 'required|confirmed',
        //     'phoneNumber'=> 'required',
        //     'countrySelected' => 'required|String',
        //     'city' => 'required|String',
        // ]);
        $location = new Locations();
        $location->create([
            'Country'=>$request->countrySelected,
            'City' => $request->city,
            'ZipCode' => $request->zipcode,
            'Address' => $request->address,
        ]);
        $location->Country=$request->countrySelected;
        $location->City=$request->city;
        $location->ZipCode=$request->zipcode;
        $location->Address = $request->address;
        $location->save();
        // $user->create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>Hash::make($request->passwordUser),
        //     'phoneNumber'=>$request->phoneNumber,
        //     'role_id'=>2,
        //     'location_id'=>$location->id,
        //     'verificationToken'=> Str::uuid()->toString(),
        // ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->passwordUser);
        $user->phoneNumber=$request->phoneNumber;
        $user->role_id=2;
        $user->location_id=$location->id;
        $user->VerificationToken=Str::uuid()->toString();
        $user->save();
        if($user != null)
        {
            Mail::to($request->email)->send(new AuthMail(['name'=>$user->name,'verificationToken'=>$user->VerificationToken]));
            return redirect()->back()->with(session()->flash('alert-success','Your Account Has Been Created Please Check Email For Verification Link!'));
        }else{
            return redirect()->back()->with(session()->flash('alert-danger','Something Went Wrong! Please Try Again!'));
        }
    }
    public function VerifyUser()
    {
        $verification_Code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where('VerificationToken',$verification_Code)->first();
        if($user!=null)
        {
            $user->email_verified_at=Carbon::now();
            $user->save();
            return redirect()->route('LoginPage')->with(session()->flash('alert-success','Your Account Has Been Verified Please Login!'));
        }else{
            return redirect()->route('LoginPage')->with(session()->flash('alert-danger','Invalid Verification Code!'));
        }
    }
}
