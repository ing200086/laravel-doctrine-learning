<?php

namespace App\ORM\Mappings;

use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;
use LaravelDoctrine\Fluent\Builders\GeneratedValue;

use App\Entities\User;
use App\Entities\Bug;
use App\Entities\Product;

use App\ORM\Generators\BugId;

/**
* 
*/
class BugMapping extends EntityMapping
{
	public function mapFor()
	{
		return Bug::class;
	}

	public function map(Fluent $builder)
	{
		$builder->integer('id')->primary()->generatedValue(function(GeneratedValue $gen) {
			$gen->custom(BugId::class);
		});

		$builder->string('description');

		$builder->boolean('status');

		$builder->belongsTo(User::class, 'engineer');
		$builder->belongsTo(User::class, 'reporter');

		$builder->belongsToMany(Product::class, 'products');
	}


}