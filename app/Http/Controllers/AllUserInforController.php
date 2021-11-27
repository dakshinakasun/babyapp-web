<?php

namespace App\Http\Controllers;

use App\Models\Infor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AllUserInforController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(Auth::user()->roll) && Auth::user()->roll == 'admin')
            return view('admin.alluserinfo')
                ->with('infors', User::orderBy('id', 'ASC')->get());

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
        return view('profile.alluserprofile')
            ->with('infor', User::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('profile.alluseredit')
            ->with('infor', User::where('id', $id)->first());
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

        User::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'type' => $request->input('type'),
                'pdate' => $request->input('pdate'),
                'bdate' => $request->input('bdate'),
                'roll' => $request->input('roll')
            ]);

        toast('Data has been updated!','success');
        return redirect('/allusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infor = User::where('id', $id);
        $infor->delete();

        toast('Account has been deleted!','success');
        return redirect('/allusers');
    }
}
