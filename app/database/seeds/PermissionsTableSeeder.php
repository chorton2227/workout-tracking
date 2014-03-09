<?php

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		// Permissions for managing users and roles
		$permissions = array(
			array(
				'name' => 'manage_users',
				'display_name' => 'manage users'
			),
			array(
				'name' => 'manage_roles',
				'display_name' => 'manage roles'
			),
		);

		DB::table('permissions')->delete();
		DB::table('permissions')->insert($permissions);

		// Add persmisions to 'admin' role
		$permissions = array(
			array(
				'role_id' => 1,
				'permission_id' => 1
			),
			array(
				'role_id' => 1,
				'permission_id' => 2
			),
		);

		DB::table('permission_role')->delete();
		DB::table('permission_role')->insert($permissions);
	}

}
