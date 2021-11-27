@extends('layouts.app')
@section('content')
    
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-6xl">
                Create Post
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
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="etitle" placeholder="Title..." class="bg-transparent block border-b-2 w-full h-18 text-3xl outline-none"><br>
            <input type="text" name="stitle" placeholder="ශීර්ෂය..." class="bg-transparent block border-b-2 w-full h-18 text-3xl outline-none">


            <textarea name="ehighlight" placeholder="Highlight Description..." class="py-15 bg-transparent block border-b-2 w-full h-25 text-l outline-none"></textarea><br>
            <textarea name="shighlight" placeholder="විස්තරය ඉස්මතු කරන්න ..." class="py-15 bg-transparent block border-b-2 w-full h-25 text-l outline-none"></textarea>

        
            <textarea id="des1" name="edescription" placeholder="Description..." class="py-20 bg-transparent block border-b-2 w-full h-100 text-l outline-none"></textarea><br>
            <textarea id="des2" name="sdescription" placeholder="විස්තර..." class="py-20 bg-transparent block border-b-2 w-full h-100 text-l outline-none"></textarea>


            <div class="bg-gray-lighter pt-15">
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-sm shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-none">
                        Select a file
                    </span>
                    <input type="file" name="image" id="image" onchange="previewImage()" class="hidden">
                </label>

                <img class=" py-5" id="preview" alt="" width="200">
            </div>

            <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-50 text-sm font-extrabold py-4 px-8 rounded-3xl">
                Submit Post
            </button>
        </form>
    </div>
    
    <!--<script src="https://cdn.tiny.cloud/1/pc03yeh4y9e54f4o9hu1gk1akw2amsr9zxhsvde6ubqxu5nt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->
    <script src="https://cdn.tiny.cloud/1/7984dx8arenaj5gc4hg58tf6n3p5lxfx4sfi6601ikg47og8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/pc03yeh4y9e54f4o9hu1gk1akw2amsr9zxhsvde6ubqxu5nt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}


    {{-- <script>
        tinymce.init({
          selector: 'textarea#des1,#des2',
          plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
          toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
          toolbar_mode: 'floating',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
       });
      </script> --}}
      
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

<script>
    tinymce.init({
        selector: 'textarea#des1,#des2',

        image_class_list: [
        {title: 'img-responsive', value: 'img-responsive'},
        ],
        height: 500,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
        },
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste imagetools"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",

        image_title: true,
        automatic_uploads: true,
        images_upload_url: '/blogupload',
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
            };
            input.click();
        }
    });
</script>

@endsection