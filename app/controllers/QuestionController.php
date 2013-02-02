<?php

class QuestionController extends BaseController {

	public function getCreate($id)
	{
		$question = new Question;

		$this->addBreadcrumb('Assignments', 'assignments');
		$this->addBreadcrumb('Edit Assignment', 'assignments/edit/'.$id);
		$this->addBreadcrumb('Add Question');

		$this->layout->content = View::make('pages.questions.question', compact('question'));
	}

	public function postCreate($id)
	{
		$form = Validator::make(Input::all(), array(
			'question' => 'required',
			'type' => 'required',
		));

		if($form->passes())
		{
			$assignment = Assignment::where('teacher_id', Auth::user()->id)
							->find($id);

			if( ! is_null($assignment))
			{
				$text = Input::get('question');
				$type = Input::get('type');
				$data = array();

				if($type == 'multiple')
				{
					$answer = substr(Input::get('radio-answer'), 7);

					// Let's search through the input and find the 
					// the answer choices.
					$answers = array();

					foreach(Input::all() as $name => $value)
					{
						if(strpos($name, 'radio-answer-') === 0)
						{
							$answers[substr($name, 13)] = $value;
						}
					}

					$data = compact('answer', 'answers');
				}

				elseif($type == 'checkboxes')
				{
					$answer = substr(Input::get('checkbox-answer'), 7);

					// Let's search through the input and find the answer choices.
					$answers = array();

					foreach(Input::all() as $name => $value)
					{
						if(strpos($name, 'checkbox-answer-') === 0)
						{
							$answers[substr($name, 16)] = $value;
						}
					}

					$data = compact('answer', 'answers');
				}

				elseif($type == 'short')
				{
					$data = array('answer' => Input::get('answer'));
				}

				$question = new Question;

				$question->teacher_id = $assignment->teacher_id;
				$question->assignment_id = $assignment->id;
				$question->text = $text;
				$question->type = $type;
				$question->data = $data;

				$question->save();

				return Redirect::to('assignments/edit/'.$assignment->id);
			}
		}

		else
		{
			return Redirect::to('assignment/'.$id.'/create')
					->withInput()
					->withErrors($form);
		}
	}

	public function getEdit($id)
	{
		$assignment = Assignment::where('teacher_id', Auth::user()->id)
						->where('id', $id)
						->first();

		if( ! is_null($assignment))
		{
			$this->layout->content = View::make('pages.assignments.assignment', compact('assignment'));
		}

		else
		{
			return Redirect::to('assignments');
		}
	}

	public function getDelete($assignmentId, $questionId)
	{
		$question = Question::where('teacher_id', Auth::user()->id)
						->where('id', $questionId)
						->first();

		if( ! is_null($question))
		{
			$question->delete();
		}

		return Redirect::to('assignments/edit/'.$assignmentId);
	}
}