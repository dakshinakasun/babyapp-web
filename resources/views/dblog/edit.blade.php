@extends('layouts.app')
@section('content')
    
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-6xl">
                Update Post
            </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-full mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 px-8">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-4/5 m-auto pt-20">
        <form action="/dblog/{{ $dpost->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="text" name="etitle" value="{{ $dpost->etitle }}" class="bg-transparent block border-b-2 w-full h-20 text-3xl outline-none">
            <input type="text" name="stitle" value="{{ $dpost->stitle }}" class="bg-transparent block border-b-2 w-full h-20 text-3xl outline-none">
        
            <textarea name="ehighlight"  class="py-15 bg-transparent block border-b-2 w-full h-25 text-l outline-none">{{ $dpost->ehighlight }}</textarea>
            <textarea name="shighlight"  class="py-15 bg-transparent block border-b-2 w-full h-25 text-l outline-none">{{ $dpost->shighlight }}</textarea>
            
            <textarea id="des1" name="edescription" class="py-20 bg-transparent block border-b-2 w-full h-60 text-l outline-none"><?php echo($dpost->edescription)?></textarea>
            <textarea id="des2" name="sdescription" class="py-20 bg-transparent block border-b-2 w-full h-60 text-l outline-none"><?php echo($dpost->sdescription)?></textarea>
            
            <div class="bg-gray-lighter pt-15 ">
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-sm shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-none">
                        Select a file
                    </span>
                    <input type="file" value="{{asset('images/' . $dpost->image_path)}}" name="image" id="image" onchange="previewImage()" class="hidden">
                    
                </label>

                <img class="py-5" id="preview" src="{{asset('images/' . $dpost->image_path)}}" alt="" width="200">
            </div>
            
            <input type="text" name="day"  value="{{ $dpost->day }}"  class="pt-10 bg-transparent block border-b-2 h-18 text-s outline-none"><br>

            <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-sm font-extrabold py-4 px-8 rounded-3xl">
                Submit Post
            </button>
        </form>
    </div>
    
    <script src="https://cdn.tiny.cloud/1/7984dx8arenaj5gc4hg58tf6n3p5lxfx4sfi6601ikg47og8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
          selector: 'textarea#des1,#des2',
          plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
          toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
          toolbar_mode: 'floating',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
       });
      </script>
      
      <script>
        function previewImage() {
            var file = document.getElementById("image").files;
            if (file.length > 0) {
                var fileReader = new FileReader();

                fileReader.onload = function (event) {
                    document.getElementById("preview").setAttribute("src", event.target.result);
                };

                fileReader.readAsDataURL(file[0]);
            }
        }
    </script>

@endsection