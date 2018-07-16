<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		if(Auth::check()) {
			return View::make('user.index');
		} else {
			return View::make('login');
		}
	}

	public function about()
	{
		return View::make('about');
	}

	public function contact()
	{
		return View::make('contact');
	}
	
	public function login()
	{
		if(!Auth::check()) {
			return View::make('login');
		} else {
			return Redirect::to('/');
		}
	}

	public function login_action()
	{
		$input = Input::all();
		$values = array(
					'email' => 'required',
					'password' => 'required'
				);
		$validate = Validator::make($input, $values);

		if($validate->fails()) {
			return Redirect::to('/login')->withErrors($validate)->withInput(Input::except('password'));
		}
		else {
			$remember = (Input::has('remember')) ? true : false;
			$credentials = array('email' => $input['email'], 'password' => $input['password']);

			if(Auth::attempt($credentials, $remember)) {
				if(Session::has('log')) {
					Session::forget('log');
				}
				return Redirect::to('/');
			}
			else {
				Session::flash('message', 'Email or password is not found!');
				return Redirect::to('/login');
			}
		}
	}
	public function register()
	{
		if(!Auth::check()) {
			return View::make('register');
		} else {
			return Redirect::to('/');
		}
	}

	public function register_action()
	{
		$input = Input::all();
		$values = array(
					'first_name' => 'required',
					'last_name' => 'required',
					'email' => 'required|unique:users|email',
					'password' => 'required|min:8',
					're_password' => 'required|min:8|same:password',
					'institute_name' => 'required',
					'security_qstn' => 'required',
					'security_ans' => 'required'
				);

		$msg = [
				'first_name.required' 	=> 'Enter First Name!',
				'last_name.required' 	=> 'Enter Last Name!',
				'email.required' 		=> 'Enter Email Id!',
				'email.email' 			=> 'Enter a Valid Email Id!',
				'email.unique'			=> 'Email Id Already Taken!',
				'password.required' 	=> 'Enter Password!',
				'password.min' 			=> 'Password Must Be Atleast 8 Character Long!',
				're_password.required' 	=> 'Re Enter Your Password!',
				're_password.min'		=> 'Password Must Be Atleast 8 Character Long!',
				're_password.same' 		=> 'Password Mismatch!',
				'institute_name' 		=> 'Enter Your Institute Name!',
				'security_qstn' 		=> 'Select security question!',
				'security_ans' 			=> 'Enter security answer!'
		];
		$validator = Validator::make($input, $values, $msg);

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
		}
		else {
			$user = new User();
			$user->first_name = $input['first_name'];
			$user->last_name = $input['last_name'];
			$user->email = $input['email'];
			$user->password = Hash::make($input['password']);
			/*$user->security_qstn = Hash::make($input['security_qstn']);
			$user->security_ans = Hash::make($input['security_ans']);*/
			$user->security_qstn = $input['security_qstn'];
			$user->security_ans = $input['security_ans'];
			$user->institute_name = $input['institute_name'];
			$user->status = 1;
			$user->save();

			Auth::loginUsingId($user->user_id);
			return Redirect::to('/');
		}
	}


	public function forgot() {
		if(!Auth::check()) {
			return View::make('forgot');
		} else {
			return Redirect::to('/');
		}
	}


	public function forgot_action()
	{
		$input = Input::all();
		$values = array(
					'email' => 'required',
					'security_qstn' => 'required',
					'security_ans' => 'required'
				);
		$validate = Validator::make($input, $values);

		if($validate->fails()) {
			return Redirect::to('/forgot-password')->withErrors($validate);
		}
		else {

			$email = $input['email'];
			$security_qstn = $input['security_qstn'];
			$security_ans = $input['security_ans'];

			$user = User::where('email','=',$email)->where('security_qstn','=',$security_qstn)
													->where('security_ans','=',$security_ans)
													->first();
			if(!$user) {
				Session::flash('message', 'Email or security question or security Answer is not matched!');
				return Redirect::to('/forgot-password');
			}
			else {
				Auth::loginUsingId($user->user_id);
				Session::put('log', 'pass');
				return Redirect::to('/');
			}

		}
	}
	
}
