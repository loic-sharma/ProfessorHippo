<?php

class Answer extends Eloquent {

	public $table = 'answers';

	public function assignment()
	{
		return $this->belongsTo('Assignment');
	}

	public function question()
	{
		return $this->belongsTo('Question');
	}

	public function teacher()
	{
		return $this->belongsTo('Teacher');
	}

	public function takeData($data)
	{
		return json_encode($data);
	}

	public function giveData($data)
	{
		return json_decode($data);
	}
}