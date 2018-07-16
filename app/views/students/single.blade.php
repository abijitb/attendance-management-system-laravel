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
            <div>Student</div>
		</h1>

		@if ($errors->any())
			{{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
		@endif

    @if(Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

		<div class="row">
			<div class="col-lg-12">

				<div class="card card-primary">
                  <div class="card-header">
                    <h4>Edit Student</h4>
                  </div>
                  <div class="card-body ">
                    	<form method="POST" action="{{ URL::current() }}" class="needs-validation" novalidate="">
                    		<div class="row">
                          <ul>
                            <li>
                            	<h5><span class="badge badge-success">Selected Class :</span> {{ Classes::find($student->cla_id)->cla_name }}</h5>
                            </li>
                            <li>
                            	<h5><span class="badge badge-success">Selected Batch :</span> {{ Batch::find($student->bach_id)->bach_name }}</h5>
                            </li>
                          </ul>                        
                      	</div>

		                  		<div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_roll">Student Roll No.</label>
                          <input type="number" readonly id="stdn_roll" class="form-control" required value="{{ $student->stdn_roll }}">
                         
                          <div class="invalid-feedback">
                            Enter Student Roll No.!
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_name">Student Name</label>
                          <input type="text" name="stdn_name" id="stdn_name" class="form-control" required  value="{{ $student->stdn_name }}">
                         
                          <div class="invalid-feedback">
                            Enter Student Name!
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_phone">Student Phone</label>
                          <input type="number" name="stdn_phone" id="stdn_phone" class="form-control" required  value="{{ $student->stdn_phone }}">
                         
                          <div class="invalid-feedback">
                            Enter Student Phone!
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_address">Student Address</label>
                          <input type="text" name="stdn_address" id="stdn_address" class="form-control" required  value="{{ $student->stdn_address }}">
                         
                          <div class="invalid-feedback">
                            Enter Student Address!
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_email">Student Email</label>
                          <input type="email" name="stdn_email" id="stdn_email" class="form-control" required  value="{{ $student->stdn_email }}">
                         
                          <div class="invalid-feedback">
                            Enter Student Email!
                          </div>
                        </div>
                      </div>

		                  <div class="row">
                        <div class="form-group col-12">
                          <label for="stdn_gender">Student Gender</label>
                          <select name="stdn_gender" id="stdn_gender" class="form-control" required>
                            <option @if($student->stdn_gender == 'male') selected @endif value="male">Male</option>
                            <option @if($student->stdn_gender == 'female') selected @endif value="female">Female</option>
                          </select>
                         
                          <div class="invalid-feedback">
                            Choose Student Gender!
                          </div>
                        </div>
                      </div>

		                  <div class="form-group">
		                    <button type="submit" class="btn btn-primary btn-block">
		                      Update
		                    </button>
		                  </div>
		                </form>
                  </div>
                  
                </div>

			</div>
		</div>

@endsection