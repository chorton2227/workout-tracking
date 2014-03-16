<?php

use Woodling\Woodling;

Woodling::seed('Workout', array('class' => 'Workout', 'do' => function($blueprint)
{
	$blueprint->sequence('id', function($i)
	{
		return $i;
	});
	$blueprint->workout_date = Carbon::now();
	$blueprint->created_at = Carbon::now();
	$blueprint->updated_at = Carbon::now()->addMonths(2);
	$blueprint->routine_id = function() { return Woodling::saved('Routine')->id; };
}));