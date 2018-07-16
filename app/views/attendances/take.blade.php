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
    .take-btn {
      padding: 20px;
      border-radius: 40px;
      font-size: 2.5em;
      font-weight: 200;
      box-shadow: 0 5px 20px 7px rgba(87, 188, 130, 0.4);
    }
    .take-btn:hover {
      box-shadow: 0 5px 20px 7px rgba(75, 62, 129, .4);
    }
	</style>

@endsection


@section('content')

		<h1 class="section-header">
      <div><a href="{{ URL::to('/start/'.rtrim(strtr(base64_encode($class->cla_id), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($batch->bach_id), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($subject->sbjt_id), '+/', '-_'), '=').'/attendance') }}"><i class="ion ion-arrow-left-a"></i></a> Start Attendance</div>
    </h1>
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
  <form method="post" action="{{ URL::current() }}">
    <div class="row">
    @foreach($students as $key => $student)
      <div class="col-6 col-sm-4 col-lg-3">
        <input class="student-chk" id="s{{ $key+1 }}" type="checkbox" name="stdn[]" value="{{ $student->stdn_roll }}">
        <label for="s{{ $key+1 }}" class="student card card-sm text-center">
          <div class="card-header">
            <i class="ion ion-android-checkmark-circle"></i>
          </div>
          @if($student->stdn_gender == 'male')
            <img src="{{ asset('/icons/man.png') }}">
          @else
            <img src="{{ asset('/icons/woman.png') }}">
          @endif
          <h4>{{ $student->stdn_name }}</h4>
          <code>{{ $student->stdn_roll }}</code>
        </label>
      </div>
    @endforeach   
    </div>

    @if(count($students) > 0)
    <div class="row">
      <div class="col-12 text-center">
        <button class="btn btn-primary take-btn">Submit</button>
      </div>
    </div>
    @endif
  </form>
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