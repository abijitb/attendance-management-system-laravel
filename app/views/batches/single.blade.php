@extends('layout.layout')

@section('header')

	<title>Batches | atdns</title>

	<style type="text/css" media="screen">
		.btn {
			border: 1px solid #57bc82;
		}
		
	</style>

@endsection

@section('content')

		<h1 class="section-header">
            <div>Batch</div>
		</h1>

		@if ($errors->any())
			{{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
		@endif

		<div class="row">
			<div class="col-lg-12">

				<div class="card card-primary">
                  <div class="card-header">
                    <h4>Edit Batch</h4>
                  </div>
                  <div class="card-body ">
                    	<form method="POST" action="{{ URL::current() }}" class="needs-validation" novalidate="">
                    		<div class="row">
		                    <ul>
                            <li>
                            	<h5><span class="badge badge-success">Selected Class :</span> {{ Classes::find($batch->cla_id)->cla_name }}</h5>
                            </li>
                          </ul>
		                  </div>
		                  <div class="row">
		                    <div class="form-group col-12">
		                      <label for="batch_name">Batch Name</label>
		                      <input type="text" name="bach_name" id="batch_name" class="form-control" required autofocus value="{{ $batch->bach_name }}">
		                     
		                      <div class="invalid-feedback">
		                        Enter Batch Name!
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