<?php

class WeightLogsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('weight_logs')->delete();

		$user_id = User::where('username', '=', 'user')->first()->id;
		$weight_logs = array();
		$start_week = 100;

		foreach (range(1, 100) as $index)
		{
			$current_week = $start_week - $index;
			$date = new DateTime();
			$date->modify("-$current_week week");
			
			$weight_logs[] = array(
				'user_id' => $user_id,
				'weight' => 300 - $index,
				'weigh_date' => $date,
				'notes' => "Note $index",
				'created_at' => $date,
				'updated_at' => $date
			);
		}

		DB::table('weight_logs')->insert($weight_logs);
	}

}