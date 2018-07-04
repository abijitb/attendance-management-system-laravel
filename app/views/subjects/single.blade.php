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
            <div>Subjects</div>
		</h1>

		@if ($errors->any())
			{{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
    @endif

		<div class="row">
			<div class="col-lg-12">

				<div class="card card-primary">
                  <div class="card-header">
                    <h4>Edit Subject</h4>
                  </div>
                  <div class="card-body ">
                    	<form method="POST" action="{{ URL::current() }}" class="needs-validation" novalidate="">
                    		<div class="row">
                          <ul>
                            <li>
                            	<h5><span class="badge badge-success">Selected Class :</span> {{ Classes::find($subject->cla_id)->cla_name }}</h5>
                            </li>
                            <li>
                            	<h5><span class="badge badge-success">Selected Batch :</span> {{ Batch::find($subject->bach_id)->bach_name }}</h5>
                            </li>
                          </ul>                        
                      	</div>

		                  <div class="row">
		                    <div class="form-group col-12">
		                      <label for="subject_name">Subject Name</label>
		                      <input type="text" name="sbjt_name" id="subject_name" class="form-control" required autofocus value="{{ $subject->sbjt_name }}">
		                     
		                      <div class="invalid-feedback">
		                        Enter Subject Name!
		                      </div>
		                    </div>
		                  </div>

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