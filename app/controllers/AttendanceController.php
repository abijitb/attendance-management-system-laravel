<?php

class AttendanceController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('@filterRequests');
	}

	public function filterRequests()
	{
		if(!Auth::check()) {
			return View::make('login');
		}
	}

	public function index($class, $batch, $subject)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$class = Classes::find($class);

		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));
		$batch = Batch::find($batch);

		$subject = base64_decode(str_pad(strtr($subject, '-_', '+/'), strlen($subject) % 4, '=', STR_PAD_RIGHT));
		$subject = Subject::find($subject);

		$students = Student::where('user_id', Auth::id())
											 ->where('cla_id', $class->cla_id)
											 ->where('bach_id', $batch->bach_id)
											 ->where('status', 1)
											 ->get();
		$attendances = Attendance::where('cla_id', $class->cla_id)
														 ->where('bach_id', $batch->bach_id)
														 ->where('sbjt_id', $subject->sbjt_id)
														 ->where('user_id', Auth::id())
														 ->where('status', 1)
														 ->groupBy('created_at')
														 ->get();

		return View::make('attendances.list')->with('class', $class)
																				 ->with('batch', $batch)
																				 ->with('subject', $subject)
																				 ->with('students', $students)
																				 ->with('attendances', $attendances);
	}

	public function take($class, $batch, $subject)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$class = Classes::find($class);

		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));
		$batch = Batch::find($batch);

		$subject = base64_decode(str_pad(strtr($subject, '-_', '+/'), strlen($subject) % 4, '=', STR_PAD_RIGHT));
		$subject = Subject::find($subject);

		$students = Student::where('cla_id', $class->cla_id)
											 ->where('bach_id', $batch->bach_id)
											 ->where('status', 1)
											 ->get();

		return View::make('attendances.take')->with('class', $class)
																				 ->with('batch', $batch)
																				 ->with('subject', $subject)
																				 ->with('students', $students);
	}

	public function submit($class, $batch, $subject)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));
		$subject = base64_decode(str_pad(strtr($subject, '-_', '+/'), strlen($subject) % 4, '=', STR_PAD_RIGHT));

		$input = Input::all();
		$values = array(
					'stdn' => 'required'
				);
		$validator = Validator::make($input, $values);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			foreach ($input['stdn'] as $student) {
				$attendance = new Attendance();
				$attendance->cla_id = $class;
				$attendance->bach_id = $batch;
				$attendance->sbjt_id = $subject;
				$attendance->user_id = Auth::id();
				$attendance->stdn_id = $student;
				$attendance->save();
			}

			Session::flash('message', 'You have successfully taken an attendance.');
			return Redirect::to('/start/'.rtrim(strtr(base64_encode($class), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($batch), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($subject), '+/', '-_'), '=').'/attendance');
		}
	}

	public function view($class, $batch, $subject, $date)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$class = Classes::find($class);

		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));
		$batch = Batch::find($batch);

		$subject = base64_decode(str_pad(strtr($subject, '-_', '+/'), strlen($subject) % 4, '=', STR_PAD_RIGHT));
		$subject = Subject::find($subject);

		$date = base64_decode(str_pad(strtr($date, '-_', '+/'), strlen($date) % 4, '=', STR_PAD_RIGHT));
		$attendent_stdns = Attendance::where('cla_id', $class->cla_id)
														 ->where('bach_id', $batch->bach_id)
														 ->where('sbjt_id', $subject->sbjt_id)
														 ->where('user_id', Auth::id())
														 ->where('created_at', $date)
														 ->where('status', 1)
														 ->lists('stdn_id');

		$students = Student::whereNotIn('stdn_roll', $attendent_stdns)
															->where('cla_id', $class->cla_id)
											 				->where('bach_id', $batch->bach_id)
											 				->where('status', 1)
											 				->get();

		return View::make('attendances.single')->with('class', $class)
																				 ->with('batch', $batch)
																				 ->with('subject', $subject)
																				 ->with('attendent_stdns', $attendent_stdns)
																				 ->with('students', $students);
	}

	public function edit($class, $batch, $subject, $date)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));
		$subject = base64_decode(str_pad(strtr($subject, '-_', '+/'), strlen($subject) % 4, '=', STR_PAD_RIGHT));
		$date = base64_decode(str_pad(strtr($date, '-_', '+/'), strlen($date) % 4, '=', STR_PAD_RIGHT));

		$input = Input::all();
		$values = array(
					'stdn' => 'required'
				);
		$validator = Validator::make($input, $values);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			foreach ($input['stdn'] as $student) {
				$attendance = new Attendance();
				$attendance->cla_id = $class;
				$attendance->bach_id = $batch;
				$attendance->sbjt_id = $subject;
				$attendance->user_id = Auth::id();
				$attendance->stdn_id = $student;
				$attendance->created_at = $date;
				$attendance->save();
			}

			Session::flash('message', 'You have successfully taken an attendance.');
			return Redirect::to('/start/'.rtrim(strtr(base64_encode($class), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($batch), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($subject), '+/', '-_'), '=').'/attendance');
		}
	}

	public function export($class, $batch, $subject, $date)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));
		$subject = base64_decode(str_pad(strtr($subject, '-_', '+/'), strlen($subject) % 4, '=', STR_PAD_RIGHT));
		$date = base64_decode(str_pad(strtr($date, '-_', '+/'), strlen($date) % 4, '=', STR_PAD_RIGHT));

		$attendent_stdns = Attendance::where('cla_id', $class)
														 ->where('bach_id', $batch)
														 ->where('sbjt_id', $subject)
														 ->where('user_id', Auth::id())
														 ->where('created_at', $date)
														 ->where('status', 1)
														 ->lists('stdn_id');

		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=Edify-attendance-'.$date.'.csv');
		$output = fopen('php://output', 'w');
		fputcsv($output, array('No', 'Student Roll', 'Student Name', 'Date Time'));
		 
		if (count($attendent_stdns) > 0) {
		    foreach ($attendent_stdns as $key => $student) {
		    	$student = Student::where('stdn_roll', $student)->first();
		      fputcsv($output, array($key+1, $student->stdn_roll, $student->stdn_name, $date));
		    }
		}

		//return Redirect::back();
	}

	public function remove($class, $batch, $subject, $date)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));
		$subject = base64_decode(str_pad(strtr($subject, '-_', '+/'), strlen($subject) % 4, '=', STR_PAD_RIGHT));
		$date = base64_decode(str_pad(strtr($date, '-_', '+/'), strlen($date) % 4, '=', STR_PAD_RIGHT));

		DB::table('attendances')
            ->where('bach_id', $batch)
						->where('sbjt_id', $subject)
						->where('user_id', Auth::id())
						->where('created_at', $date)
            ->update(array('status' => 0));

		Session::flash('message', 'You have successfully send an attendance list to trast. If you want to get this, contact to Edify.');
		return Redirect::back();
	}

}
