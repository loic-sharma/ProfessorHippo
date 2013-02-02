<?php

class AssignmentsController extends BaseController {

	public function getIndex()
	{
		$assignments = Assignment::where('teacher_id', Auth::user()->id)->get();

		$this->layout->content = View::make('pages.assignments.home', compact('assignments'));
	}

	public function getCreate()
	{
		$assignment = new Assignment;

		$this->layout->content = View::make('pages.assignments.assignment', compact('assignment'));
	}

	public function postCreate()
	{
		$form = Validator::make(Input::all(), array(
			'name' => 'required',
		));

		if($form->passes())
		{
			$assignment = new Assignment;

			$assignment->teacher_id = Auth::user()->id;
			$assignment->name = Input::get('name');

			$assignment->save();

			return Redirect::to('assignments');
		}

		else
		{
			return Redirect::to('assignments/create')
					->withInput()
					->withErrors($form);
		}
	}
}