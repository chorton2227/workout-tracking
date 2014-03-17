<?php

class ExerciseLog extends \LaravelBook\Ardent\Ardent {

	protected $guarded = array();

	public static $rules = array(
		'exercise_id' => 'required',
		'workout_id' => 'required',
		'sets' => 'required|integer|min:1',
		'reps' => 'required|integer|min:1',
		'weight' => 'required|integer|min:0',
	);

	/**
	 * Association to Exercise Model.
	 */
	public function exercise()
	{
		return $this->belongsTo('Exercise');
	}

	/**
	 * Association to Workout Model.
	 */
	public function workout()
	{
		return $this->belongsTo('Workout');
	}

}