<?php

class ExerciseLogsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('exercise_logs')->delete();

		$workouts = Workout::all();
		$exercise_logs = array();

		foreach ($workouts as $workout)
		{
			foreach ($workout->routine->exercises as $exercise)
			{
				$exercise_logs[] = array(
					'exercise_id' => $exercise->id,
					'workout_id' => $workout->id,
					'sets' => 3,
					'reps' => 5,
					'weight' => 100,
					'created_at' => new DateTime,
					'updated_at' => new DateTime
				);
			}
		}

		DB::table('exercise_logs')->insert($exercise_logs);
	}

}