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
      <div style="width: 100%;"><a href="{{ URL::to('/start/'.rtrim(strtr(base64_encode($class->cla_id), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($batch->bach_id), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($subject->sbjt_id), '+/', '-_'), '=').'/attendance') }}"><i class="ion ion-arrow-left-a"></i></a> Attendance <a href="{{ URL::current().'/export' }}" style="float: right;"><i class="ion ion-ios-download"></i> <span style="font-size: 1rem;">Export CSV</span></a></div>
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
  <form method="post" action="">
    <div class="row">
      <div class="col-12">
        <h5><span class="badge badge-success">Attendant Students</span></h5>
      </div>
    @foreach($attendent_stdns as $student)
      <?php $student = Student::where('stdn_roll', $student)->first(); ?>
      <div class="col-6 col-sm-4 col-lg-3">
        <input class="student-chk" checked type="checkbox" disabled />
        <label class="student card card-sm text-center">
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
    <hr>
    <div class="row">
      <div class="col-12">
        <h5><span class="badge badge-success">Add Students</span></h5>
      </div>
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
    <div class="row">
      <div class="col-12 text-center">
        <button class="btn btn-primary" style="padding: 60px 20px; border-radius: 50%; font-size: 2.5em; font-weight: 200;">Update</button>
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