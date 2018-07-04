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
            <div>Classes</div>
            <div style="float: right;">
            	<a href="javascript:void(0)" title="Add New Class" style="font-size: 15px;" id="addNew">Add New Class</a>
            </div>
		</h1>

    @if ($errors->any())
      {{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
    @endif

    @if(Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

		<div class="row">
			<div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Classes</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th style="">Class Name</th>
                          <th style="">Created At</th>
                          <th style="">Updated At</th>
                          <th>Action</th>
                        </tr>
                        @foreach($classes as $class)
                        <tr>
                          <td>{{ $class->cla_name }}</td>
                          <td>{{ $class->created_at }}</td>
                          <td>{{ $class->updated_at }}</td>
                          <td>
                          	<a href="{{ URL::to('/class/'.rtrim(strtr(base64_encode($class->cla_id), '+/', '-_'), '=')) }}" class="btn btn-action btn-primary mr-1" >
                          		<i class="ion ion-edit"></i>
                          	</a>
                          	<a href="{{ URL::to('/class/'.rtrim(strtr(base64_encode($class->cla_id), '+/', '-_'), '=').'/remove') }}" class="btn btn-action btn-primary mr-1" >
                          		<i class="ion ion-trash-b"></i>
                          	</a>
                          </td>
                        </tr>
                        @endforeach
                      </table>
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
                        <h4 class="modal-title">Add Class</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form method="POST" action="{{ URL::current() }}?token=list" class="needs-validation" novalidate="">
                      <div class="row">
                        <div class="form-group col-12">
                          <label for="cla_name">Class Name</label>
                          <input type="text" name="cla_name" id="cla_name" class="form-control" required autofocus>
                         
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