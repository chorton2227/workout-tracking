<?php

class RoutinesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('routines')->delete();

		$user_id = User::where('username', '=', 'user')->first()->id;

		DB::table('routines')->insert(array(
			array(
				'user_id' => $user_id,
				'name' => 'Workout Routine A',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'user_id' => $user_id,
				'name' => 'Workout Routine B',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
		));
	}

}