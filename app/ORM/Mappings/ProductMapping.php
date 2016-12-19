<?php

namespace App\ORM\Mappings;

use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

use App\Entities\Product;

/**
* 
*/
class ProductMapping extends EntityMapping
{
	public function mapFor()
	{
		return Product::class;
	}

	public function map(Fluent $builder)
	{
		$builder->increments('id');

		$builder->string('name');
	}
}