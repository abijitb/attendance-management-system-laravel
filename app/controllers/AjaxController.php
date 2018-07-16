<?php

class AjaxController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('@filterRequests');
	}

	public function filterRequests()
	{
		if(!Auth::check()) {
			return Redirect::to('login');
		}
	}

	public function get_batchs()
	{
		$input = Input::all();
		$values = array(
					'cla_id' => 'required'
				);
		$validator = Validator::make($input, $values);

		if($validator->fails()) {
			//return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			$batches = Batch::where('user_id', Auth::id())
											->where('cla_id', $input['cla_id'])
											->where('status', 1)
											->get();
			$html = '';
			foreach ($batches as $batch) {
				$html .= '
									<option value="'.$batch->bach_id.'">'.$batch->bach_name.'</option>
								';
			}

			return $html;
		}
	}

}
