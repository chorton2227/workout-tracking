<?php

use Woodling\Woodling;

class RoutineTest extends TestCase {
	
	public function testHasId()
	{
		$routine = new Routine;
		$routine->id = 5;
		$this->assertEquals(5, $routine->id);
	}

	public function testHasUserId()
	{
		$routine = new Routine;
		$routine->user_id = 5;
		$this->assertEquals(5, $routine->user_id);
	}

	public function testRequiresUserAssociation()
	{
		$routine = Woodling::retrieve('Routine');
		$routine->user_id = null;
		$this->assertFalse($routine->save());
	}

	public function testUserAssociation()
	{
		$routine = Woodling::saved('Routine');
		$user = User::find($routine->user->id);
		$this->assertEquals($routine->user->username, $user->username);
	}

	public function testHasName()
	{
		$routine = new Routine;
		$routine->name = 'Test Name';
		$this->assertEquals('Test Name', $routine->name);
	}

	public function testRequiresName()
	{
		$routine = Woodling::retrieve('Routine');
		$routine->name = '';
		$this->assertFalse($routine->save());
	}

	public function testHasCreatedAt()
	{
		$routine = new Routine;
		$routine->created_at = strtotime('2014-03-10 23:38:42');
		$this->assertEquals('2014-03-10 23:38:42', $routine->created_at);
	}

	public function testHasUpdatedAt()
	{
		$routine = new Routine;
		$routine->updated_at = strtotime('2014-03-10 23:38:42');
		$this->assertEquals('2014-03-10 23:38:42', $routine->updated_at);
	}

}
