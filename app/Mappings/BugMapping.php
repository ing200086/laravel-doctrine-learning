<?php

namespace App\Mappings;

use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

use App\Entities\User;
use App\Entities\Bug;
use App\Entities\Product;

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
		$builder->increments('id');

		$builder->string('description');

		$builder->boolean('status');

		$builder->belongsTo(User::class, 'engineer');
		$builder->belongsTo(User::class, 'reporter');

		$builder->belongsToMany(Product::class, 'products');
	}


}