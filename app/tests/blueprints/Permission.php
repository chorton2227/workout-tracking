<?php

use Woodling\Woodling;

Woodling::seed('manage_users', array('class' => 'Permission', 'do' => function($blueprint)
{
	$blueprint->id = 1;
	$blueprint->name = 'manage_users';
	$blueprint->display_name = 'manage users';
}));

Woodling::seed('manage_roles', array('class' => 'Permission', 'do' => function($blueprint)
{
	$blueprint->id = 2;
	$blueprint->name = 'manage_roles';
	$blueprint->display_name = 'manage roles';
}));