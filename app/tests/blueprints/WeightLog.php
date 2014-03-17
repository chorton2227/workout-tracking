<?php

use Woodling\Woodling;

Woodling::seed('WeightLog', array('class' => 'WeightLog', 'do' => function($blueprint)
{
	$blueprint->sequence('id', function($i)
	{
		return $i;
	});
	$blueprint->sequence('weight', function($i)
	{
		return $i;
	});
	$blueprint->sequence('notes', function($i)
	{
		return "Weight Log $i";
	});
	$blueprint->weigh_date = Carbon::now();
	$blueprint->created_at = Carbon::now();
	$blueprint->updated_at = Carbon::now()->addMonths(2);
	$blueprint->user_id = function() { return Woodling::saved('User')->id; };
}));