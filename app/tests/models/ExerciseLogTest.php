<?php

use Woodling\Woodling;

class ExerciseLogTest extends TestCase {

	public function testHasId()
	{
		$exercise_log = new ExerciseLog;
		$exercise_log->id = 5;
		$this->assertEquals(5, $exercise_log->id);
	}

	public function testHasExerciseId()
	{
		$exercise_log = new ExerciseLog;
		$exercise_log->exercise_id = 5;
		$this->assertEquals(5, $exercise_log->exercise_id);
	}

	public function testRequireExerciseAssociation()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->exercise_id = null;
		$this->assertFalse($exercise_log->save());
	}

	public function testExerciseAssociation()
	{
		$exercise_log = Woodling::saved('ExerciseLog');
		$exercise = Exercise::find($exercise_log->exercise->id);
		$this->assertEquals($exercise_log->exercise->name, $exercise->name);
	}

	public function testHasWorkoutId()
	{
		$exercise_log = new ExerciseLog;
		$exercise_log->workout_id = 5;
		$this->assertEquals(5, $exercise_log->workout_id);
	}

	public function testRequireWorkoutAssociation()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->workout_id = null;
		$this->assertFalse($exercise_log->save());
	}

	public function testWorkoutAssociation()
	{
		$exercise_log = Woodling::saved('ExerciseLog');
		$workout = Workout::find($exercise_log->workout->id);
		$this->assertEquals($exercise_log->workout->name, $workout->name);
	}

	public function testHasSets()
	{
		$exercise_log = new ExerciseLog;
		$exercise_log->sets = 5;
		$this->assertEquals(5, $exercise_log->sets);
	}

	public function testSetsIsInteger()
	{
		$exercise_log = new ExerciseLog;
		$exercise_log->sets = 'invalid set';
		$this->assertFalse($exercise_log->save());
	}

	public function testPositiveSets()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->sets = 5;
		$this->assertTrue($exercise_log->save());
	}

	public function testZeroSets()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->sets = 0;
		$this->assertFalse($exercise_log->save());
	}

	public function testNegativeSets()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->sets = -5;
		$this->assertFalse($exercise_log->save());
	}

	public function testRequiresSets()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->sets = '';
		$this->assertFalse($exercise_log->save());
	}

	public function testHasReps()
	{
		$exercise_log = new ExerciseLog;
		$exercise_log->reps = 5;
		$this->assertEquals(5, $exercise_log->reps);
	}

	public function testRepsIsInteger()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->reps = 'invalid reps';
		$this->assertFalse($exercise_log->save());
	}

	public function testPositiveReps()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->reps = 5;
		$this->assertTrue($exercise_log->save());
	}

	public function testZeroReps()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->reps = 0;
		$this->assertFalse($exercise_log->save());
	}

	public function testNegativenReps()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->reps = -5;
		$this->assertFalse($exercise_log->save());
	}

	public function testRequiresReps()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->reps = '';
		$this->assertFalse($exercise_log->save());
	}

	public function testHasWeight()
	{
		$exercise_log = new ExerciseLog;
		$exercise_log->weight = 5;
		$this->assertEquals(5, $exercise_log->weight);
	}

	public function testWeightIsInteger()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->weight = 'invalid weight';
		$this->assertFalse($exercise_log->save());
	}

	public function testPositiveWeight()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->weight = 5;
		$this->assertTrue($exercise_log->save());
	}

	public function testZeroWeight()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->weight = 0;
		$this->assertTrue($exercise_log->save());
	}

	public function testNegativeWeight()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->weight = -5;
		$this->assertFalse($exercise_log->save());
	}

	public function testRequiresWeight()
	{
		$exercise_log = Woodling::retrieve('ExerciseLog');
		$exercise_log->weight = '';
		$this->assertFalse($exercise_log->save());
	}

	public function testHasCreatedAt()
	{
		$exercise_log = new ExerciseLog;
		$exercise_log->created_at = strtotime('2014-03-10 23:38:42');
		$this->assertEquals('2014-03-10 23:38:42', $exercise_log->created_at);
	}

	public function testHasUpdatedAt()
	{
		$exercise_log = new ExerciseLog;
		$exercise_log->updated_at = strtotime('2014-03-10 23:38:42');
		$this->assertEquals('2014-03-10 23:38:42', $exercise_log->updated_at);
	}

}
