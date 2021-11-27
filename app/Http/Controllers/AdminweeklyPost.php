<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wpost;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminweeklyPost extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(Auth::user()->roll) && Auth::user()->roll == 'admin')
            return view('admin.weekly')
                ->with('wposts', Wpost::orderBy('updated_at', 'DESC')->get());
    
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
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.weekly')
            ->with('wpost', Wpost::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // return view('admin.weekly')
        //     ->with('wpost', Wpost::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'etitle' => 'required',
            'stitle' => 'required',
            'ehighlight' => 'required',
            'shighlight' => 'required',
            'edescription' => 'required',
            'sdescription' => 'required',
        ]);

        Wpost::where('slug', $slug)
            ->update([
                'etitle' => $request->input('etitle'),
                'stitle' => $request->input('stitle'),
                'ehighlight' => $request->input('ehighlight'),
                'shighlight' => $request->input('shighlight'),
                'edescription' => $request->input('edescription'),
                'sdescription' => $request->input('sdescription'),
                'slug' => SlugService::createSlug(Wpost::class, 'slug', $request->etitle),
                'user_id' => auth()->user()->id
            ]);

            return redirect('/weekly')
                ->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $wpost = Wpost::where('slug', $slug);
        $wpost->delete();

        toast('Your Post has been Deleted!','success');
        return redirect('/weekly');
    }
}
