<?php

use Woodling\Woodling;

Woodling::seed('RoleAdmin', array('class' => 'Role', 'do' => function($blueprint)
{
	$blueprint->id = 1;
	$blueprint->name = 'admin';
}));