<?php

use Woodling\Woodling;

class WorkoutTest extends TestCase {

	public function testFixture()
	{
		$workout = Woodling::retrieve('Workout');
		$this->assertTrue($workout->save());
	}

	public function testHasId()
	{
		$workout = new Workout;
		$workout->id = 5;
		$this->assertEquals(5, $workout->id);
	}

	public function testHasRoutineId()
	{
		$workout = new Workout;
		$workout->routine_id = 5;
		$this->assertEquals(5, $workout->routine_id);
	}

	public function testRequiresRoutineAssociation()
	{
		$workout = Woodling::retrieve('Workout');
		$workout->routine_id = null;
		$this->assertFalse($workout->save());
	}

	public function testRoutineAssociation()
	{
		$workout = Woodling::saved('Workout');
		$routine = Routine::find($workout->routine->id);
		$this->assertEquals($workout->routine->name, $routine->name);
	}

	public function testHasWorkoutDate()
	{
		$workout = new Workout;
		$workout->workout_date = '2014-03-10';
		$this->assertEquals('2014-03-10', $workout->workout_date);
	}

	public function testRequiresWorkoutDate()
	{
		$workout = Woodling::retrieve('Workout');
		$workout->workout_date = null;
		$this->assertFalse($workout->save());
	}

	public function testWorkoutDateMustBeValidDate()
	{
		$workout = Woodling::retrieve('Workout');
		$workout->workout_date = 'invalid date';
		$this->assertFalse($workout->save());
	}

	public function testHasCreatedAt()
	{
		$workout = new Workout;
		$workout->created_at = strtotime('2014-03-10 23:38:42');
		$this->assertEquals('2014-03-10 23:38:42', $workout->created_at);
	}

	public function testHasUpdatedAt()
	{
		$workout = new Workout;
		$workout->updated_at = strtotime('2014-03-10 23:38:42');
		$this->assertEquals('2014-03-10 23:38:42', $workout->updated_at);
	}

}
