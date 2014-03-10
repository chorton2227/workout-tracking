<?php

class Routine extends \Eloquent {

	protected $guarded = array();

	public static $rules = array();

	/**
	 * Association to User Model.
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

}