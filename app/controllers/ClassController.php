<?php

class ClassController extends BaseController {

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
		if(Session::has('log')) {
			return Redirect::to('/change-pass');
		}
		else {									
			return View::make('classes.list')->with('classes', $classes);
		}
	}

	public function add()
	{
		$input = Input::all();
		$values = array(
					'cla_name' => 'required'
				);
		$validator = Validator::make($input, $values);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			$class = new Classes();
			$class->user_id = Auth::id();
			$class->cla_name = $input['cla_name'];
			$class->status = 1;
			$class->save();

			if(isset($input['token']) && $input['token'] == 'list') {
				return Redirect::back();
			} else {
				return Redirect::to('/start/'.rtrim(strtr(base64_encode($class->cla_id), '+/', '-_'), '='));
			}
		}
	}

	public function view($class)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$class = Classes::find($class);

		return View::make('classes.single')
							 ->with('class', $class);
	}

	public function edit($class)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$class = Classes::find($class);

		$input = Input::all();

		if($class->cla_name != $input['cla_name']) {
			$values = array(
						'cla_name' => 'required'
					);
			$validator = Validator::make($input, $values);

			if($validator->fails()) {
				return Redirect::back()->withErrors($validator)->withInput();
			}
			else {
				$item = Classes::find($class->cla_id);
				$item->cla_name = $input['cla_name'];
				$item->save();

				Session::flash('message', 'You have successfully updated to '.$input['cla_name']);
				return Redirect::to('/classes');
			}
		} else {
			Session::flash('message', 'You have successfully updated to '.$input['cla_name']);
			return Redirect::to('/classes');
		}
	}

	public function remove($class)
	{
		$class = base64_decode(str_pad(strtr($class, '-_', '+/'), strlen($class) % 4, '=', STR_PAD_RIGHT));
		$class = Classes::find($class);

		if(!empty($class)) {
			$item = Classes::find($class->cla_id);
			$item->status = 0;
			$item->save();

			Session::flash('message', 'You have successfully send a class to trast. If you want to get this, contact to Edify.');
		}

		return Redirect::to('/classes');
	}

}
