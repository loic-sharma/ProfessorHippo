<?php

class Assignment extends Eloquent {

	public $table = 'assignments';

	public function teacher()
	{
		return $this->belongsTo('Teacher');
	}

	public function questions()
	{
		return $this->hasMany('Question');
	}
}