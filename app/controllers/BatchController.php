<?php

class BatchController extends BaseController {

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
		$batches = Batch::where('user_id', Auth::id())
										->where('status', 1)
										->get();
		$classes = Classes::where('user_id', Auth::id())
											->where('status', 1)
											->get();
		if(Session::has('log')) {
			return Redirect::to('/change-pass');
		}
		else {									
			return View::make('batches.list')->with('batches', $batches)->with('classes', $classes);
		}
	}

	public function add()
	{
		$input = Input::all();
		$values = array(
					'bach_name' => 'required',
					'cla_id' => 'required'
				);
		$validator = Validator::make($input, $values);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			$batch = new Batch();
			$batch->user_id = Auth::id();
			$batch->cla_id = $input['cla_id'];
			$batch->bach_name = $input['bach_name'];
			$batch->status = 1;
			$batch->save();

			if(isset($input['token']) && $input['token'] == 'list') {
				return Redirect::back();
			} else {
				return Redirect::to('/start/'.rtrim(strtr(base64_encode($batch->cla_id), '+/', '-_'), '=').'/'.rtrim(strtr(base64_encode($batch->bach_id), '+/', '-_'), '='));
			}
		}
	}

	public function view($batch)
	{
		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));
		$batch = Batch::find($batch);

		return View::make('batches.single')->with('batch', $batch);
	}

	public function edit($batch)
	{
		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));

		$input = Input::all();

		$values = array(
					'bach_name' => 'required'
				);
		$validator = Validator::make($input, $values);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			$item = Batch::find($batch);
			$item->bach_name = $input['bach_name'];
			$item->save();

			Session::flash('message', 'You have successfully updated to '.$input['bach_name']);
			return Redirect::to('/batches');
		}
	}

	public function remove($batch) {
		$batch = base64_decode(str_pad(strtr($batch, '-_', '+/'), strlen($batch) % 4, '=', STR_PAD_RIGHT));
		$batch = Batch::find($batch);

		if(!empty($batch)) {
			$item = Batch::find($batch->bach_id);
			$item->status = 0;
			$item->save();

			Session::flash('message', 'You have successfully send a batch to trast. If you want to get this, contact to Edify.');
		}

		return Redirect::to('/batches');
	}

}
