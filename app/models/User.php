<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;

class User extends ConfideUser {

	use HasRole;

	/**
	 * Association to Routine Model.
	 */
	public function routines()
	{
		return $this->hasMany('Routine');
	}


	/**
	 * Association to WeightLog Model.
	 */
	public function weight_logs()
	{
		return $this->hasMany('WeightLog');
	}

	/**
	 * Delete the model from the database.
	 *
	 * @uses AssignedRoles::where
	 * @return bool|null
	 */
	public function delete()
	{
		// Delete all assigned roles 
		AssignedRoles::where('user_id', $this->id)->delete();

		// Delete all routines
		Routine::where('user_id', $this->id)->delete();

		// Delete the user
		return parent::delete();
	}

	/**
	 * Get readable join date.
	 *
	 * @uses Carbon::createFromFormat
	 * @uses Carbon::diffForHumans
	 * @return object
	 */
	public function getJoinDate()
	{
		return Carbon::createFromFormat('Y-n-j G:i:s', $this->created_at)->diffForHumans();
	}

	/**
	 * Returns ids of currenlty associated Roles.
	 * Returns false if Roles not found.
	 *
	 * @return array|bool
	 */
	public function getRoleIds()
	{
		// Roles not found, return false
		if ($this->roles()->count() == 0)
		{
			return false;
		}

		$roleIds = array();

		foreach ($this->roles as $role)
		{
			$roleIds[] = $role->id;
		}

		return $roleIds;
	}

	/**
	 * Save/Update roles, given ids.
	 * Detaches roles if $roles is empty.
	 *
	 * @param $roles
	 */
	public function saveRoles($roles)
	{
		if ( ! empty($roles))
		{
			$this->roles()->sync($roles);
		}
		else
		{
			$this->roles()->detach();
		}
	}
	
}