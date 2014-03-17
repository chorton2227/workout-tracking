<?php

class Routine extends \LaravelBook\Ardent\Ardent {

	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'name' => 'required',
	);

	/**
	 * Association to User Model.
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Association to Exercise Model.
	 */
	public function exercises()
	{
		return $this->hasMany('Exercise');
	}

	/**
	 * Association to Workout Model.
	 */
	public function workouts()
	{
		return $this->hasMany('Workout');
	}

	/**
	 * Delete the model from the database.
	 *
	 * @uses Exercise::where
	 * @uses Workout::where
	 * @return bool|null
	 */
	public function delete()
	{
		// Delete all exercises
		Exercise::where('routine_id', $this->id)->delete();

		// Delete all workouts
		Workout::where('routine_id', $this->id)->delete();

		// Delete the routine
		return parent::delete();
	}

}