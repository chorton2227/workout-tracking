<?php

class Exercise extends \LaravelBook\Ardent\Ardent {

	protected $guarded = array();

	public static $rules = array(
		'routine_id' => 'required',
		'name' => 'required',
	);

	/**
	 * Association to Routine Model.
	 */
	public function routine()
	{
		return $this->belongsTo('Routine');
	}

	/**
	 * Association to ExerciseLog Model.
	 */
	public function exercise_logs()
	{
		return $this->hasMany('ExerciseLog');
	}

}