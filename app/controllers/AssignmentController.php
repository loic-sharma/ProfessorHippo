<?php

class AssignmentController extends BaseController {

	public function getIndex()
	{
		$assignments = Assignment::where('teacher_id', Auth::user()->id)->get();

		$this->layout->content = View::make('pages.assignment.home', compact('assignments'));
	}
}