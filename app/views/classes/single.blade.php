@extends('layout.layout')

@section('header')
	
	<title>Classes | atdns</title>

	<style type="text/css" media="screen">
		.btn {
			border: 1px solid #57bc82;
		}
	</style>

@endsection

@section('content')
	
		<h1 class="section-header">
      <div>{{ $class->cla_name }}</div>
		</h1>

    @if ($errors->any())
      {{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
    @endif

		<div class="row">
			<div class="col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Edit Class</h4>
                  </div>
                  <div class="card-body ">
                    <form method="POST" action="{{ URL::current() }}" class="needs-validation" novalidate="">
                      <div class="row">
                        <div class="form-group col-12">
                          <label for="class_name">Class Name</label>
                          <input type="text" name="cla_name" id="class_name" class="form-control" required autofocus value="{{ $class->cla_name }}">
                         
                          <div class="invalid-feedback">
                            Enter Class Name!
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