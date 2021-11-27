<?php

namespace App\Http\Controllers;

use App\Models\Dpost;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Wpost;
use App\Models\Mpost;

class LanguageController extends Controller
{
    public function gen($slug)
    {
        
        return view('blog.show')
            ->with('post', Post::where('slug', $slug)->first());
    }

    public function gsi($slug)
    {
        
        return view('blog.sishow')
            ->with('post', Post::where('slug', $slug)->first());
    }

    public function den($slug)
    {
        
        return view('dblog.show')
            ->with('dpost', Dpost::where('slug', $slug)->first());
    }

    public function dsi($slug)
    {
        
        return view('dblog.sishow')
            ->with('dpost', Dpost::where('slug', $slug)->first());
    }

    public function wen($slug)
    {
        
        return view('wblog.show')
            ->with('wpost', Wpost::where('slug', $slug)->first());
    }

    public function wsi($slug)
    {
        
        return view('wblog.sishow')
            ->with('wpost', Wpost::where('slug', $slug)->first());
    }

    public function men($slug)
    {
        
        return view('mblog.show')
            ->with('mpost', Mpost::where('slug', $slug)->first());
    }

    public function msi($slug)
    {
        
        return view('mblog.sishow')
            ->with('mpost', Mpost::where('slug', $slug)->first());
    }

}
