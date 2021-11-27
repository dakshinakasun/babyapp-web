<?php

namespace App\Http\Controllers;

use App\Models\Infor;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Wpost;
use App\Models\Mpost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function mobileRegister()
    {
        return view('auth.mobile_register');
    }
}
