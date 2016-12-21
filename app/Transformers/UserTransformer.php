<?php
namespace App\Transformers;

use League\Fractal;

use App\EntityContracts as Contract;

class UserTransformer extends Fractal\TransformerAbstract
{
	protected $defaultIncludes = [
		'bugs'
	];

	public function transform(Contract\UserInterface $user)
	{
	    return [
	        'name'      => $user->getName(),
	    ];
	}

	public function includeBugs(Contract\UserInterface $user)
	{
		$bugs = $user->getBugs();

		return $this->collection($bugs, new BugTransformer);
	}
}