<?php

class Hint extends Eloquent {

	public $table = 'hints';

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
}