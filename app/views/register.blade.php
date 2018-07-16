<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>atdns | Register</title>

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
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              ATDNS
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              

              <div class="card-body">

                <div class="alert alert-info alert-has-icon alert-dismissible show fade">
                  <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <div class="alert-title">Note:</div>
                    You Have to Remember your Security Question and It's Corresponding Answer while recovering your account!
                  </div>
                </div>

                @if ($errors->any())
                {{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
                @endif

                <form method="POST" class="needs-validation" novalidate="">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="first_name">First Name</label>
                      <input id="first_name" type="text" class="form-control" name="first_name" autofocus value="{{ Input::old('first_name') }}" required="">
                      <div class="invalid-feedback">
                        Enter First Name!
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name" value="{{ Input::old('last_name') }}" required="">
                      <div class="invalid-feedback">
                        Enter Last Name!
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ Input::old('email') }}" required="">
                    <div class="invalid-feedback">
                      Enter Valid Email!
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control" name="password" required="">
                      <div class="invalid-feedback">
                        Enter Password!
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="re_password" class="d-block">Password Confirmation</label>
                      <input id="re_password" type="password" class="form-control" name="re_password" required="">
                      <div class="invalid-feedback">
                        Re Enter Password!
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="institute">Institute Name</label>
                    <input id="institute" type="text" class="form-control" name="institute_name" value="{{ Input::old('institute_name') }}" required="">
                    <div class="invalid-feedback">
                      Enter Institute Name!
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="security_qstn">Security Question</label>
                    <select id="security_qstn" type="text" class="form-control" name="security_qstn" required="">
                      <option value="">-- Select Security Question --</option>
                      <option value="What is your nick name?">What is your nick name?</option>
                      <option value="What is your pet name?">What is your pet name?</option>
                      <option value="What is your favourite Color?">What is your favourite Color?</option>
                      <option value="What is your birth year?">What is your birth year?</option>
                    </select>
                    <div class="invalid-feedback">
                      Choose Security Question!
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="security_ans">Security Answer</label>
                    <input id="security_ans" type="text" class="form-control" name="security_ans" required="">
                    <div class="invalid-feedback">
                      Enter Security Answer!
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" style="border: 1px solid #57bc82;">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Already have an account? <a href="{{ URL::to('/login') }}">Log in</a>
            </div>
            <div class="simple-footer">
              <a href="{{ URL::to('/about') }}">About us</a> &nbsp;&nbsp; <a href="{{ URL::to('/contact') }}">Contact us</a>
              <br>
              Copyright &copy; <a href="{{ URL::to('/') }}" title="atdns">atdns</a> . {{ date('Y') }} <div class="bullet"></div> All Rights Reseved
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