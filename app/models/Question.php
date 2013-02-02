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

	public function takeData($data)
	{
		$this->attributes['data'] = json_encode($data);
	}

	public function giveData($data)
	{
		return json_decode($data);
	}
}