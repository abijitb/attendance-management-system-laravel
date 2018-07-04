<?php

class StudentController extends BaseController {

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

	public function index()
	{
		$classes = Classes::where('user_id', Auth::id())
											->where('status', 1)
											->get();
		$batches = Batch::where('user_id', Auth::id())
										->where('status', 1)
										->where('cla_id', $classes[0]->cla_id)
										->get();
		$students = Student::where('user_id', Auth::id())
											 ->where('status', 1)
											 ->get();
		if(Session::has('log')) {
			return Redirect::to('/change-pass');
		}
		else {									 
			return View::make('students.list')->with('classes', $classes)->with('batches', $batches)
																	->with('students', $students);
		}
	}

	public function add()
	{
		$input = Input::all();
		$values = array(
					'stdn_roll' => 'required',
					'stdn_name' => 'required',
					'stdn_phone' => 'required|numeric',
					'stdn_address' => 'required',
					'stdn_email' => 'required|email',
					'stdn_gender' => 'required',
					'cla_id' => 'required',
					'bach_id' => 'required'
				);
		$validator = Validator::make($input, $values);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			$exist_roll = Student::where('user_id', Auth::id())
											 	 ->where('stdn_roll', $input['stdn_roll'])
											 	 ->where('cla_id', $input['cla_id'])
											 	 ->where('status', 1)
											   ->first();
			$exist_email = Student::where('user_id', Auth::id())
											 	 ->where('stdn_email', $input['stdn_email'])
											 	 ->where('cla_id', $input['cla_id'])
											 	 ->where('status', 1)
											   ->first();
			$exist_phone = Student::where('user_id', Auth::id())
												 ->where('stdn_phone', $input['stdn_phone'])
												 ->where('cla_id', $input['cla_id'])
											 	 ->where('status', 1)
											 	 ->first();

			if(empty($exist_roll) && empty($exist_email) && empty($exist_phone)) {
				$student = new Student();
				$student->stdn_roll = $input['stdn_roll'];
				$student->user_id = Auth::id();
				$student->stdn_name = $input['stdn_name'];
				$student->stdn_phone = $input['stdn_phone'];
				$student->stdn_address = $input['stdn_address'];
				$student->stdn_email = $input['stdn_email'];
				$student->stdn_gender = $input['stdn_gender'];
				$student->cla_id = $input['cla_id'];
				$student->bach_id = $input['bach_id'];
				$student->status = 1;
				$student->save();

				Session::flash('message', 'You have successfully added '.$input['stdn_name'].'\'s info.');
				return Redirect::back();
			} else {
				$mb = new Illuminate\Support\MessageBag();
				$mb->add("error", $input['stdn_name']."'s info already exist!");
				return Redirect::back()->withErrors($mb)->withInput();
			}
		}
	}

	public function view($student)
	{
		$student = base64_decode(str_pad(strtr($student, '-_', '+/'), strlen($student) % 4, '=', STR_PAD_RIGHT));
		$student = Student::find($student);

		return View::make('students.single')->with('student', $student);
	}

	public function edit($student)
	{
		$student = base64_decode(str_pad(strtr($student, '-_', '+/'), strlen($student) % 4, '=', STR_PAD_RIGHT));
		$student = Student::find($student);

		$input = Input::all();
		$values = array(
					'stdn_name' => 'required',
					'stdn_phone' => 'required',
					'stdn_address' => 'required',
					'stdn_email' => 'required|email',
					'stdn_gender' => 'required'
				);

		$validator = Validator::make($input, $values);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			$exist_email = Student::where('user_id', Auth::id())
											 	 ->where('stdn_email', $input['stdn_email'])
											 	 ->where('cla_id', $student->cla_id)
											 	 ->where('status', 1)
											   ->first();
			$exist_phone = Student::where('user_id', Auth::id())
												 ->where('stdn_phone', $input['stdn_phone'])
												 ->where('cla_id', $student->cla_id)
											 	 ->where('status', 1)
											 	 ->first();
			if(strtolower($student->stdn_email) != strtolower($input['stdn_email']) && !empty($exist_email)) {
				$mb = new Illuminate\Support\MessageBag();
				$mb->add("error", $input['stdn_email']." is already exist!");
				return Redirect::back()->withErrors($mb);
			}
			if(strtolower($student->stdn_phone) != strtolower($input['stdn_phone']) && !empty($exist_phone)) {
				$mb = new Illuminate\Support\MessageBag();
				$mb->add("error", $input['stdn_phone']." is already exist!");
				return Redirect::back()->withErrors($mb);
			}

			$item = Student::find($student->stdn_id);
			$item->stdn_name = $input['stdn_name'];
			$item->stdn_phone = $input['stdn_phone'];
			$item->stdn_address = $input['stdn_address'];
			$item->stdn_email = $input['stdn_email'];
			$item->stdn_gender = $input['stdn_gender'];
			$item->status = 1;
			$item->save();

			Session::flash('message', 'You have successfully updated '.$input['stdn_name'].'\'s info.');
			return Redirect::back();
		}
	}

	public function remove($student)
	{
		$student = base64_decode(str_pad(strtr($student, '-_', '+/'), strlen($student) % 4, '=', STR_PAD_RIGHT));
		$student = Student::find($student);

		if(!empty($student)) {
			$item = Student::find($student->stdn_id);
			$item->status = 0;
			$item->save();

			Session::flash('message', 'You have successfully send a student to trast. If you want to get this, contact to Edify.');
		}

		return Redirect::to('/students');
	}

}
