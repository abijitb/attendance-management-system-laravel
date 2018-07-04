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
      <div>Class</div>
		</h1>

    @if ($errors->any())
      {{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
    @endif

		<div class="row">
			<div class="col-lg-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Add Class</h4>
                  </div>
                  <div class="card-body ">
                    <form method="POST" action="{{ URL::to('/classes') }}" class="needs-validation" novalidate="">
                      <div class="row">
                        <div class="form-group col-12">
                          <label for="class_name">Class Name</label>
                          <input type="text" name="cla_name" id="class_name" class="form-control" required autofocus>
                         
                          <div class="invalid-feedback">
                            Enter Class Name!
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
                    <h4>Select Class</h4>
                  </div>
                  <div class="card-body ">

                      <div class="row">
                        <div class="form-group col-12">
                          <label for="select_class_name">Class Name</label>
                          <select type="text" name="select_class_name" id="select_class_name" class="form-control" onchange="goToNext(this)">
                         		<option value="">-- Select Class --</option>
                          @foreach($classes as $class)
                         		<option value="{{ rtrim(strtr(base64_encode($class->cla_id), '+/', '-_'), '=') }}">{{ $class->cla_name }}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="row" style="visibility: hidden;">
                          <ul>
                            <li>
                              <h5></h5>
                            </li>
                          </ul>                        
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
    window.location = '{{ URL::to('/start') }}/'+c.value;
  }
}
</script>
@endsection