<?php

use Woodling\Woodling;

class WeightLogTest extends TestCase {
	
	public function testHasId()
	{
		$weight_log = new WeightLog;
		$weight_log->id = 5;
		$this->assertEquals(5, $weight_log->id);
	}

	public function testHasUserId()
	{
		$weight_log = new WeightLog;
		$weight_log->user_id = 5;
		$this->assertEquals(5, $weight_log->user_id);
	}

	public function testRequiresUserAssociation()
	{
		$weight_log = Woodling::retrieve('WeightLog');
		$weight_log->user_id = null;
		$this->assertFalse($weight_log->save());
	}

	public function testUserAssociation()
	{
		$weight_log = Woodling::saved('WeightLog');
		$user = User::find($weight_log->user->id);
		$this->assertEquals($weight_log->user->username, $user->username);
	}

	public function testHasWeight()
	{
		$weight_log = new WeightLog;
		$weight_log->weight = 5;
		$this->assertEquals(5, $weight_log->weight);
	}

	public function testRequiresWeight()
	{
		$weight_log = Woodling::retrieve('WeightLog');
		$weight_log->weight = '';
		$this->assertFalse($weight_log->save());
	}

	public function testWeightIsInteger()
	{
		$weight_log = new ExerciseLog;
		$weight_log->weight = 'invalid weight';
		$this->assertFalse($weight_log->save());
	}

	public function testPositiveWeight()
	{
		$weight_log = Woodling::retrieve('WeightLog');
		$weight_log->weight = 5;
		$this->assertTrue($weight_log->save());
	}

	public function testZeroWeight()
	{
		$weight_log = Woodling::retrieve('WeightLog');
		$weight_log->weight = 0;
		$this->assertFalse($weight_log->save());
	}

	public function testNegativeWeight()
	{
		$weight_log = Woodling::retrieve('WeightLog');
		$weight_log->weight = -5;
		$this->assertFalse($weight_log->save());
	}

	public function testHasWeighDate()
	{
		$weight_log = new WeightLog;
		$weight_log->weigh_date = '2014-03-10';
		$this->assertEquals('2014-03-10', $weight_log->weigh_date);
	}

	public function testRequireseighDate()
	{
		$weight_log = Woodling::retrieve('WeightLog');
		$weight_log->weigh_date = '';
		$this->assertFalse($weight_log->save());
	}

	public function testHasNotes()
	{
		$weight_log = new WeightLog;
		$weight_log->notes = 'Test Notes';
		$this->assertEquals('Test Notes', $weight_log->notes);
	}

	public function testHasCreatedAt()
	{
		$weight_log = new WeightLog;
		$weight_log->created_at = strtotime('2014-03-10 23:38:42');
		$this->assertEquals('2014-03-10 23:38:42', $weight_log->created_at);
	}

	public function testHasUpdatedAt()
	{
		$weight_log = new WeightLog;
		$weight_log->updated_at = strtotime('2014-03-10 23:38:42');
		$this->assertEquals('2014-03-10 23:38:42', $weight_log->updated_at);
	}

}
