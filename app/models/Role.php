<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

	/**
	 * Returns ids of currenlty associated Permissions.
	 * Returns false if Permissions not found.
	 *
	 * @return array|bool
	 */
	public function getPermissionIds()
	{
		// Permissions not found, return false
		if ($this->perms()->count() == 0)
		{
			return false;
		}

		$permissionIds = array();

		foreach ($this->perms as $permission)
		{
			$permissionIds[] = $permission->id;
		}

		return $permissionIds;
	}

	/**
	 * Save/Update permissions, given ids.
	 * Detaches permissions if $permissions is empty.
	 *
	 * @param $permissions
	 */
	public function savePermissions($permissions)
	{
		if ( ! empty($permissions))
		{
			$this->perms()->sync($permissions);
		}
		else
		{
			$this->perms()->detach();
		}
	}

}