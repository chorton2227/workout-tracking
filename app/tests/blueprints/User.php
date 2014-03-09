<?php

use Woodling\Woodling;
use Carbon\Carbon;

Woodling::seed('Admin', array('class' => 'User', 'do' => function($blueprint)
{
	$blueprint->autoPurgeRedundantAttributes = true; // Fix saving problems
	$blueprint->username = 'admin';
	$blueprint->password = 'admin';
	$blueprint->password_confirmation = 'admin';
	$blueprint->email = 'admin@example.org';
	$blueprint->confirmation_code = str_random(40);
	$blueprint->confirmed = 1;
	$blueprint->created_at = Carbon::now();
	$blueprint->updated_at = Carbon::now()->addMonths(2);
}));

Woodling::seed('User', array('class' => 'User', 'do' => function($blueprint)
{
	$blueprint->autoPurgeRedundantAttributes = true; // Fix saving problems
	$blueprint->username = 'user';
	$blueprint->password = 'user';
	$blueprint->password_confirmation = 'user';
	$blueprint->email = 'user@example.org';
	$blueprint->confirmation_code = str_random(40);
	$blueprint->confirmed = 1;
	$blueprint->created_at = Carbon::now();
	$blueprint->updated_at = Carbon::now()->addMonths(2);
}));
