@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Register') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('register') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Name') }}:
                        </label>

                        <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Confirm Password') }}:
                        </label>

                        <input id="password-confirm" type="password" class="form-input w-full"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    

                    {{-- mom Type --}}
                    <div class="flex flex-wrap">
                        <label for="type" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Type') }}:
                        </label>
                            <select class="mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('bday')  border-red-500 @enderror" name="type" id="type" onchange="changeStatus()" required autocomplete="type" autofocus>
                                <option   required autocomplete="type" autofocus></option>
                                <option   value="before_pregnant" required autocomplete="type" autofocus>Before Pregnant</option>
                                <option   value="after_pregnant" required autocomplete="type" autofocus>After Pregnant</option>
                                <option   value="baby_was_born" required autocomplete="type" autofocus>Baby was born</option>
                              </select>

                        @error('type')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- period date --}}
                    <div class="flex flex-wrap" style="display: none" id="pdate">
                        <label for="pdate" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Last period date') }}:
                        </label>

                        <input id="pdatei" type="date" class="form-input w-full @error('pdate')  border-red-500 @enderror"
                            name="pdate" value="{{ old('pdate') }}" >

                        @error('pdatei')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Born date --}}
                    <div class="flex flex-wrap" style="display: none" id="bdate">
                        <label for="bdate" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Baby Born date') }}:
                        </label>

                        <input id="bdatei" type="date" class="form-input w-full @error('bdate')  border-red-500 @enderror"
                            name="bdate" value="{{ old('bdate') }}" >

                        @error('bdatei')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                    
                        <input id="roll" type="hidden" class="form-input w-full @error('roll')  border-red-500 @enderror"
                            name="roll" value="user" required autocomplete="roll" autofocus>
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Register') }}
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __('Already have an account?') }}
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </p>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>

<script>
    function changeStatus()
    {    
      var ststus = document.getElementById("type");

      if((ststus.value == "before_pregnant") || (ststus.value == "after_pregnant"))
      {
        // document.getElementById("bdate").style.display="none";
        document.getElementById("bdate").style.visibility="hidden";
        document.getElementById("pdate").style.display="block";
        

      }
    //   if (ststus.value == "baby_was_born")
      else
      {
        document.getElementById("pdate").style.display="none";
        document.getElementById("pdate").style.visibility="hidden";
        document.getElementById("bdate").style.display="block";
        
      }

    }
  </script>

@endsection


