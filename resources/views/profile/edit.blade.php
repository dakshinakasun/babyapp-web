<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Edit Profile
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  {{-- <link href="../assets/css/bootstrap.min.css" rel="stylesheet" /> --}}
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
  {{-- <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" /> --}}
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" media="all" rel="stylesheet" type="text/css" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  {{-- <link href="../assets/demo/demo.css" rel="stylesheet" /> --}}
  <link href="{{ asset('assets/demo/demo.css') }}" media="all" rel="stylesheet" type="text/css" />
</head>

<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="/" class="simple-text logo-mini">
          BM
        </a>
        <a href="/" class="simple-text logo-normal">
          Bloomingmoms
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="/admin">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li>
            <a href="/general">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>General Posts</p>
            </a>
          </li>

          <li>
            <a href="/weekly">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Weekly Posts</p>
            </a>
          </li>

          <li>
            <a href="/monthly">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Monthly Posts</p>
            </a>
          </li>

          <li>
            <a href="/users">
              <i class="now-ui-icons users_single-02"></i>
              <p>Users</p>
            </a>
          </li>
        
          <li class="active">
            <a href="">
              <i class="now-ui-icons users_single-02"></i>
              <p>Edit Profile</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Edit Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      
      @if ($infor->user->type == 'after_pregnant')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title"> Edit Profile</h5>
              </div>
              <div class="card-body">
                <form action="/users/{{ $infor->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="name" value="{{$infor->user->name}}" disabled>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{$infor->user->email}}" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="firstname" value="{{$infor->firstname}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="lastname" value="{{$infor->lastname}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" value="{{$infor->user->type}}" disabled>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Last Period Date</label>
                        <input type="date" class="form-control" name="pdate" value="{{$infor->user->pdate}}" disabled>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Mother Height</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="mother_height" value="{{$infor->mother_height}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Mother Weight</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="mother_weight" value="{{$infor->mother_weight}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Mother Waist Size</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="waist_size" value="{{$infor->waist_size}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Clinic date</label><label style="color: red"> * </label>
                        <input type="date" class="form-control" name="clinic_date" value="{{$infor->clinic_date}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>City</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="city" value="{{$infor->city}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>District </label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="district" value="{{$infor->district }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>MOH Area</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="moh_area" value="{{$infor->moh_area }}">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>PHM Area</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="phm_area" value="{{$infor->phm_area }}">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Grama niladari Division</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="grama_division" value="{{$infor->grama_division }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Father's Mobile No.</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="father_mobile" value="{{$infor->father_mobile}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>MidWife's Mobile No. </label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="midwife_mobile" value="{{$infor->midwife_mobile }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Are you working or not?</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="working" value="{{$infor->working }}">
                      </div>
                    </div>
                    @if ($infor->working == 'yes')
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Job Roll</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="job_roll" value="{{$infor->job_roll }}">
                      </div>
                    </div>
                    @endif
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Income</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="income" value="{{$infor->income }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Usual Sleeping Time</label><label style="color: red"> * </label>
                        <input type="time" class="form-control" name="sleeping_time" value="{{$infor->sleeping_time}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Usual Wakeup Time</label><label style="color: red"> * </label>
                        <input type="time" class="form-control" name="wakeup_time" value="{{$infor->wakeup_time}}">
                      </div>
                    </div>
                    <div class="col-md-12 pl-3">
                      <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit" style="width: 250px">Apply Changes</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                {{-- <img src="../assets/img/bg5.jpg" alt="..."> --}}
                <img src="{{ asset('assets/img/bg5.jpg') }}" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    {{-- <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="..."> --}}
                    <img class="avatar border-gray" src="{{ asset('assets/img/mike.jpg') }}" alt="...">
                    <h5 class="title">{{$infor->firstname}} {{$infor->lastname}}</h5>
                  </a>
                  <p class="description">
                    {{$infor->user->type}}
                  </p>
                </div>
                <p class="description text-center">
                  "Lamborghini Mercy <br>
                  Your chick she so thirsty <br>
                  I'm in that two seat Lambo"
                </p>
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      @endif

      @if ($infor->user->type == 'before_pregnant')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form action="/users/{{ $infor->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="name" value="{{$infor->user->name}}" disabled>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{$infor->user->email}}" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="firstname" value="{{$infor->firstname}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="lastname" value="{{$infor->lastname}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" value="{{$infor->user->type}}" disabled>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Last Period Date</label>
                        <input type="date" class="form-control" name="pdate" value="{{$infor->user->pdate}}" disabled>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Mother Height</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="mother_height" value="{{$infor->mother_height}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Mother Weight</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="mother_weight" value="{{$infor->mother_weight}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>City</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="city" value="{{$infor->city}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>District </label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="district" value="{{$infor->district }}">
                      </div>
                    </div>
                  </div>
      
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Are you working or not?</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="working" value="{{$infor->working }}">
                      </div>
                    </div>
                    @if ($infor->working == 'yes')
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Job Roll</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="job_roll" value="{{$infor->job_roll }}">
                      </div>
                    </div>
                    @endif
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Income</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="income" value="{{$infor->income }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Usual Sleeping Time</label><label style="color: red"> * </label>
                        <input type="time" class="form-control" name="sleeping_time" value="{{$infor->sleeping_time}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Usual Wakeup Time</label><label style="color: red"> * </label>
                        <input type="time" class="form-control" name="wakeup_time"  value="{{$infor->wakeup_time}}">
                      </div>
                    </div>
                    <div class="col-md-12 pl-3">
                      <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit" style="width: 250px">Apply Changes</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                {{-- <img src="../assets/img/bg5.jpg" alt="..."> --}}
                <img src="{{ asset('assets/img/bg5.jpg') }}" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    {{-- <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="..."> --}}
                    <img class="avatar border-gray" src="{{ asset('assets/img/mike.jpg') }}" alt="...">
                    <h5 class="title">{{$infor->firstname}} {{$infor->lastname}}</h5>
                  </a>
                  <p class="description">
                    {{$infor->user->type}}
                  </p>
                </div>
                <p class="description text-center">
                  "Lamborghini Mercy <br>
                  Your chick she so thirsty <br>
                  I'm in that two seat Lambo"
                </p>
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
          
      @endif

      @if ($infor->user->type == 'baby_was_born')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form action="/users/{{ $infor->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="name" value="{{$infor->user->name}}" disabled>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{$infor->user->email}}" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="firstname" value="{{$infor->firstname}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="lastname" value="{{$infor->lastname}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" value="{{$infor->user->type}}" disabled>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Baby Born Date</label>
                        <input type="date" class="form-control" name="bdate" value="{{$infor->user->bdate}}" disabled>
                      </div>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Clinic date</label><label style="color: red"> * </label>
                        <input type="date" class="form-control" name="clinic_date" value="{{$infor->clinic_date}}">
                      </div>
                    </div>

                  </div>
                  
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>City</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="city" value="{{$infor->city}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>District </label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="district" value="{{$infor->district }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>MOH Area</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="moh_area" value="{{$infor->moh_area }}">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>PHM Area</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="phm_area" value="{{$infor->phm_area }}">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Grama niladari Division</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="grama_division" value="{{$infor->grama_division }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Father's Mobile No.</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="father_mobile" value="{{$infor->father_mobile}}">
                      </div>
                    </div>
                  </div>
      
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Are you working or not?</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="working" value="{{$infor->working }}">
                      </div>
                    </div>
                    @if ($infor->working == 'yes')
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Job Roll</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="job_roll" value="{{$infor->job_roll }}">
                      </div>
                    </div>                        
                    @endif 
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Income</label><label style="color: red"> * </label>
                        <input type="text" class="form-control" name="income" value="{{$infor->income }}">
                      </div>
                    </div>
                    <div class="col-md-12 pl-3">
                      <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit" style="width: 250px">Apply Changes</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                {{-- <img src="../assets/img/bg5.jpg" alt="..."> --}}
                <img src="{{ asset('assets/img/bg5.jpg') }}" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    {{-- <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="..."> --}}
                    <img class="avatar border-gray" src="{{ asset('assets/img/mike.jpg') }}" alt="...">
                    <h5 class="title">{{$infor->firstname}} {{$infor->lastname}}</h5>
                  </a>
                  <p class="description">
                    {{$infor->user->type}}
                  </p>
                </div>
                <p class="description text-center">
                  "Lamborghini Mercy <br>
                  Your chick she so thirsty <br>
                  I'm in that two seat Lambo"
                </p>
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
          
      @endif
      
      
    </div>
  </div>
   <!--   Core JS Files   -->
  {{-- <script src="../assets/js/core/jquery.min.js"></script> --}}
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  {{-- <script src="../assets/js/core/popper.min.js"></script> --}}
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  {{-- <script src="../assets/js/core/bootstrap.min.js"></script> --}}
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  {{-- <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> --}}
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  {{-- <script src="../assets/js/plugins/chartjs.min.js"></script> --}}
  <!--  Notifications Plugin    -->
  {{-- <script src="../assets/js/plugins/bootstrap-notify.js"></script> --}}
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  {{-- <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! --> --}}
  <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}"></script>
  {{-- <script src="../assets/demo/demo.js"></script> --}}
</body>

</html>