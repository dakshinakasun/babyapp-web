@extends('layouts.app')
@section('content')
    
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl font-hairline">
                Blog Posts
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

    <div class="scrolling-pagination">

        @foreach ($posts as $post)
    
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
            <div>
                <img src="{{ asset('images/' . $post->image_path) }}" width="700" alt="">
            </div>
            <div>
                <h2 class="text-gray-700 font-bold text-5xl pb-4">
                    {{ $post->etitle }}
                </h2>
    
                <span class="text-gray-500">
                    By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                </span>
    
                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                    {{ $post->ehighlight }}
                </p>
    
                <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-4 px-8 rounded-3xl">
                    Keep Reading
                </a>
    
                @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
    
                
    
                    <span class="float-right">
                        <form action="/blog/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('delete')
    
                        <button class="text-red-500 hover:text-red-700 italic" type="submit">
                            Delete
                        </button>
                        </form>
                    </span>
    
                    <span class="float-right">
                        <a href="/blog/{{ $post->slug }}/edit" class="text-blue-500 italic hover:text-blue-700 pr-3">
                            Edit
                        </a>
                    </span>
    
                    
                @endif
            </div>
        </div>
            
        @endforeach
        
    </div>
    
    </div>
    <div class="w-4/5 m-auto text-center pt-5 text-xl text-gray-700 font-light">
    {{ $posts->links() }}
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            autoTrigger: true,
            padding: 20,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>

    
@endsection