<?php

use Woodling\Woodling;

Woodling::seed('Exercise', array('class' => 'Exercise', 'do' => function($blueprint)
{
	$blueprint->sequence('id', function($i)
	{
		return $i;
	});
	$blueprint->sequence('name', function($i)
	{
		return "Exercise $i";
	});
	$blueprint->description = 'Exercise Description';
	$blueprint->notes = 'Exercise Notes';
	$blueprint->created_at = Carbon::now();
	$blueprint->updated_at = Carbon::now()->addMonths(2);
	$blueprint->routine_id = function() { return Woodling::saved('Routine')->id; };
}));