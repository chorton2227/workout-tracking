<?php

use Woodling\Woodling;
use Carbon\Carbon;

Woodling::seed('User', array('class' => 'User', 'do' => function($blueprint)
{
	$blueprint->autoPurgeRedundantAttributes = true; // Fix saving problems
	$blueprint->sequence('username', function($i)
	{
		return "user$i";
	});
	$blueprint->sequence('email', function($i)
	{
		return "user$i@example.com";
	});
	$blueprint->password = 'password';
	$blueprint->password_confirmation = 'password';
	$blueprint->confirmation_code = str_random(40);
	$blueprint->confirmed = 1;
	$blueprint->created_at = Carbon::now();
	$blueprint->updated_at = Carbon::now()->addMonths(2);
}));
