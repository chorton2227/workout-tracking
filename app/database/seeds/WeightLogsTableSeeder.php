<?php

class WeightLogsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('weight_logs')->delete();

		$user_id = User::where('username', '=', 'user')->first()->id;
		$weight_logs = array();
		$start_weight = 9.9;

		foreach (range(0, $start_weight - 1, 0.1) as $index)
		{
			$current_weight = $start_weight - $index;
			$current_day = $current_weight * 10;

			$date = new DateTime();
			$date->modify("-$current_day day");
			
			$weight_logs[] = array(
				'user_id' => $user_id,
				'weight' => $current_weight,
				'weigh_date' => $date,
				'notes' => "Note $index",
				'created_at' => $date,
				'updated_at' => $date
			);
		}

		DB::table('weight_logs')->insert($weight_logs);
	}

}