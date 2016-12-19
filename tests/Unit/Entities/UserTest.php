<?php

namespace Tests\Unit\Entities;

use App\Entities\User;

/**
* 
*/
class UserTest extends \PHPUnit_Framework_TestCase
{
	/** @test */
	public function it_is_constructed_with_name()
	{
		$user = new User("George Orwell");

		$this->assertEquals("George Orwell", $user->getName());
	}

	/** @test */
	public function it_can_report_bugs()
	{
		$bug = \Mockery::mock(\App\Entities\Bug::class);

		$user = new User("George Orwell");
			$user->reporterOfBug($bug);

		$this->assertEquals($bug, $user->getBugs()[0]);
	}

	public function tearDown()
	{
		\Mockery::close();
	}
}