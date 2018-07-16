<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>atdns | Contact</title>

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
          <div class="col-lg-6 offset-lg-3 col-sm-12 offset-sm-0">
            <div class="login-brand">
              ATDNS
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>atdns</h4></div>

              <div class="card-body">
                
                <h4 style="margin-bottom: 20px;">Contact Us</h4>
                <div>
                  <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:100%;'><div id='gmap_canvas' style='height:440px;width:100%;'></div><div><small><a href="embedgooglemaps.com/">https://embedgooglemaps.com/</a></small></div><div><small><a href="http://promocode.com.ph/aliexpress/">promocode discounts</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(22.572646,88.36389499999996),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(22.572646,88.36389499999996)});infowindow = new google.maps.InfoWindow({content:'<strong>ATDNS</strong><br>kolkata<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                </div>
                <p style="margin-top: 20px;">Contact Us: <br>
                  ATDNS
                  kolkata <br>
                  <a href="mailto:contact@atdns.com" >contact@atdns.com</a>
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