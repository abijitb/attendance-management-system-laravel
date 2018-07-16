@extends('layout.layout')

@section('header')

	<title>Batches | atdns</title>

	<style type="text/css" media="screen">
		.btn {
			border: 1px solid #57bc82;
		}
    .student {
      padding: 10px;
      cursor: pointer;
      border: 1px solid #fff;
      position: relative;
    }
    .student .card-header {
      position: absolute;
      top: 0;
      left: 10px;
      width: auto;
      font-size: 1.6em;
      color: #57bc82 !important;
      display: none;
    }
    .student-chk {
      display: none;
    }
    .student-chk:checked+label.student {
      border-color: #57bc82;
    }
    .student-chk:checked+label.student .card-header {
      display: block;
    }
    .student img {
      width: 100px;
    }
    .student h4 {
      font-size: 18px;
      margin: 5px 0 0;
    }
	</style>

@endsection


@section('content')

		<h1 class="section-header">
      <div><a href="{{ URL::to('/start/'.rtrim(strtr(base64_encode($class->cla_id), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($batch->bach_id), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($subject->sbjt_id), '+/', '-_'), '=')) }}"><i class="ion-arrow-left-a"></i></a> Attendance</div>
      <div style="float: right;">
        <a href="{{ URL::current() }}/take" style="font-size: 15px;" id="addNew">Take Attendance</a>
      </div>
    </h1>

    @if ($errors->any())
      {{ implode('', $errors->all('<div class="alert alert-danger"><strong>Error! </strong>:message</div>')) }}
    @endif

    @if(Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
      <div class="col-12">
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
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Attendances</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Action</th>
                        </tr>
                        @foreach($attendances as $attendance)
                        <tr>
                          <td>{{ $attendance->created_at }}</td>
                          <td>{{ $attendance->updated_at }}</td>
                          <td>
                            <a href="{{ URL::current().'/'.rtrim(strtr(base64_encode($attendance->created_at), '+/', '-_'), '=') }}" class="btn btn-action btn-primary mr-1" >
                              <i class="ion ion-edit"></i>
                            </a>
                            <a href="{{ URL::current().'/'.rtrim(strtr(base64_encode($attendance->created_at), '+/', '-_'), '=').'/remove' }}" class="btn btn-action btn-primary mr-1" >
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