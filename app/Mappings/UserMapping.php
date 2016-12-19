<?php

namespace App\Mappings;

use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

use App\Entities\User;
use App\Entities\Bug;

/**
* 
*/
class UserMapping extends EntityMapping
{
	
	public function mapFor()
	{
		return User::class;
	}

	public function map(Fluent $builder)
	{
		$builder->increments('id');

		$builder->string('name');

		$builder->hasMany(Bug::class, 'assignedBugs')
					->mappedBy('engineer');
		$builder->hasMany(Bug::class, 'reportedBugs')
					->mappedBy('reporter');
	}


}