<?php

use Woodling\Woodling;

class ExerciseTest extends TestCase {

	public function testHasId()
	{
		$exercise = new Exercise;
		$exercise->id = 5;
		$this->assertEquals(5, $exercise->id);
	}

	public function testHasRoutineId()
	{
		$exercise = new Exercise;
		$exercise->routine_id = 5;
		$this->assertEquals(5, $exercise->routine_id);
	}

	public function testRequiresRoutineAssociation()
	{
		$exercise = Woodling::retrieve('Exercise');
		$exercise->routine_id = null;
		$this->assertFalse($exercise->save());
	}

	public function testRoutineAssociation()
	{
		$exercise = Woodling::retrieve('Exercise');
		$routine = Routine::find($exercise->routine->id);
		$this->assertEquals($exercise->routine->name, $routine->name);
	}

	public function testHasName()
	{
		$exercise = new Exercise;
		$exercise->name = 'Test Name';
		$this->assertEquals('Test Name', $exercise->name);
	}

	public function testRequiresName()
	{
		$exercise = Woodling::retrieve('Exercise');
		$exercise->name = '';
		$this->assertFalse($exercise->save());
	}

	public function testHasDescription()
	{
		$exercise = new Exercise;
		$exercise->description = 'Test Name';
		$this->assertEquals('Test Name', $exercise->description);
	}

	public function testDescriptionIsNullable()
	{
		$exercise = Woodling::retrieve('Exercise');
		$exercise->description = null;
		$this->assertTrue($exercise->save());
	}

	public function testHasNotes()
	{
		$exercise = new Exercise;
		$exercise->notes = 'Test Name';
		$this->assertEquals('Test Name', $exercise->notes);
	}

	public function testNotesAreNullable()
	{
		$exercise = Woodling::retrieve('Exercise');
		$exercise->notes = null;
		$this->assertTrue($exercise->save());
	}

	public function testHasCreatedAt()
	{
		$exercise = new Exercise;
		$exercise->created_at = strtotime('2014-03-10 23:38:42');
		$this->assertEquals('2014-03-10 23:38:42', $exercise->created_at);
	}

	public function testHasUpdatedAt()
	{
		$exercise = new Exercise;
		$exercise->updated_at = strtotime('2014-03-10 23:38:42');
		$this->assertEquals('2014-03-10 23:38:42', $exercise->updated_at);
	}

}
