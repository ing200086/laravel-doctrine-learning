<?php

namespace Tests\Unit\Entities;

use App\Transformers\BugTransformer;
use App\Entities\Bug;

/**
* 
*/
class BugTransformerTest extends \Tests\TestCase
{
	/** @test */
	public function it_transforms_single_bug()
	{
		$bug = new Bug('Bug 007');

		$transformed = fractal()->item($bug)
									->transformWith(new BugTransformer())
									->toArray();

		$this->assertEquals(['id' => 0, 'title' => 'Bug 007'], $transformed['data']);
	}
}