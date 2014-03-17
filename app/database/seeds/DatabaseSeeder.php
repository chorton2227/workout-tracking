<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('RoutinesTableSeeder');
		$this->call('ExercisesTableSeeder');
		$this->call('WorkoutsTableSeeder');
		$this->call('ExerciseLogsTableSeeder');
		$this->call('WeightLogsTableSeeder');
	}

}