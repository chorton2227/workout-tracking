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

}