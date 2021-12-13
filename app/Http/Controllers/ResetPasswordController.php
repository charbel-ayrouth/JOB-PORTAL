<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function index($token)
    {
        return view('Auth.ResetPasswordScreen', ['token' => $token]);
    }
    public function requestReset(Request $request)
    {

        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
    public function handleReset(Request $request)
    {

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        $user = User::where('email',$request->email)->get()->first();

        return $status === Password::PASSWORD_RESET
            ? ($user->role_id == 2? redirect()->route('LoginPageSeeker')->with('status', __($status)) : redirect()->route('LoginPageRecruiter')->with('status', __($status)) )
            : back()->withErrors(['email' => [__($status)]]);
    }
}
