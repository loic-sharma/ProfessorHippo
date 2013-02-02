<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');

Route::get('/get', function()
{
	return json_encode(array('some' => 'data'));
});

Route::post('/post', function()
{
	$teacher = new Teacher;

	$teacher->save();

	return json_encode(Input::all());
});

Route::get('api/teacher/{id}', function($id)
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
});

Route::get('api/assignment/{id}', function($id)
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
});

Route::get('api/question/{id}', function($id)
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
});

Route::get('api/hint/{id}', function($id)
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
});

Route::post('api/question/{id}/answer', function($id))
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

	return json_encode(array('error' => 'Question #'.$id. ' does not exist.');
}

Route::get('api/answer/{id}', function($id)
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
});