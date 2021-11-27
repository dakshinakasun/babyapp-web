<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')
                ->paginate(5);
            
        return view('blog.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
            'image' => 'required|mimes:jpg,png,jpeg,webp,|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->etitle . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'etitle' => $request->input('etitle'),
            'stitle' => $request->input('stitle'),
            'ehighlight' => $request->input('ehighlight'),
            'shighlight' => $request->input('shighlight'),
            'edescription' => $request->input('edescription'),
            'sdescription' => $request->input('sdescription'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->etitle),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id

        ]);

        toast('Your Post has been Created!','success');
        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')
            ->with('post', Post::where('slug', $slug)->first());

        return view('blog.sishow')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
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
            'image' => 'required|mimes:jpg,png,jpeg,webp,|max:5048'
        ]);
        
        $newImageName = uniqid() . '-' . $request->etitle . '.' . $request->image->extension();
        
        $request->image->move(public_path('images'), $newImageName);

        Post::where('slug', $slug)
            ->update([
                'etitle' => $request->input('etitle'),
                'stitle' => $request->input('stitle'),
                'ehighlight' => $request->input('ehighlight'),
                'shighlight' => $request->input('shighlight'),
                'edescription' => $request->input('edescription'),
                'sdescription' => $request->input('sdescription'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->etitle),
                'image_path' => $newImageName,
                'user_id' => auth()->user()->id
            ]);

            toast('Your Post has been updated!','success');
            return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        toast('Your Post has been Deleted!','success');
        return redirect('/blog');
    }

    public function upload(Request $request){
        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location'=>"/storage/$path"]); 
        
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/

    }
}
