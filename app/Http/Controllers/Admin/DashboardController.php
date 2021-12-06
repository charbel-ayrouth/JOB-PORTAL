<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Locations;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_providers = User::where('role_id', 3)->get();
        $job_seekers = User::where('role_id', 2)->get();
        return \view('admin.index', [
            'job_providers' => $job_providers,
            'job_seekers' => $job_seekers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $location_id = User::select('location_id')->where('id', $id)->first();
        $location = Locations::find($location_id)->first();
        return view('admin.show', [
            'user' => $user,
            'location' => $location,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $location_id = User::select('location_id')->where('id', $id)->first();
        $location = Locations::find($location_id)->first();
        return view('admin.edit', [
            'user' => $user,
            'location' => $location,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phonenumber' => $request->phonenumber,
                'role_id' => $request->role,
            ]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('users.index');
    }
}
