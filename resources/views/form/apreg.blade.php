@extends('layouts.app')
@section('content')

@if ($errors->any())
        <div class="w-4/5 m-auto px-20 pt-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-full mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 px-8">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="mt-10 sm:mt-0 py-10">
    <div class="sm:container sm:mx-auto  sm:max-w-5xl sm:mt-8"> 
      <div class="mt-5 md:mt-0 md:col-span-2">

        
            
          

        <form action="/ap" method="POST" enctype="multipart/form-data">
          @csrf
        
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <div class="py-5 text-center">
                    <h1 class="text-5xl font-hairline">
                       After Pregnet Info
                    </h1>
                </div>
            </div>
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                  
                <div class="col-span-6 sm:col-span-3">
                  <label for="username" class="block text-sm font-medium sm:mb-4 text-gray-700">User name</label>
                  <input type="text" name="username" id="username" value="{{ Auth::user()->name }}" autocomplete="username" class="form-input w-full" disabled>
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="bdate" class="block text-sm font-medium sm:mb-4 text-gray-700">Last Period Date</label>
                  <input type="text" name="bdate" id="bdate" value="{{ Auth::user()->pdate }}" autocomplete="bdate" class="form-input w-full" disabled>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="firstname" class="block text-sm font-medium sm:mb-4 text-gray-700">First Name<label style="color: red">*</label></label>
                  <input type="text" name="firstname" id="firstname" autocomplete="firstname" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="lastname" class="block text-sm font-medium sm:mb-4 text-gray-700">Last Name<label style="color: red">*</label></label>
                  <input type="text" name="lastname" id="lastname" autocomplete="lastname" class="form-input w-full">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="mother_height" class="block text-sm font-medium sm:mb-4 text-gray-700">Mother Height <label style="color: red">*</label></label>
                  <input type="text" name="mother_height" id="mother_height" autocomplete="mheight" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="mother_weight" class="block text-sm font-medium sm:mb-4 text-gray-700">Mother Weight <label style="color: red">*</label></label>
                    <input type="text" name="mother_weight" id="mother_weight" autocomplete="mweight" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="waist_size" class="block text-sm font-medium sm:mb-4 text-gray-700">Mother Waist Size <label style="color: red">*</label></label>
                    <input type="text" name="waist_size" id="waist_size" autocomplete="wsize" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="clinic_date" class="block text-sm font-medium sm:mb-4 text-gray-700">Clinic date <label style="color: red">*</label></label>
                    <input type="date" name="clinic_date" id="clinic_date" autocomplete="cdate" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                  <label for="city" class="block text-sm font-medium sm:mb-4 text-gray-700">City <label style="color: red">*</label></label>
                  <input type="text" name="city" id="city" class="form-input w-full">
                </div>
  
                <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                  <label for="district" class="block text-sm font-medium sm:mb-4 text-gray-700">District <label style="color: red">*</label></label>
                  <input type="text" name="district" id="district" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="moh_area" class="block text-sm font-medium sm:mb-4 text-gray-700">MOH Area <label style="color: red">*</label></label>
                    <input type="text" name="moh_area" id="moh_area" autocomplete="postal-code" class="form-input w-full">
                </div>
  
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                      <label for="phm_area" class="block text-sm font-medium sm:mb-4 text-gray-700">PHM Area <label style="color: red">*</label></label>
                      <input type="text" name="phm_area" id="phm_area" autocomplete="postal-code" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="grama_division" class="block text-sm font-medium sm:mb-4 text-gray-700">Grama niladari Division <label style="color: red">*</label></label>
                    <input type="text" name="grama_division" id="grama_division" autocomplete="postal-code" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="father_mobile" class="block text-sm font-medium sm:mb-4 text-gray-700">Father's Mobile No. <label style="color: red">*</label></label>
                    <input type="text" name="father_mobile" id="father_mobile" autocomplete="mweight" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="midwife_mobile" class="block text-sm font-medium sm:mb-4 text-gray-700">MidWife's Mobile No. <label style="color: red">*</label></label>
                    <input type="text" name="midwife_mobile" id="midwife_mobile" autocomplete="mweight" class="form-input w-full">
                </div>
  
                {{-- <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP / Postal</label>
                  <input type="text" name="postal_code" id="postal_code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div> --}}

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="country" class="block text-sm font-medium sm:mb-4 text-gray-700">Are you working or not? <label style="color: red">*</label></label>
                  <select id="working" name="working" onchange="changeStatus()" autocomplete="country" class="w-full py-3 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2" id="roll">
                  <label for="job_roll" class="block text-sm font-medium sm:mb-4 text-gray-700">Job Roll <label style="color: red">*</label></label>
                  <input type="text" name="job_roll" id="job_roll" autocomplete="postal-code" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="income" class="block text-sm font-medium sm:mb-4 text-gray-700">Income Range <label style="color: red">*</label></label>
                    <input type="text" name="income" id="income" autocomplete="postal-code" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                    <label for="sleeping_time" class="block text-sm font-medium sm:mb-4 text-gray-700">Usual Sleeping Time <label style="color: red">*</label></label>
                    <input type="time" name="sleeping_time" id="sleeping_time" class="form-input w-full">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                    <label for="wakeup_time" class="block text-sm font-medium sm:mb-4 text-gray-700">Usual Wakeup Time <label style="color: red">*</label></label>
                    <input type="time" name="wakeup_time" id="wakeup_time" class="form-input w-full">
                </div>

              </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="w-1/6 select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                Submmit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>

<script>
  function changeStatus()
  {
    var ststus = document.getElementById("working");

    if(ststus.value == "yes")
    {
      document.getElementById("roll").style.visibility="visible";
    }
    else
    {
      document.getElementById("roll").style.visibility="hidden";
    }

  }
</script>

@endsection