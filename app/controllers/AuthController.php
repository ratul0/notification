<?php

class AuthController extends \BaseController {

	public function home()
	{
		return View::make('public');
	}

	public function login()
	{
		return View::make('auth.login')
					->with('title', 'Login');
	}

	public function doLogin()
	{
		$rules = array
		(
					'email'    => 'required',
					'password' => 'required'
		);
		$allInput = Input::all();
		$validation = Validator::make($allInput, $rules);

		//dd($allInput);


		if ($validation->fails())
		{

			return Redirect::route('login')
						->withInput()
						->withErrors($validation);
		} else
		{

			$credentials = array
			(
						'email'    => Input::get('email'),
						'password' => Input::get('password')
			);

			if (Auth::attempt($credentials))
			{
				return Redirect::intended('dashboard');
			} else
			{
				return Redirect::route('login')
							->withInput()
							->withErrors('Error in Email Address or Password.');
			}
		}
	}

	public function logout(){
		Auth::logout();

		return Redirect::route('login')
					->with('success','You are Successfully logged out.');
	}

	public function register(){
		return View::make('auth.register')
					->with('title','Register');
	}

	public function doRegister(){
		$rules = [
					'full_name'                  => 'required',
					'mobile'             =>      'required|regex:/^01[0-9]{9}/|unique:users,mobile',
					'email'                 => 'required|email|unique:users,email',
					'password'              => 'required|confirmed',
					'password_confirmation' => 'required'
		];

		$data = Input::all();

		$validation = Validator::make($data,$rules);

		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}else{

			$user = new User();
			$user->full_name = $data['full_name'];
			$user->mobile = $data['mobile'];

			$user->email = $data['email'];
			$user->password = Hash::make($data['password']);

			$role = Role::find($data['user_type']);

			if($user->save()){
				$user->attachRole($role);
				return Redirect::route('login')
							->with('success',"Account Created Successfully.Login Now.");
			}else{
				return Redirect::back()
							->with('error',"something went wrong! Try again.")
							->withInput();
			}
		}

	}

	public function resetPassword(){
		return View::make('auth.passwordReset')
					->with('title', 'Password Reset');
	}

	public function doPasswordReset(){
		$rules = [
					'currentPassword'                  => 'required',
					'password'              => 'required|confirmed',
					'password_confirmation' => 'required'
		];

		$data = Input::all();

		$validation = Validator::make($data,$rules);


		if ($validation->fails())
		{

			return Redirect::route('passwordReset')
						->withErrors($validation);
		} else
		{

			$credentials = array
			(
						'email'    => Auth::user()->email,
						'password' => $data['currentPassword']
			);

			if (Auth::validate($credentials))
			{
				$user = User::find(Auth::user()->id);
				$user->password = Hash::make($data['password']);

				if($user->save()){
					Auth::logout();

					return Redirect::route('login')
								->with('success','Your password updated Successfully.');
				}else{
					return Redirect::route('passwordReset')
								->with('error','Something went wrong.');
				}

			}
			else
			{
				return Redirect::route('passwordReset')
							->withErrors('Error in current Password.');
			}
		}

	}

}