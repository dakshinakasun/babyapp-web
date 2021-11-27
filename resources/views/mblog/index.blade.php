@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

<style>
    .info-msg
    {
        margin: 10px 0;
        padding: 10px;
        border-radius: 3px 3px 3px 3px;
    }
    .info-msg {
        color: #059;
        background-color: #BEF;
    }
</style>

@if (Auth::user()->roll == 'admin')

    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl font-hairline">
                Monthly Blog Posts
            </h1>
        </div>
    </div>

    @if (session()->has('message'))
        
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-full mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 px-8">
                {{ session()->get('message') }}
            </p>
        </div>

    @endif

    {{-- @if (Auth::check())
        
        <div class="pt-15 w-4/5 m-auto">
            <a href="/mblog/create" class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                Create Post
            </a>
        </div>

    @endif --}}

    @foreach ($mposts as $mpost)

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/' . $mpost->image_path) }}" width="700" alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $mpost->etitle }}
            </h2>

            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $mpost->user->name }}</span>, Created on {{ date('jS M Y', strtotime($mpost->updated_at)) }}
            </span>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $mpost->ehighlight }}
            </p>

            <a href="/mblog/{{ $mpost->slug }}" class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-4 px-8 rounded-3xl">
                Keep Reading
            </a>

            @if (isset(Auth::user()->id) && Auth::user()->id == $mpost->user_id)

                <span class="float-right">
                    <form action="/mblog/{{ $mpost->slug }}" method="POST">
                    @csrf
                    @method('delete')

                    <button class="text-red-500 hover:text-red-700 italic" type="submit">
                        Delete
                    </button>
                    </form>
                </span>

                <span class="float-right">
                    <a href="/mblog/{{ $mpost->slug }}/edit" class="text-blue-500 italic hover:text-blue-700 pr-3">
                        Edit
                    </a>
                </span>

                
            @endif
        </div>
    </div>
        
    @endforeach

    <div class="w-4/5 m-auto text-center pt-5 text-xl text-gray-700 font-light">
        {{ $mposts->links() }}
    </div>
    
@else

    <?php 
    
        $mytime = Carbon\Carbon::now();
        $mytime->toDateString();

        if (Auth::user()->pdate)
        {
            $date = Auth::user()->pdate;
            // dd($date, $mytime);
            $datetime1 = new DateTime($date);
            $datetime2 = new DateTime($mytime);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $month = intval($days/28);
        }

        if (Auth::user()->bdate)
        {
            $date = Auth::user()->bdate;
            // dd($date, $mytime);
            $datetime1 = new DateTime($date);
            $datetime2 = new DateTime($mytime);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $month = intval($days/28);

        }

    ?>

    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl font-hairline">
                Monthly Blog Posts
            </h1>
        </div>
    </div>

    @if (session()->has('message'))
        
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-full mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 px-8">
                {{ session()->get('message') }}
            </p>
        </div>

    @endif

    {{-- @if (Auth::check())
        
        <div class="pt-15 w-4/5 m-auto">
            <a href="/mblog/create" class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                Create Post
            </a>
        </div>

    @endif --}}

    @if ($month <= 0)
    <div class="w-4/5 m-auto mt-5 pl-2">
        <div class="info-msg">
            <i class="fa fa-info-circle"></i>
            You Don't Have Month Posts Yet.
        </div>
    </div>
    
    @endif

    @foreach ($mposts as $mpost)

    @if ($mpost->month == 0)
        @continue
    @endif

    @if ($mpost->month == $month + 1)
        @break
    @endif

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/' . $mpost->image_path) }}" width="700" alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $mpost->etitle }}
            </h2>

            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $mpost->user->name }}</span>, Created on {{ date('jS M Y', strtotime($mpost->updated_at)) }}
            </span>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $mpost->ehighlight }}
            </p>

            <a href="/mblog/{{ $mpost->slug }}" class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-4 px-8 rounded-3xl">
                Keep Reading
            </a>

            @if (isset(Auth::user()->id) && Auth::user()->id == $mpost->user_id)

                <span class="float-right">
                    <form action="/mblog/{{ $mpost->slug }}" method="POST">
                    @csrf
                    @method('delete')

                    <button class="text-red-500 hover:text-red-700 italic" type="submit">
                        Delete
                    </button>
                    </form>
                </span>

                <span class="float-right">
                    <a href="/mblog/{{ $mpost->slug }}/edit" class="text-blue-500 italic hover:text-blue-700 pr-3">
                        Edit
                    </a>
                </span>

                
            @endif
        </div>
    </div>
        
    @endforeach

    <div class="w-4/5 m-auto text-center pt-5 text-xl text-gray-700 font-light">
        {{ $mposts->links() }}
    </div>
    
@endif

@endsection