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
      <div><a href="{{ URL::to('/start/') }}"><i class="ion-arrow-left-a"></i></a> Batch</div>
		</h1>

		@if ($errors->any())
			{{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
		@endif

		<div class="row">
			<div class="col-lg-6">

				<div class="card card-primary">
                  <div class="card-header">
                    <h4>Add Batch</h4>
                  </div>
                  <div class="card-body ">
                    	<form method="POST" action="{{ URL::to('/batches') }}" class="needs-validation" novalidate="">
                    		<div class="row">
		                    <ul>
                            <li>
                            	<h5><span class="badge badge-success">Selected Class :</span> {{ $class->cla_name }}</h5>
                            </li>
                          </ul>
		                  </div>
		                  <div class="row">
		                    <div class="form-group col-12">
		                      <label for="batch_name">Batch Name</label>
		                      <input type="text" name="bach_name" id="batch_name" class="form-control" required autofocus>
		                      <input type="hidden" name="cla_id" value="{{ $class->cla_id }}" required>
		                     
		                      <div class="invalid-feedback">
		                        Enter Batch Name!
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

			<div class="col-lg-1">
				<div class="row">
              		<h1 style="width: 100%;text-align: center;">Or</h1>
              	</div>
			</div>

			<div class="col-lg-5">
				<div class="card card-primary">
                  <div class="card-header">
                    <h4>Select Batch</h4>
                  </div>
                  <div class="card-body ">

											<div class="row">
                          <ul>
                            <li>
                            	<h5><span class="badge badge-success">Selected Class :</span> {{ $class->cla_name }}</h5>
                            </li>
                          </ul>                        
                      	</div>
		                  <div class="row">
		                    <div class="form-group col-12">
		                      <label for="select_batch_name">Batch Name</label>
		                      <select type="text" name="select_batch_name" id="select_batch_name" class="form-control" onchange="goToNext(this)">
		                     		<option value="">-- Select Batch --</option>
													@foreach($batches as $batch)
		                     		<option value="{{ rtrim(strtr(base64_encode($batch->bach_id), '+/', '-_'), '=') }}">{{ $batch->bach_name }}</option>
													@endforeach
		                      </select>
		                    </div>
		                  </div>
                  </div>
                  
                </div>
			</div>
		</div>

@endsection

@section('js')
<script type="text/javascript">
function goToNext(c) {
  if(c.value != '') {
    window.location = '{{ URL::current() }}/'+c.value;
  }
}
</script>
@endsection