<?php

class UserController extends BaseController {

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
		$total_students = Student::where('user_id', Auth::id())
														 ->where('status', 1)
														 ->count();
		$total_classes = Classes::where('user_id', Auth::id())
														->where('status', 1)
														->count();
		$total_batches = Batch::where('user_id', Auth::id())
													->where('status', 1)
													->count();
		$total_subjects = Subject::where('user_id', Auth::id())
														 ->where('status', 1)
														 ->count();

		if(Session::has('log')) {
			return Redirect::to('/change-pass');
		}
		else {
			return View::make('user.index')->with('total_students', $total_students)
																	 ->with('total_classes', $total_classes)
																	 ->with('total_batches', $total_batches)
																	 ->with('total_subjects', $total_subjects);
		}
		
	}

	public function start()
	{
		$classes = Classes::where('user_id', Auth::id())->get();
		if(Session::has('log')) {
			return Redirect::to('/change-pass');
		}
		else {
			return View::make('list.class')->with('classes', $classes);
		}
	}

	public function batch($class)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$class = Classes::find($class);

		$batches = Batch::where('user_id', Auth::id())
										->where('cla_id', $class->cla_id)
										->get();

		return View::make('list.batch')->with('class', $class)
																	 ->with('batches', $batches);
	}

	public function subject($class, $batch)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$class = Classes::find($class);

		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));
		$batch = Batch::find($batch);

		$subjects = Subject::where('user_id', Auth::id())
											 ->where('cla_id', $class->cla_id)
											 ->where('bach_id', $batch->bach_id)
											 ->get();

		return View::make('list.subject')->with('class', $class)
																		 ->with('batch', $batch)
																		 ->with('subjects', $subjects);
	}

	public function student($class, $batch, $subject)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$class = Classes::find($class);

		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));
		$batch = Batch::find($batch);

		$subject = base64_decode(str_pad(strtr($subject, '-_', '+/'), strlen($subject) % 4, '=', STR_PAD_RIGHT));
		$subject = Subject::find($subject);

		return View::make('list.student')->with('class', $class)
																		 ->with('batch', $batch)
																		 ->with('subject', $subject);
	}


	public function change() {
		return View::make('user.change');
	}


	public function change_action() {

		$input = Input::all();
		$values = array(
					'password' => 'required|min:8',
					're_password' => 'required|min:8|same:password',
				);
		$msg = [
				
				'password.required' => 'Enter Password!',
				'password.min' => 'Password Must Be Atleast 8 Character Long!',
				're_password.required' => 'Re Enter Your Password!',
				're_password.min' => 'Password Must Be Atleast 8 Character Long!',
				're_password.same' => 'Password Mismatch!'
		];
		$validator = Validator::make($input, $values, $msg);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}
		else {
			$password = Hash::make($input['password']);
				$user = new User();

				

				$user->where('user_id', '=', Auth::user()->user_id)
					->update(array('password' => $password));

				if(Session::has('log')) {

					Session::forget('log');
				}

				Session::flash('message', 'Password Successfully changed!');
				return Redirect::to('/change-pass');
			
			
		}
	}


}
