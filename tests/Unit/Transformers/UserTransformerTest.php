<?php

namespace Tests\Unit\Entities;

use App\Transformers\UserTransformer;
use App\Entities\User;

/**
* 
*/
class UserTransformerTest extends \Tests\TestCase
{
	/** @test */
	public function it_transforms_single_user()
	{
		$user = new User('James Bond');

		$transformed = fractal()->item($user)
									->transformWith(new UserTransformer())
									->toArray();

		$this->assertEquals([
				'name' 	=> 'James Bond',
				'bugs' => [
					'data' => []
				]
			], $transformed['data']);
	}
}