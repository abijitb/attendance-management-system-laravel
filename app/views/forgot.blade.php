<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>atdns | Forgot Password</title>

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
              <img src="{{ asset('dist/img/avatar/logo.png') }}" alt="atdns" style="width: 110px; margin: 0px 0px -20px 0px;">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Forgot Password</h4></div>



              <div class="card-body">

                @if ($errors->any())
                {{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
              @endif

              @if(Session::has('message'))

                <div class="alert alert-danger"><strong>Error! </strong>{{ Session::get('message') }}</div>

              @endif
                
                <form method="POST" action="" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="security_qstn" class="d-block">Security Question
                    </label>
                    <select id="security_qstn" class="form-control" name="security_qstn" tabindex="2" required>
                      <option value="">-- Select Security Question --</option>
                      <option value="What is your nick name?">What is your nick name?</option>
                      <option value="What is your pet name?">What is your pet name?</option>
                      <option value="What is your favourite Color?">What is your favourite Color?</option>
                      <option value="What is your birth year?">What is your birth year?</option>
                    </select>
                    <div class="invalid-feedback">
                      please Select your Security Question!
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="security_ans">Security Answer</label>
                    <input id="security_ans" type="text" class="form-control" name="security_ans" tabindex="3" required >
                    <div class="invalid-feedback">
                      Please fill in your Security Answer
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4" style="border: 1px solid #57bc82;">
                      Login
                    </button>
                  </div>
                </form>
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