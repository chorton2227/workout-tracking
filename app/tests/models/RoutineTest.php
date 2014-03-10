<?php

use Woodling\Woodling;

class RoutineTest extends TestCase {

	/**
	 * Test Woodling fixture for admin.
	 */
	public function testRoutineFixture()
	{
		$routine = Woodling::retrieve('Routine');
		$this->assertEquals($routine->name, 'Workout Routine 1');
	}

}
