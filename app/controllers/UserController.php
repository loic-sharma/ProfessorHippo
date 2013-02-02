<?php

class UserController extends BaseController {

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
}