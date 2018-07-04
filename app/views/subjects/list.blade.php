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
            <div style="float: right;">
            	<a href="javascript:void(0)" title="Add New Subject" style="font-size: 15px;" id="addNew">Add New Subject</a>
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
                    <h4>All Subjects</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Subject Name</th>
                          <th>Class Name</th>
                          <th style="">Batch Name</th>
                          <th style="">Created At</th>
                          <th style="">Updated At</th>
                          <th>Action</th>
                        </tr>
                        @foreach($subjects as $subject)
                        <tr>
                        	<td>{{ $subject->sbjt_name }}</td>
                          <td>{{ Classes::find($subject->cla_id)->cla_name }}</td>
                          <td>{{ Batch::find($subject->bach_id)->bach_name }}</td>
                          <td>{{ $subject->created_at }}</td>
                          <td>{{ $subject->updated_at }}</td>
                          <td>
                          	<a href="{{ URL::to('/subject/'.rtrim(strtr(base64_encode($subject->sbjt_id), '+/', '-_'), '=')) }}" class="btn btn-action btn-primary mr-1" >
                              <i class="ion ion-edit"></i>
                            </a>
                            <a href="{{ URL::to('/subject/'.rtrim(strtr(base64_encode($subject->sbjt_id), '+/', '-_'), '=').'/remove') }}" class="btn btn-action btn-primary mr-1" >
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
                        <h4 class="modal-title">Add Subject</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form method="POST" action="{{ URL::current() }}?token=list" class="needs-validation" novalidate="">
                      <div class="row">
                        <div class="form-group col-12">
                          <label for="subject_name">Subject Name</label>
                          <input type="text" name="subject_name" id="subject_name" class="form-control" required autofocus>
                         
                          <div class="invalid-feedback">
                            Enter Subject Name!
                          </div>
                        </div>
                      </div>


                      <div class="row">
                        <div class="form-group col-12">
                          <label for="class_name">Class Name</label>
                          <select name="cla_id" id="class_name" class="form-control" required onchange="onChange(this)">
                          @foreach($classes as $class)
                            <option value="{{ $class->cla_id }}">{{ $class->cla_name }}</option>
                          @endforeach
                          </select>
                         
                          <div class="invalid-feedback">
                            Choose Class Name!
                          </div>
                        </div>
                      </div>


                      <div class="row">
                        <div class="form-group col-12">
                          <label for="batch_name">Batch Name</label>
                          <select name="bach_id" id="batch_name" class="form-control" required>
                          @foreach($batches as $batch)
                            <option value="{{ $batch->bach_id }}">{{ $batch->bach_name }}</option>
                          @endforeach
                          </select>
                         
                          <div class="invalid-feedback">
                            Choose Batch Name!
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
    function onChange(item) {
      document.getElementById("batch_name").innerHTML = '<option value="">Loading....</option>';
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { console.log(this.responseText);
          if(this.responseText != "") {
            document.getElementById("batch_name").innerHTML = this.responseText;
          } else {
            document.getElementById("batch_name").innerHTML = '<option value="">Not found</option>';
          }
        }
      };
      xhttp.open("POST", "{{ URL::to('/get-batches') }}?cla_id="+item.value, true);
      xhttp.send();
    }
  </script>

@endsection