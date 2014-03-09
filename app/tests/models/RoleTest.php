<?php

use Woodling\Woodling;

class RoleTest extends TestCase {

	/**
	 * Test Woodling fixture for role admin.
	 */
	public function testRoleAdminFixture()
	{
		$role = Woodling::retrieve('RoleAdmin');
		$this->assertEquals($role->name, 'admin');
	}

	/**
	 * Test method getPermissionIds.
	 * Should return associated permission ids in an array.
	 */
	public function testGetPermissionIds()
	{
		$role = Woodling::saved('RoleAdmin');
		$permission_users = Woodling::saved('manage_users');
		$permission_roles = Woodling::saved('manage_roles');
		$permission_ids = array($permission_users->id, $permission_roles->id);

		// Permission association
		$role->perms()->sync($permission_ids);

		// Method getPermissionIds should match array of permission ids
		$this->assertEquals($permission_ids, $role->getPermissionIds());
	}

	/**
	 * Test method getPermissionIds.
	 * Should return false if no permissions are associated.
	 */
	public function testGetPermissionIdsEmpty()
	{
		$role = Woodling::saved('RoleAdmin');

		// No permissions added, getPermissionIds should return false
		$this->assertFalse($role->getPermissionIds());
	}

	/**
	 * Test method savePermissions.
	 * Should save permission associations.
	 */
	public function testSavePermissions()
	{
		$role = Woodling::saved('RoleAdmin');
		$permission_users = Woodling::saved('manage_users');
		$permission_roles = Woodling::saved('manage_roles');
		$permission_ids = array($permission_users->id, $permission_roles->id);

		// Permission association
		$role->savePermissions($permission_ids);

		// Should have 2 permissions saved
		$this->assertEquals(2, $role->perms()->count());
	}

	/**
	 * Test method savePermissions.
	 * Should remove permission associations.
	 */
	public function testSavePermissionsEmpty()
	{
		$role = Woodling::saved('RoleAdmin');
		$permission_users = Woodling::saved('manage_users');
		$permission_roles = Woodling::saved('manage_roles');
		$permission_ids = array($permission_users->id, $permission_roles->id);

		// Permission association
		$role->savePermissions($permission_ids);

		// Should have 2 permissions saved
		$this->assertEquals(2, $role->perms()->count());

		// Remove permission association
		$role->savePermissions(array());

		// Permissions should have been removed
		$this->assertEquals(0, $role->perms()->count());
	}

}
