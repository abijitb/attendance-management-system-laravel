<?php

class SubjectController extends BaseController {

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
		$subjects = Subject::where('user_id', Auth::id())
											 ->where('status', 1)
											 ->get();
		$classes = Classes::where('user_id', Auth::id())
											->where('status', 1)
											->get();
		$batches = Batch::where('user_id', Auth::id())
										->where('cla_id', $classes[0]->cla_id)
										->where('status', 1)
										->get();
		if(Session::has('log')) {
			return Redirect::to('/change-pass');
		}
		else {
			return View::make('subjects.list')->with('subjects', $subjects)->with('classes', $classes)
																			->with('batches', $batches);
		}
	}

	public function add()
	{
		$input = Input::all();
		$values = array(
					'subject_name' => 'required',
					'cla_id' => 'required',
					'bach_id' => 'required'
				);
		$validator = Validator::make($input, $values);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			$subject = new Subject();
			$subject->user_id = Auth::id();
			$subject->cla_id = $input['cla_id'];
			$subject->bach_id = $input['bach_id'];
			$subject->sbjt_name = $input['subject_name'];
			$subject->status = 1;
			$subject->save();

			if(isset($input['token']) && $input['token'] == 'list') {
				return Redirect::to('subjects');
			} else {
				return Redirect::to('/start/'.rtrim(strtr(base64_encode($subject->cla_id), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($subject->bach_id), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($subject->sbjt_id), '+/', '-_'), '='));
			}
		}
	}

	public function view($subject)
	{
		$subject = base64_decode(str_pad(strtr($subject, '-_', '+/'), strlen($subject) % 4, '=', STR_PAD_RIGHT));
		$subject = Subject::find($subject);

		return View::make('subjects.single')->with('subject', $subject);
	}

	public function edit($subject)
	{
		$subject = base64_decode(str_pad(strtr($subject, '-_', '+/'), strlen($subject) % 4, '=', STR_PAD_RIGHT));

		$input = Input::all();

		$values = array(
					'sbjt_name' => 'required'
				);
		$validator = Validator::make($input, $values);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			$item = Subject::find($subject);
			$item->sbjt_name = $input['sbjt_name'];
			$item->save();

			Session::flash('message', 'You have successfully updated to '.$input['sbjt_name']);
			return Redirect::to('/subjects');
		}
	}

	public function remove($subject)
	{
		$subject = base64_decode(str_pad(strtr($subject, '-_', '+/'), strlen($subject) % 4, '=', STR_PAD_RIGHT));
		$subject = Subject::find($subject);

		if(!empty($subject)) {
			$item = Subject::find($subject->sbjt_id);
			$item->status = 0;
			$item->save();

			Session::flash('message', 'You have successfully send a subject to trast. If you want to get this, contact to Edify.');
		}

		return Redirect::to('/subjects');
	}

}
