<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>atdns | About</title>

  <link rel="stylesheet" href="{{ asset('dist/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
  
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              ATDNS
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>atdns</h4></div>

              <div class="card-body">
                <h4>About Us</h4>
                <p style="text-align: justify;">
                  atdns, the Digital Attendance Management System is a website developed for
daily student attendance in schools, colleges and institutes. It facilitates to access the
attendance information of a particular student in a particular class. The information is
sorted by the operators, which will be provided by the teacher for a particular class.
This system will also help in evaluating attendance eligibility criteria of a student.
                </p>
                
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
               Don't have an account? <a href="{{ URL::to('/new/account') }}">Create One</a> Or
              <a href="{{ URL::to('/login') }}">Log in</a>
            </div>
            <div class="simple-footer">
              <a href="{{ URL::to('/about') }}">About us</a> &nbsp;&nbsp; <a href="{{ URL::to('/contact') }}">Contact us</a>
              <br>
              Copyright &copy; <a href="{{ URL::to('/about') }}" title="atdns">atdns</a> . {{ date('Y') }} <div class="bullet"></div> All Rights Reseved
            </div>
          </div>
        </div>
      </div>
    </section>
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


</body>
</html>