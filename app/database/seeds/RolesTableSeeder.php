<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('roles')->delete();

		// Create admin role
		$adminRole = new Role;
		$adminRole->name = 'admin';
		$adminRole->save();

		// Attach admin role to admin user
		$user = User::where('username', '=', 'admin')->first();
		$user->attachRole($adminRole);
	}

}