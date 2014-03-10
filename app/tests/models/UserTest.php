<?php

use Woodling\Woodling;

class UserTest extends TestCase {

	/**
	 * Test Woodling fixture for admin.
	 */
	public function testAdminFixture()
	{
		$user = Woodling::retrieve('Admin');
		$this->assertEquals($user->username, 'admin');
	}

	/**
	 * Make sure the delete method removes all asigned roles for the user.
	 */
	public function testDeleteAssignedRoles()
	{
		$user = Woodling::saved('Admin');
		$role = Woodling::saved('RoleAdmin');
		$role_ids = array($role->id);
		$user_id = $user->id;

		// Role association
		$user->roles()->sync($role_ids);

		// Check AssignedRoles before deletion
		$this->assertEquals(1, AssignedRoles::where('user_id', $user_id)->count());

		// User should delete successfully
		$this->assertTrue($user->delete());

		// Deleted User should not have any AssignedRoles
		$this->assertEquals(0, AssignedRoles::where('user_id', $user_id)->count());
	}

	/**
	 * Test method getRoleIds.
	 * Should return associated role ids in an array.
	 */
	public function testGetRoleIds()
	{
		$user = Woodling::saved('Admin');
		$role = Woodling::saved('RoleAdmin');
		$role_ids = array($role->id);

		// Role association
		$user->roles()->sync($role_ids);

		// Method getRoleIds should match array of role ids
		$this->assertEquals($role_ids, $user->getRoleIds());
	}

	/**
	 * Test method getRoleIds.
	 * Should return false if no roles are associated.
	 */
	public function testGetRoleIdsEmpty()
	{
		$user = Woodling::saved('Admin');

		// No roles added, getRoleIds should return false
		$this->assertFalse($user->getRoleIds());
	}

	/**
	 * Test method saveRoles.
	 * Should save role association.
	 */
	public function testSaveRoles()
	{
		$user = Woodling::saved('Admin');
		$role = Woodling::saved('RoleAdmin');
		$role_ids = array($role->id);
		$user_id = $user->id;

		// Role association
		$user->saveRoles($role_ids);

		// Should have 1 role saved
		$this->assertEquals(1, $user->roles()->count());
	}

	/**
	 * Test method saveRoles.
	 * Should remove associations.
	 */
	public function testSaveRolesEmpty()
	{
		$user = Woodling::saved('Admin');
		$role = Woodling::saved('RoleAdmin');
		$role_ids = array($role->id);
		$user_id = $user->id;

		// Role association
		$user->saveRoles($role_ids);

		// Should have 1 role saved
		$this->assertEquals(1, $user->roles()->count());

		// Remove role association
		$user->saveRoles(array());

		// Role should have been removed
		$this->assertEquals(0, $user->roles()->count());
	}

	/**
	 * Test routine association.
	 */
	public function testRoutineAssociation()
	{
		$user = Woodling::saved('User');
		$routine = Woodling::retrieve('Routine');
		$user->routines()->save($routine);

		// Check if routine was saved
		$this->assertEquals(1, $user->routines()->count());
	}

	/**
	 * Test what happens to routine associations when user is deleted.
	 * Routines should be deleted with the user.
	 */
	public function testDeleteRoutineAssociation()
	{
		$user = Woodling::saved('User');
		$routine = Woodling::retrieve('Routine');
		$user->routines()->save($routine);
		$user_id = $user->id;

		// Check if routine was saved
		$this->assertEquals(1, $user->routines()->count());

		// User should delete successfully
		$this->assertTrue($user->delete());

		// Deleted User should not have any routines
		$this->assertEquals(0, Routine::where('user_id', $user_id)->count());
	}

}
