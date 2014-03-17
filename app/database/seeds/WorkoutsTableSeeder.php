<?php

class WorkoutsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('workouts')->delete();

		$routine_a_id = Routine::where('name', '=', 'Workout Routine A')->first()->id;
		$routine_b_id = Routine::where('name', '=', 'Workout Routine B')->first()->id;

		DB::table('workouts')->insert(array(
			array(
				'routine_id' => $routine_a_id,
				'workout_date' => new DateTime,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'routine_id' => $routine_a_id,
				'workout_date' => new DateTime,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'routine_id' => $routine_b_id,
				'workout_date' => new DateTime,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'routine_id' => $routine_b_id,
				'workout_date' => new DateTime,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
		));
	}

}