<?php

use Woodling\Woodling;

Woodling::seed('ExerciseLog', array('class' => 'ExerciseLog', 'do' => function($blueprint)
{
	$blueprint->sequence('id', function($i)
	{
		return $i;
	});
	$blueprint->sets = 3;
	$blueprint->reps = 5;
	$blueprint->weight = 100;
	$blueprint->created_at = Carbon::now();
	$blueprint->updated_at = Carbon::now()->addMonths(2);
	$blueprint->exercise_id = function() { return Woodling::saved('Exercise')->id; };
	$blueprint->workout_id = function() { return Woodling::saved('Workout')->id; };
}));