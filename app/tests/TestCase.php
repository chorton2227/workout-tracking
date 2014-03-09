<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Prepare for tests
	 *
	 */
	public function setUp()
	{
		parent::setUp();

		$this->prepareForTests();
	}

	/**
	 * Creates the application.
	 *
	 * @return Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__ . '/../../bootstrap/start.php';
	}

	/**
	 * Migrates the database.
	 *
	 */
	private function prepareForTests()
	{
		Artisan::call('migrate');
	}
	
}