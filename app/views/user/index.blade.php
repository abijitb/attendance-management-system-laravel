@extends('layout.layout')

@section('header')

  <title>Dashboard | edify</title>

@endsection

@section('content')

          <h1 class="section-header">
            <div>Dashboard</div>
          </h1>
          <div class="row">
              <div class="col-12 col-sm-6 col-lg-3">
                <div class="card card-sm bg-primary">
                  <div class="card-icon">
                    <i class="ion ion-university"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-body">
                      {{ $total_students }}
                    </div>
                    <div class="card-header">
                      <h4>Total Students</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-3">
                <div class="card card-sm bg-danger">
                  <div class="card-icon">
                    <i class="ion ion-android-clipboard"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-body">
                      {{ $total_classes }}
                    </div>
                    <div class="card-header">
                      <h4>Total Classes</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-3">
                <div class="card card-sm bg-warning">
                  <div class="card-icon">
                    <i class="ion ion-ios-people"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-body">
                      {{ $total_batches }}
                    </div>
                    <div class="card-header">
                      <h4>Total Batches</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-3">
                <div class="card card-sm bg-dark">
                  <div class="card-icon">
                    <i class="ion ion-ios-book"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-body">
                      {{ $total_subjects }}
                    </div>
                    <div class="card-header">
                      <h4>Total Subjects</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          

              

@endsection
