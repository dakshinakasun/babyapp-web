<?php

namespace App\Http\Controllers;

use App\Models\Infor;
use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Mpost;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show','mblog']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mytime = Carbon::now();
        $mytime->toDateString();

        if (Auth::user()->pdate) {
            $date = Auth::user()->pdate;
            $datetime1 = new DateTime($date);
            $datetime2 = new DateTime($mytime);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $month = intval($days / 28);
        }

        if (Auth::user()->bdate) {
            $date = Auth::user()->bdate;
            $datetime1 = new DateTime($date);
            $datetime2 = new DateTime($mytime);
            $interval = $datetime1->diff($datetime2);
            $month = intval($days / 28);
        }

        if(Infor::where('user_id', '=', Auth::user()->id)->exists())
        {
            $mposts = Mpost::where('month', '<=', $month)
                ->orderBy('month', 'DESC')
                ->paginate(5);

            return view('mblog.index', compact('mposts'));
        }
        elseif(Auth::user()->roll == 'admin')
        {
            $mposts = Mpost::orderBy('month', 'DESC')
                ->paginate(5);

            return view('mblog.index', compact('mposts'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mblog.create');
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
            'etitle' => 'required',
            'stitle' => 'required',
            'ehighlight' => 'required',
            'shighlight' => 'required',
            // 'edescription' => 'required',
            // 'sdescription' => 'required',
            'month' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,webp,|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->etitle . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Mpost::create([
            'etitle' => $request->input('etitle'),
            'stitle' => $request->input('stitle'),
            'ehighlight' => $request->input('ehighlight'),
            'shighlight' => $request->input('shighlight'),
            'edescription' => $request->input('edescription'),
            'sdescription' => $request->input('sdescription'),
            'slug' => SlugService::createSlug(Mpost::class, 'slug', $request->etitle),
            'image_path' => $newImageName,
            'month' => $request->input('month'),
            'user_id' => auth()->user()->id

        ]);

        toast('Your Post has been Created!','success');
        return redirect('/mblog');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('mblog.show')
            ->with('mpost', Mpost::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('mblog.edit')
            ->with('mpost', Mpost::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'etitle' => 'required',
            'stitle' => 'required',
            'ehighlight' => 'required',
            'shighlight' => 'required',
            // 'edescription' => 'required',
            // 'sdescription' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,webp,|max:5048',
            'month' => 'required',
        ]);
        
        $newImageName = uniqid() . '-' . $request->etitle . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Mpost::where('slug', $slug)
            ->update([
                'etitle' => $request->input('etitle'),
                'stitle' => $request->input('stitle'),
                'ehighlight' => $request->input('ehighlight'),
                'shighlight' => $request->input('shighlight'),
                'edescription' => $request->input('edescription'),
                'sdescription' => $request->input('sdescription'),
                'slug' => SlugService::createSlug(Mpost::class, 'slug', $request->etitle),
                'image_path' => $newImageName,
                'month' => $request->input('month'),
                'user_id' => auth()->user()->id
            ]);

            toast('Your Post has been updated!','success');
            return redirect('/mblog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $mpost = Mpost::where('slug', $slug);
        $mpost->delete();

        toast('Your Post has been Deleted!','success');
        return redirect('/mblog');
    }

    public function upload(Request $request){
        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location'=>"/storage/$path"]); 
        
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/

    }
}
