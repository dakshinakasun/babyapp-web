<?php

namespace App\Http\Controllers;

use App\Models\Infor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BabyBornController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.bborn');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.bborn');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'clinic_date' => 'required',
            'city' => 'required',
            'district' => 'required',
            'moh_area' => 'required',
            'phm_area' => 'required',
            'grama_division' => 'required',
            'father_mobile' => 'required',
            'working' => 'required',
            'income' => 'required'
        ]);

        Infor::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'clinic_date' => $request->input('clinic_date'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'moh_area' => $request->input('moh_area'),
            'phm_area' => $request->input('phm_area'),
            'grama_division' => $request->input('grama_division'),
            'father_mobile' => $request->input('father_mobile'),
            'working' => $request->input('working'),
            'job_roll' => $request->input('job_roll'),
            'income' => $request->input('income'),
            'user_id' => auth()->user()->id
        ]);

        // return redirect('/wblog')->with('message', 'Your form has been submitted successfully!');
        Alert::success('Account Created Successfully')->persistent('cloase')->autoclose(3500);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
