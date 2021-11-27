@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Delete Account') }}
                    
                </header>


                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="/profile/{{ Auth::user()->id }}">
                    @csrf
                    @method('delete')

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Verify your password') }}
                        </label>
                        
                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required>

                        @if (session()->has('message'))
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ session()->get('message') }}
                            </p>
                        @endif
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-500 hover:bg-red-700 sm:py-4">
                            {{ __('Delete Account') }}
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __("You're breaking our hearts") }}<br>
                        </p>
                        <a class="w-full text-xs text-center text-blue-500 hover:text-blue-700 sm:text-sm sm:mb-5" href="/">
                            {{ __('Go Back') }}
                        </a>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
