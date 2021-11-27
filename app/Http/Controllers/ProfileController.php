<?php

namespace App\Http\Controllers;

use App\Models\Infor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->roll == "user")
        {
            return view('profile.delete');
        }
        if(Auth::user()->roll == "admin")
        {
            Alert::warning('warning', 'Admin can not use this portal')->persistent('cloase')->autoclose(3500);
            return back();
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        if(Infor::where('user_id', '=', Auth::user()->id)->exists() || Auth::user()->roll == 'admin')
        {
            return view('profile.userprofile')
            ->with('infor', Infor::where('user_id', $id)->first());
        }
        elseif(isset(Auth::user()->id) && Auth::user()->type == 'before_pregnant')
        {
            return view('form.bpreg');
        }
        elseif(isset(Auth::user()->id) && Auth::user()->type == 'after_pregnant')
        {
            return view('form.apreg');
        }
        elseif(isset(Auth::user()->id) && Auth::user()->type == 'baby_was_born')
        {
            return view('form.bborn');
        }   
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->roll == 'user')
        {
            return view('profile.userprofileedit')
                ->with('infor', Infor::where('user_id', $id)->first());
        }
        if(Auth::user()->roll == 'admin')
        {
            Alert::warning('warning', 'Admin can not use this portal')->persistent('cloase')->autoclose(3500);
            return back();
        }
        
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
        Infor::where('id', $id)
            ->update([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'mother_height' => $request->input('mother_height'),
                'mother_weight' => $request->input('mother_weight'),
                'waist_size' => $request->input('waist_size'),
                'clinic_date' => $request->input('clinic_date'),
                'city' => $request->input('city'),
                'district' => $request->input('district'),
                'moh_area' => $request->input('moh_area'),
                'phm_area' => $request->input('phm_area'),
                'grama_division' => $request->input('grama_division'),
                'father_mobile' => $request->input('father_mobile'),
                'midwife_mobile' => $request->input('midwife_mobile'),
                'working' => $request->input('working'),
                'job_roll' => $request->input('job_roll'),
                'income' => $request->input('income'),
                'sleeping_time' => $request->input('sleeping_time'),
                'wakeup_time' => $request->input('wakeup_time'),

        ]);

        User::where('id', $id)
            ->update([
                'pdate' => $request->input('pdate'),
                'bdate' => $request->input('bdate'),
                'type' => $request->input('type'),
            ]);

        // return redirect('/')->with('message', 'Your form has been submitted successfully!');
        toast('Your data has been updated!','success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $password = $request->input('password');

        if (Hash::check($password, Auth::user()->password)) {

            $infor = Infor::where('user_id', $id);
            $infor->delete();

            Auth::logout();
            
            Alert::success('Account Deleted Successfully')->persistent('cloase')->autoclose(3500);
            return back();
        }
        else
            toast('Password does not match. Try Again...!','error');
            return redirect('/profile')
                ->with('message', 'Password does not match. Try Again...!');
                
    }
}
