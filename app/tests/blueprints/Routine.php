<?php

use Woodling\Woodling;

Woodling::seed('Routine', array('class' => 'Routine', 'do' => function($blueprint)
{
	$blueprint->sequence('id', function($i)
	{
		return $i;
	});
	$blueprint->sequence('name', function($i)
	{
		return "Workout Routine $i";
	});
	$blueprint->created_at = Carbon::now();
	$blueprint->updated_at = Carbon::now()->addMonths(2);
}));