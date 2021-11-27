<?php

namespace App\Http\Controllers;

use App\Models\Infor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserInforController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(Auth::user()->roll) && Auth::user()->roll == 'admin')
            return view('admin.userinfo')
                ->with('infors', Infor::orderBy('id', 'ASC')->get());

        else
        {
            Alert::error('Restricted Area', 'Authorized Personnel Only Can Enter')->persistent('cloase')->autoclose(3500);
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
        return view('profile.profile')
            ->with('infor', Infor::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('profile.edit')
            ->with('infor', Infor::where('id', $id)->first());
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
        $request->validate([
            // 'firstname' => 'required',
            // 'lastname' => 'required',
            // 'mother_height' => 'required',
            // 'mother_weight' => 'required',
            // 'city' => 'required',
            // 'district' => 'required',
            // // 'working' => 'required',
            // 'income' => 'required',
            // 'sleeping_time' => 'required',
            // 'wakeup_time' => 'required',

        ]);

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

        toast('Data has been updated!','success');
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infor = Infor::where('id', $id);
        $infor->delete();

        toast('Account has been deleted!','success');
        return redirect('/users');
    }
}
