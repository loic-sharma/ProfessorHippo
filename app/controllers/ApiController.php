<?php

class ApiController extends Controller {

	/**
	 * Get a specific teacher.
	 *
	 * @param  int     $id
	 * @return string
	 */
	public function getTeacher($id)
	{
		$teacher = Teacher::with('assignments')->find($id);

		if( ! is_null($teacher))
		{
			return $teacher;
		}

		else
		{
			return json_encode(array('error' => 'Teacher #'.$id.' does not exist.'));
		}
	}

	/**
	 * Get a specific assignment.
	 *
	 * @param  int     $id
	 * @return string
	 */
	public function anyAssignment($id)
	{
		$assignment = Assignment::with(array('teacher', 'questions'))->find($id);

		if( ! is_null($assignment))
		{
			return $assignment;
		}

		else
		{
			return json_encode(array('error' => 'Assignment #'.$id.' does not exist.'));
		}
	}

	/**
	 * Get a specific question.
	 *
	 * @param  int     $id
	 * @return string
	 */
	public function getQuestion($id)
	{
		$question = Question::with(array('assignment', 'hints'))->find($id);

		if( ! is_null($question))
		{
			return $question;
		}

		else
		{
			return json_encode(array('error' => 'Question #'.$id.' does not exist.'));
		}
	}

	/**
	 * Get a specific question.
	 *
	 * @param  int     $id
	 * @return string
	 */
	public function getHint($id)
	{
		$hint = Hint::with(array('assignment', 'question'))->find($id);

		if( ! is_null($hint))
		{
			return $hint;
		}

		else
		{
			return json_encode(array('error' => 'Hint #'.$id.' does not exist.'));
		}
	}

	/**
	 * Post a new answer to a question.
	 *
	 * @param  int     $id
	 * @return string
	 */
	public function postAnswer($id)
	{
		$question = Question::find($id);

		if( ! is_null($question))
		{
			$answer = new Anwer;

			$answer->assignment_id = $question->assignment_id;
			$answer->question_id = $question->id;
			$answer->teacher_id = $question->teacher_id;
			$answer->data = Input::all();

			$answer->save();

			return json_encode(array('message' => 'Saved answer.'));
		}

		return json_encode(array('error' => 'Question #'.$id. ' does not exist.'));
	}

	/**
	 * Get a specific answer.
	 *
	 * @param  int     $id
	 * @return string
	 */
	public function getAnswer($id)
	{
		$answer = Answer::with(array('assignment', 'question'))->find($id);

		if( ! is_null($answer))
		{
			return $answer;
		}

		else
		{
			return json_encode(array('error' => 'Answer #'.$id.' does not exist.'));
		}
	}
}