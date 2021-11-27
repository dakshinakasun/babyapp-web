<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- my css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bloomingmoms</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      .dropbtn {
        /* background-color: #d2d6dc; */
        /* color: white; */
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        
      }
      
      .dropdown {
        position: relative;
        display: inline-block;

      }
      
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }
      
      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }
      
      .dropdown-content a:hover {background-color: #f1f1f1}
      
      .dropdown:hover .dropdown-content {
        display: block;
      }
      
      .dropdown:hover .dropbtn {
        
      }
      </style>

</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-gray-800 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        Bloomingmoms
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <a class="no-underline hover:underline" href="/">Home</a>
                    <a class="no-underline hover:underline" href="/blog">General Blog</a>
                    <a class="no-underline hover:underline" href="/dblog">Daily Blog</a>
                    <a class="no-underline hover:underline" href="/wblog">Weekly Blog</a>
                    <a class="no-underline hover:underline" href="/mblog">Monthly Blog</a>
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest

                    @if (isset(Auth::user()->roll) && Auth::user()->roll == 'admin')

                    <a class="no-underline hover:underline" href="/admin">Admin</a>

                    @endif
                      

                    <div class="dropdown">
                      <a class="dropbtn">en <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                      <div class="dropdown-content">
                      <a href="/dblog/{{$dpost->slug}}/en">en</a>
                      <a href="/dblog/{{$dpost->slug}}/si">si</a>
                      </div>
                    </div>

                </nav>
            </div>
        </header>

    
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-5xl font-hairline">
                {{ $dpost->etitle }}
            </h1>
            <div class="pt-5">
                <span class="text-gray-500 font-hairline">
                    By <span class="font-bold italic text-gray-800">{{ $dpost->user->name }}</span>, Created on {{ date('jS M Y', strtotime($dpost->updated_at)) }}
                </span>
            </div>
        </div>
    </div>


    <div class="w-4/5 m-auto pt-5">
        <!--<p class="text-xl text-gray-700 pt-3 pb-10 leading-8 font-light">-->
        <!--    {{ $dpost->edescription }}-->
        <!--</p>-->
        <?php echo($dpost->edescription)?>
    </div>
 

  <div>
    @include('layouts.footer')
</div>
</div>

</body>
</html>
