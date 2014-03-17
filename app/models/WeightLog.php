<?php

class WeightLog extends \LaravelBook\Ardent\Ardent {

	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'weight' => 'required|integer|min:1|regex:/^\d*\.?\d*$/',
		'weigh_date' => 'required|date',
	);

	/**
	 * Association to User Model.
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

}