@extends('layout.layout')

@section('header')

	<title>Subjects | atdns</title>

	<style type="text/css" media="screen">
		.btn {
			border: 1px solid #57bc82;
		}

		
	</style>
	
@endsection

@section('content')

		<h1 class="section-header">
      <div><a href="{{ URL::to('/start/'.rtrim(strtr(base64_encode($class->cla_id), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($batch->bach_id), '+/', '-_'), '=')) }}"><i class="ion-arrow-left-a"></i></a> Student</div>
		</h1>

		@if ($errors->any())
			{{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
		@endif

		<div class="row">
			<div class="col-lg-6">

				<div class="card card-primary">
                  <div class="card-header">
                    <h4>Selected Info</h4>
                  </div>
                  <div class="card-body ">
                    	<form method="POST" action="{{ URL::to('/subjects') }}" class="needs-validation" novalidate="">
                    		<div class="row">
                          <ul>
                            <li>
                            	<h5><span class="badge badge-success">Selected Class :</span> {{ $class->cla_name }}</h5>
                            </li>
                            <li>
                            	<h5><span class="badge badge-success">Selected Batch :</span> {{ $batch->bach_name }}</h5>
                            </li>
                            <li>
                            	<h5><span class="badge badge-success">Selected Subject :</span> {{ $subject->sbjt_name }}</h5>
                            </li>
                          </ul>                        
                      	</div>
                        <div class="row">
                        <div class="form-group col-12">
                          <a class="btn btn-primary btn-block" href="{{ URL::current() }}/attendance">Next</a>
                        </div>
                      </div>
		                </form>
                  </div>
                  
                </div>

			</div>

			<div class="col-lg-1">
				<div class="row">
              		<h1 style="width: 100%;text-align: center;">Or</h1>
              	</div>
			</div>

			<div class="col-lg-5">

				<div class="card card-primary">
                  <div class="card-header">
                    <h4>Info</h4>
                  </div>
                  <div class="card-body ">
                  		<div class="row">
                          <ul>
                            <li>
                            	<h5><span class="badge badge-success">Selected Class :</span> {{ $class->cla_name }}</h5>
                            </li>
                            <li>
                            	<h5><span class="badge badge-success">Selected Batch :</span> {{ $batch->bach_name }}</h5>
                            </li>
                            <li>
                            	<h5><span class="badge badge-success">Selected Subject :</span> {{ $subject->sbjt_name }}</h5>
                            </li>
                          </ul>                        
                      </div>
                      <div class="row text-center">
                        <div class="form-group col-12">
                          <button type="button" id="addNew" class="btn btn-primary btn-block">Add student</button>
                        </div>
                      </div>
                  </div>
                  
                </div>

			</div>
		</div>

@endsection

@section('modal')
<div class="modal fade" id="ModalLong">
                  <div class="modal-dialog" >
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form method="POST" action="{{ URL::to('/students') }}" class="needs-validation" novalidate="">

                        <div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_roll">Student Roll No.</label>
                          <input type="number" name="stdn_roll" id="stdn_roll" class="form-control" required autofocus value="{{ Input::old('stdn_roll') }}">
                         
                          <div class="invalid-feedback">
                            Enter Student Roll No.!
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_name">Student Name</label>
                          <input type="text" name="stdn_name" id="stdn_name" class="form-control" required  value="{{ Input::old('stdn_name') }}">
                         
                          <div class="invalid-feedback">
                            Enter Student Name!
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_phone">Student Phone</label>
                          <input type="text" name="stdn_phone" id="stdn_phone" class="form-control" required  value="{{ Input::old('stdn_phone') }}">
                         
                          <div class="invalid-feedback">
                            Enter Student Phone!
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_address">Student Address</label>
                          <input type="text" name="stdn_address" id="stdn_address" class="form-control" required  value="{{ Input::old('stdn_address') }}">
                         
                          <div class="invalid-feedback">
                            Enter Student Address!
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_email">Student Email</label>
                          <input type="text" name="stdn_email" id="stdn_email" class="form-control" required  value="{{ Input::old('stdn_email') }}">
                         
                          <div class="invalid-feedback">
                            Enter Student Email!
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_gender">Student Gender</label>
                          <select name="stdn_gender" id="stdn_gender" class="form-control" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                         
                          <div class="invalid-feedback">
                            Choose Student Gender!
                          </div>
                        </div>
                      </div>

                      <input type="hidden" name="cla_id" value="{{ $class->cla_id }}">
                      <input type="hidden" name="bach_id" value="{{ $batch->bach_id }}">
                      <input type="hidden" name="sbjt_id" value="{{ $subject->sbjt_id }}">

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                          Add
                        </button>
                      </div>
                    </form>
                      </div>

                    </div>
                  </div>
                </div>
@endsection

@section('js')
	<script>
    $('#addNew').on('click',function() {
      $('#ModalLong').modal('show');
    });
    $('.close').on('click',function() {
      $('#ModalLong').modal('hide');
    });
  </script>
@endsection