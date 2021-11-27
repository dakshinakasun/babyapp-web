<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['admin']]);
    }


    public function dashboard()
    {
        if(isset(Auth::user()->roll) && Auth::user()->roll == 'admin')
        return view('admin.admin');

        else{

            Alert::error('Restricted Area', 'Authorized Personnel Only Can Enter')->persistent('cloase')->autoclose(3500);
            return back();
        }
            
    }
}
