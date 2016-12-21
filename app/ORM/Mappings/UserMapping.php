<?php

namespace App\ORM\Mappings;

use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

use App\Entities\User;
use App\Entities\Bug;

use App\Entities as Entity;
use App\Entities\Embeddables as Embed;

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
					->mappedBy('reporter')->fetchEager();

		$builder->embed(Embed\Email::class);
	}


}