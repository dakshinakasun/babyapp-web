<?php

use App\Http\Controllers\UserController;
use App\Models\Dpost;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/dblog', function () {
    return Dpost::all()->sortByDesc('day')->values();
});

Route::get('/register', function () {
    return User::all();
});

Route::post('/register', function () {

    return User::create([
        'name' => request('name'),
        'email' => request('email'),
        'roll' => request('roll'),
        'type' => request('type'),
        'pdate' => request('pdate'),
        'bdate' => request('bdate'),
        'password' => Hash::make(request('password')),
    ]);
});

Route::post("login", [UserController::class, 'index']);
