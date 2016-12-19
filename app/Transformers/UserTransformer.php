<?php
namespace App\Transformers;

use League\Fractal;

use App\EntityContracts as Contract;

class UserTransformer extends Fractal\TransformerAbstract
{
	public function transform(Contract\UserInterface $user)
	{
	    return [
	        'name'      => $user->getName()
	    ];
	}
}