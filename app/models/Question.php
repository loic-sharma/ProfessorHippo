<?php

class Question extends Eloquent {

	public $table = 'questions';

	public function assignment()
	{
		return $this->belongsTo('Assignment');
	}

	public function teacher()
	{
		return $this->belongsTo('Teacher');
	}

	public function hints()
	{
		return $this->hasMany('Hint');
	}
}