<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  
  <link rel="stylesheet" href="{{ asset('dist/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/modules/summernote/summernote-lite.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/flag-icon-css/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">


  @yield('header')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="ion ion-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="javascript:void(0)" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
            <i class="ion ion-android-person d-lg-none"></i>
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->first_name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!--<a href="profile.html" class="dropdown-item has-icon">
                <i class="ion ion-android-person"></i> Profile
              </a>-->
              <a href="{{ URL::to('/change-pass') }}" class="dropdown-item has-icon">
                <i class="ion ion-log-out"></i> Change Password
              </a>
              <a href="{{ URL::to('/logout') }}" class="dropdown-item has-icon">
                <i class="ion ion-log-out"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ URL::to('/') }}">
                ATDNS
            </a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture" style="margin-left: 15px;">
              <img alt="image" src="{{ asset('dist/img/avatar/avatar.svg') }}" style="width: 43px;" >
            </div>
            <div class="sidebar-user-details">
              <div class="user-name">{{ Auth::user()->first_name }}</div>
              <div class="user-role">
                Administrator
              </div>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="">
              <a href="{{ URL::to('/') }}"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
            </li>

            <li class="">
              <a href="{{ URL::to('/start') }}"><i class="ion ion-android-checkmark-circle"></i><span>Attendance</span></a>
            </li>

            <li class="menu-header">Components</li>
            <!--<li>
              <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>Components</span></a>
              <ul class="menu-dropdown">
                
                <li><a href="javascript:void(0);"><i class="ion ion-ios-circle-outline"></i> Toastr</a></li>
              </ul>
            </li>-->

            <li>
              <a href="{{ URL::to('/classes') }}" class=""><i class="ion ion-android-clipboard"></i><span>Class</span></a>
            </li>

            <li>
              <a href="{{ URL::to('/batches') }}" class=""><i class="ion ion-ios-people"></i><span>Batch</span></a>
            </li>

            <li>
              <a href="{{ URL::to('/subjects') }}" class=""><i class="ion ion-ios-book"></i><span>Subjects</span></a>
            </li>
            
            <li>
              <a href="{{ URL::to('/students') }}" class=""><i class="ion ion-university"></i><span>Students</span></a>
            </li>
        </aside>
      </div>
      <div class="main-content">
        <section class="section">
          
          @yield('content')

        </section>
      </div>

      @yield('modal')

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <a href="{{ URL::to('/about') }}" title="atdns">atdns</a> . {{ date('Y') }} <div class="bullet"></div> All Rights Reseved
        </div>
        <div class="footer-right"></div>
      </footer>
    </div>
  </div>

  <script src="{{ asset('dist/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('dist/modules/popper.js') }}"></script>
  <script src="{{ asset('dist/modules/tooltip.js') }}"></script>
  <script src="{{ asset('dist/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dist/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
  <script src="{{ asset('dist/js/sa-functions.js') }}"></script>
  
  <script src="{{ asset('dist/js/scripts.js') }}"></script>
  <script src="{{ asset('dist/js/custom.js') }}"></script>


  @yield('js')
</body>
</html>