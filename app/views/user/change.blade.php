@extends('layout.layout')

@section('header')

  <title>Change Password | atdns</title>

@endsection


@section('content')


		<h1 class="section-header">
            <div>Change Password</div>
          </h1>


        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            

            <div class="card card-primary">
              <div class="card-header"><h4>Change Password</h4></div>



              <div class="card-body">

                @if ($errors->any())
                {{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
              @endif

              @if(Session::has('message'))

                <div class="alert alert-success"><strong>Success! </strong>{{ Session::get('message') }}</div>

              @endif
                
                <form method="POST" action="" class="needs-validation" novalidate="">
                  

                  <div class="form-group">
                    <label for="password" class="d-block">New Password
                      
                    </label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required autofocus="">
                    <div class="invalid-feedback">
                      please fill in your New password
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="re_password" class="d-block">Re type New Password
                      
                    </label>
                    <input id="re_password" type="password" class="form-control" name="re_password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please Re Type your New password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4" style="border: 1px solid #57bc82;">
                      Change
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


@endsection

