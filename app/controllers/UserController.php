<?php

class UserController extends BaseController {

	/**
	 * Display the register form.
	 *
	 * @return void
	 */
	public function getRegister()
	{
		$this->addBreadcrumb('Register');

		$this->layout->content = View::make('pages.user.register');
	}

	/**
	 * Attempt to register the user.
	 *
	 * @return RedirectReponse
	 */
	public function postRegister()
	{
		$form = Validator::make(Input::all(), array(
			'email'    => array('required', 'email', 'unique:teachers'),
			'password' => array('required', 'confirmed'),
		));

		if($form->passes())
		{
			$credentials = array(
				'email'    => Input::get('email'),
				'password' => Input::get('password'),
			);

			$teacher = new Teacher($credentials);

			$teacher->save();

			Auth::login($teacher);

			return Redirect::to('assignments');
		}

		else
		{
			$errors = $form->errors();
		}

		return Redirect::back()->withInput()
				->withErrors($errors);
	}


	/**
	 * Display the login form.
	 *
	 * @return void
	 */
	public function getLogin()
	{
		$this->addBreadcrumb('Login');

		$this->layout->content = View::make('pages.user.login');
	}

	/**
	 * Attempt to log the user in.
	 *
	 * @return RedirectReponse
	 */
	public function postLogin()
	{
		$form = Validator::make(Input::all(), array(
			'email'    => array('required', 'email'),
			'password' => array('required'),
		));

		if($form->passes())
		{
			$email    = Input::get('email');
			$password = Input::get('password');

			if(Auth::attempt(compact('email', 'password')))
			{
				return Redirect::to('assignments');
			}

			else
			{
				$errors = Error::make('Invalid email/password combination.');
			}
		}

		else
		{
			$errors = $form->errors();
		}

		return Redirect::back()->withInput()
				->withErrors($errors);
	}

	/**
	 * Log the user out.
	 *
	 * @return RedirectResponse
	 */
	public function getLogout()
	{
		Auth::logout();

		return Redirect::to('login');
	}
}