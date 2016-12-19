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
		$user = new User();
	}
}