<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Daily Posts
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <style>
      .create-btn{
        background: #3f83f8;
        width: 15%;
        display: inline-block;
        height: 40px;
        border-radius: 55px;
        text-align: center;
        margin: 5px 15px;
        padding: 10px;
      }

      .card-body{
        width: 100%;
        background: #fff;
        margin-top: 10px;
        border-radius: 10px;
        margin-left: 20px;
        margin-right: 20px;
      }
      
      .container {
        padding: 2rem 0rem;
      }

      h4 {
        margin: 2rem 0rem 1rem;
      }

      .table-image {
      td, th {
        vertical-align: middle;
        }
      }
      .error{
        width: auto;
        background: green;
        color: #fff;
        border-radius: 50px;
        margin: 10px;
        padding: 10px 12px;
      }
  </style>

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

          <li class="active ">
            <a href="/daily">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Daily Posts</p>
            </a>
          </li>

          <li>
            <a href="/weekly">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Weekly Posts</p>
            </a>
          </li>

          <li >
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
            <a class="navbar-brand" href="#pablo">Daily Posts</a>
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

      
        <div class="panel-header panel-header-sm">
        </div>
      
        {{-- code heare --}}

        <div class="create-btn">
            <a href="/dblog/create" style="color: #fff; text-transform: uppercase; text-decoration: inherit;">
                Create Post
            </a>
        </div>

        @if (session()->has('message'))
        
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="error">
                {{ session()->get('message') }}
            </p>
        </div>

        @endif

        
        
        {{-- table --}}

        <div class="container">
          <div class="row">
            <div class="col-12">
              <table class="table table-bordered">
                <thead class=" bg-white">
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Highlight</th>
                    <th scope="col">Thumbnail Image</th>
                    <th scope="col">Day No.</th>
                    <th></th>
                  </tr>
                </thead>
                @foreach ($dposts as $dpost)
                <tbody>
                  <tr>
                    <td scope="row">{{$dpost->etitle}}</td>
                    <td>{{$dpost->ehighlight}}</td>
                    <td>{{$dpost->image_path}}</td>
                    <td>{{$dpost->day}}</td>
                    <td>
                      
                      <span class="float-right">
                        <a class="btn btn-primary" href="/dblog/{{ $dpost->slug }}"><i class="far fa-eye"></i></a>
                      </span> 
                    
                      <span class="float-right my-1">
                        <a class="btn btn-success" href="/dblog/{{ $dpost->slug }}/edit"><i class="fas fa-edit"></i></a>
                      </span>
                      
                      <span class="float-right">
                      <form action="/daily/{{ $dpost->slug }}" method="POST">
                        @csrf
                        @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                      </form>
                      </span>
                      
                      
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>

        {{-- table --}}
  
    </div>
  </div>

  @include('sweetalert::alert')
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>