<?php

namespace App\Http\Controllers;

use App\Models\Infor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BeforPregnetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.bpreg');
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
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'mother_height' => 'required',
            'mother_weight' => 'required',
            'city' => 'required',
            'district' => 'required',
            'working' => 'required',
            'income' => 'required',
            'sleeping_time' => 'required',
            'wakeup_time' => 'required',

        ]);

        Infor::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'mother_height' => $request->input('mother_height'),
            'mother_weight' => $request->input('mother_weight'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'working' => $request->input('working'),
            'job_roll' => $request->input('job_roll'),
            'income' => $request->input('income'),
            'sleeping_time' => $request->input('sleeping_time'),
            'wakeup_time' => $request->input('wakeup_time'),
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
